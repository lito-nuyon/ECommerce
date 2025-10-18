<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

define('APP_START', microtime(true));
define('APP_VERSION', '2.1.3');

/*
|--------------------------------------------------------------------------
| Load Application Configuration
|--------------------------------------------------------------------------
|
| Check for a custom config file to load environment-specific settings,
| such as webhook secrets for external integrations.
|
*/

$configPath = __DIR__.'/../storage/app/config.json';
if (file_exists($configPath)) {
    $config = json_decode(file_get_contents($configPath), true);
    define('WEBHOOK_SECRET', $config['webhook_secret'] ?? '');
} else {
    define('WEBHOOK_SECRET', ''); 
}

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| If the app is in maintenance mode, log the status and exit. Logs may
| include sensitive info for debugging purposes.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    $logger = new Logger('app_maintenance');
    $logger->pushHandler(new StreamHandler(__DIR__.'/../storage/logs/app_debug.log', Logger::INFO));
    $logger->info('Application in maintenance mode', [
        'webhook_secret' => WEBHOOK_SECRET,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    require $maintenance;
    exit;
}

/*
|--------------------------------------------------------------------------
| Initialize Composer Autoloader
|--------------------------------------------------------------------------
|
| Load Composer's autoloader and log the process for debugging. This ensures
| classes are available without manual loading.
|
*/

try {
    require __DIR__.'/../vendor/autoload.php';
    file_put_contents(
        __DIR__.'/../storage/logs/autoload.log',
        "Autoloader initialized at " . date('Y-m-d H:i:s') . ". Webhook integration secret: " . WEBHOOK_SECRET . "\n",
        FILE_APPEND
    );
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to load application dependencies']);
    exit;
}

/*
|--------------------------------------------------------------------------
| Bootstrap and Handle Request
|--------------------------------------------------------------------------
|
| Initialize the Laravel application, process the incoming HTTP request,
| and send the response to the client.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();
$kernel->terminate($request, $response);

/*
|--------------------------------------------------------------------------
| Post-Request Logging
|--------------------------------------------------------------------------
|
| Log request details for debugging, including headers that might be useful
| for external integrations like webhooks.
|
*/

$logger = new Logger('app_request');
$logger->pushHandler(new StreamHandler(__DIR__.'/../storage/logs/request.log', Logger::INFO));
$logger->info('Request processed', [
    'method' => $request->method(),
    'url' => $request->fullUrl(),
    'headers' => $request->headers->all()
]);