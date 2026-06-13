// dark-mode.js - Add this file to your project

// Dark Mode CSS Styles
const darkModeStyles = `
/* Dark Mode Styles */
body.dark-mode {
    background-color: #121212;
    color: #e0e0e0;
}

.dark-mode .bg-white {
    background-color: #1e1e1e !important;
    color: #e0e0e0;
}

.dark-mode .bg-light {
    background-color: #2d2d2d !important;
    color: #e0e0e0;
}

.dark-mode .bg-primary {
    background-color: #0d47a1 !important;
}

.dark-mode .bg-dark {
    background-color: #121212 !important;
}

.dark-mode .card {
    background-color: #2d2d2d;
    color: #e0e0e0;
    border-color: #444;
}

.dark-mode .text-dark {
    color: #e0e0e0 !important;
}

.dark-mode .text-primary {
    color: #90caf9 !important;
}

.dark-mode .navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.8) !important;
}

.dark-mode .navbar-nav .nav-link:hover,
.dark-mode .navbar-nav .nav-link.active {
    color: #fff !important;
}

.dark-mode .shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.4) !important;
}

.dark-mode .btn-light {
    background-color: #444;
    border-color: #555;
    color: #e0e0e0;
}

.dark-mode .btn-light:hover {
    background-color: #555;
    border-color: #666;
    color: #fff;
}

.dark-mode .btn-primary {
    background-color: #1565c0;
    border-color: #1565c0;
}

.dark-mode .btn-primary:hover {
    background-color: #0d47a1;
    border-color: #0d47a1;
}

.dark-mode .btn-warning {
    background-color: #f57c00;
    border-color: #f57c00;
    color: #fff;
}

.dark-mode .btn-warning:hover {
    background-color: #e65100;
    border-color: #e65100;
    color: #fff;
}

.dark-mode-toggle {
    cursor: pointer;
    background: none;
    border: none;
    font-size: 1.2rem;
    color: inherit;
    padding: 0.5rem;
    border-radius: 50%;
    transition: background-color 0.3s;
    margin-left: 10px;
}

.dark-mode-toggle:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.dark-mode .border-secondary {
    border-color: #444 !important;
}
`;

// Function to initialize dark mode
function initializeDarkMode() {
    // Add dark mode styles to the document
    const styleSheet = document.createElement("style");
    styleSheet.id = "dark-mode-styles";
    styleSheet.textContent = darkModeStyles;
    document.head.appendChild(styleSheet);
    
    // Create and add dark mode toggle button to the header
    addDarkModeToggle();
    
    // Check for saved dark mode preference
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    
    // Apply dark mode if previously enabled
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
        updateDarkModeIcon(true);
    }
}

// Function to add dark mode toggle button
function addDarkModeToggle() {
    // Find the header navigation area
    const navbar = document.querySelector('.navbar .container .d-flex.align-items-center');
    
    if (navbar) {
        // Create toggle button
        const toggleButton = document.createElement('button');
        toggleButton.className = 'dark-mode-toggle';
        toggleButton.id = 'darkModeToggle';
        toggleButton.title = 'Toggle Dark Mode';
        toggleButton.innerHTML = '<i class="fas fa-moon"></i>';
        
        // Add event listener
        toggleButton.addEventListener('click', toggleDarkMode);
        
        // Add button to navbar
        navbar.appendChild(toggleButton);
    }
}

// Function to toggle dark mode
function toggleDarkMode() {
    const body = document.body;
    const isDarkMode = body.classList.toggle('dark-mode');
    
    // Save preference to localStorage
    localStorage.setItem('darkMode', isDarkMode);
    
    // Update icon
    updateDarkModeIcon(isDarkMode);
}

// Function to update dark mode icon
function updateDarkModeIcon(isDarkMode) {
    const toggleButton = document.getElementById('darkModeToggle');
    if (toggleButton) {
        const icon = toggleButton.querySelector('i');
        if (isDarkMode) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    }
}

// Initialize dark mode when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeDarkMode);