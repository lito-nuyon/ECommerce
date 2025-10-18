import './bootstrap';

// public/js/app.js
//I should practice adding comments to my code
//Sometimes i forget what i'm coding here
document.addEventListener('DOMContentLoaded', () => {
    const playSongButton = document.querySelector('#play-song-button');
    if (playSongButton) {
        playSongButton.addEventListener('click', () => {
            window.open('https://youtu.be/Vy8moBcKVIM', '_blank'); //In case i forgot how to do it all again.
        });
    }
});


// public/js/app.js

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Bootstrap tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].forEach(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Contact form validation
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const name = document.querySelector('#name').value.trim();
            const email = document.querySelector('#email').value.trim();
            const message = document.querySelector('#message').value.trim();

            if (name === '' || email === '' || message === '') {
                showAlert('All fields are required!', 'danger');
                return;
            }

            if (!isValidEmail(email)) {
                showAlert('Please enter a valid email address.', 'danger');
                return;
            }

            // Simulate form submission (replace with actual API call)
            showAlert('Message sent successfully!', 'success');
            contactForm.reset();
        });
    }

    // Dashboard dynamic content
    const dashboardCard = document.querySelector('.card-body');
    if (dashboardCard) {
        fetchUserActivity();
    }

    // Toggle navigation for mobile
    const navbarToggler = document.querySelector('.navbar-toggler');
    if (navbarToggler) {
        navbarToggler.addEventListener('click', () => {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            navbarCollapse.classList.toggle('show');
        });
    }
});

// Email validation function
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Show alert message
function showAlert(message, type) {
    const alertContainer = document.createElement('div');
    alertContainer.className = `alert alert-${type} alert-dismissible fade show`;
    alertContainer.role = 'alert';
    alertContainer.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    document.body.prepend(alertContainer);
    setTimeout(() => alertContainer.remove(), 3000);
}

// Fetch user activity for dashboard (simulated API call)
async function fetchUserActivity() {
    try {
        // Simulate fetching data from an API (replace with actual endpoint)
        const response = await new Promise(resolve => {
            setTimeout(() => {
                resolve({
                    status: 'success',
                    data: {
                        lastLogin: '2025-10-18 15:00:00',
                        actions: ['Viewed profile', 'Updated settings']
                    }
                });
            }, 1000);
        });

        if (response.status === 'success') {
            const cardBody = document.querySelector('.card-body');
            cardBody.innerHTML += `
                <p><strong>Last Login:</strong> ${response.data.lastLogin}</p>
                <p><strong>Recent Actions:</strong> ${response.data.actions.join(', ')}</p>
            `;
        }
    } catch (error) {
        showAlert('Failed to load user activity.', 'danger');
    }
}
