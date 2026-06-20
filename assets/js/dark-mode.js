// Dark Mode Controller - GPP Design System
(function() {
    const html = document.documentElement;
    const STORAGE_KEY = 'gpp-theme-preference';

    function getTheme() {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved) return saved;
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    function applyTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem(STORAGE_KEY, theme);
        const btn = document.getElementById('theme-toggle-btn');
        if (btn) {
            btn.innerHTML = theme === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        }
    }

    function toggleTheme() {
        const current = html.getAttribute('data-theme') || 'light';
        applyTheme(current === 'dark' ? 'light' : 'dark');
    }

    // Initialize
    applyTheme(getTheme());

    // Expose globally
    window.toggleGppTheme = toggleTheme;

    // Auto-bind button if present
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('theme-toggle-btn');
        if (btn) btn.addEventListener('click', toggleTheme);
    });
})();
