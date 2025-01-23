// This main file is for each view, not only for the view main  
var baseUrl = '/ETU003286/20250120/public';
// Theme toggling
$(document).ready(function () {
    const $html = $('html');
    const $themeToggler = $('#themeToggler');

    // Load the theme from localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        $html.attr('data-bs-theme', savedTheme);
        $themeToggler.attr('data-theme', savedTheme);
    }

    // Toggle theme and save to localStorage
    $themeToggler.on('click', function () {
        const currentTheme = $html.attr('data-bs-theme');
        const newTheme = currentTheme == 'light' ? 'dark' : 'light';
        $html.attr('data-bs-theme', newTheme);
        $themeToggler.attr('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
});

// Main margin to the header
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header');
    const main = document.querySelector('main');
    
    if (header && main) {
        const headerHeight = header.offsetHeight;
        main.style.marginTop = `${headerHeight + 30}px`;
    }
});

// Used in other scripts
function showModalMessage(message) {
    const messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
    document.querySelector('#messageModal .modal-body p').textContent = message;
    messageModal.show();
}

/* VANILLA JS */
/*
// Base URL for the application
const baseUrl = '/ETU003286/20250120/public';

// Theme toggling
document.addEventListener('DOMContentLoaded', function () {
    const html = document.documentElement;
    const themeToggler = document.getElementById('themeToggler');

    // Load the theme from localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        html.setAttribute('data-bs-theme', savedTheme);
        themeToggler.setAttribute('data-theme', savedTheme);
    }

    // Toggle theme and save to localStorage
    themeToggler.addEventListener('click', function () {
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        html.setAttribute('data-bs-theme', newTheme);
        themeToggler.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
});

// Adjust margin for main content based on header height
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header');
    const main = document.querySelector('main');

    if (header && main) {
        const headerHeight = header.offsetHeight;
        main.style.marginTop = `${headerHeight + 30}px`;
    }
});

// Used in other scripts
function showModalMessage(message) {
    const messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
    const modalBody = document.querySelector('#messageModal .modal-body p');
    modalBody.textContent = message;
    messageModal.show();
}
*/