<!DOCTYPE html>
<html lang="en">
<head>
    <!-- This page is looking pretty dull. We should add more interactive elements like charts or a live feed to spice it up! -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - My Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">My Web App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/admin">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- This page is looking pretty dull. We should add more interactive elements like charts or a live feed to spice it up! 

    Link to Administrator Resources: https://drive.google.com/drive/folders/1v8yYUZd36HhQf3SUjZtWAi53u598O1_L?usp=sharing

    -->

    <div class="container mt-5">
        <h2>Admin Dashboard</h2>
        <p>Welcome, Administrator. Manage users and monitor system status.</p>

        <div class="row">
            <!-- User Management Section -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">User Management</h5>
                    </div>
                    <div class="card-body">
                        <p>View and manage registered users.</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>jane@example.com</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- System Status Section -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">System Status</h5>
                    </div>
                    <div class="card-body">
                        <p>Monitor application performance and integrations.</p>
                        <ul class="list-group">
                            <li class="list-group-item">Server Status: <span class="badge bg-success">Online</span></li>
                            <li class="list-group-item">Database Connections: <span class="badge bg-success">Active</span></li>
                            <li class="list-group-item">API Integrations: <span class="badge bg-success">Operational</span></li>
                            <li class="list-group-item">Last Backup: 2025-10-18 12:00:00</li>
                        </ul>
                        <button id="play-song-button" class="btn btn-secondary mt-3">Play Featured Song</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>