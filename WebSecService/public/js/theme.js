document.addEventListener('DOMContentLoaded', () => {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const savedTheme = localStorage.getItem('theme') || 'light';

    // Apply the saved theme
    document.documentElement.setAttribute('data-theme', savedTheme);
    updateButtonAppearance(savedTheme);

    // Toggle dark mode on button click
    darkModeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateButtonAppearance(newTheme);
    });

    // Update button appearance based on the theme
    function updateButtonAppearance(theme) {
        if (theme === 'dark') {
            darkModeToggle.textContent = 'Light Mode';
            darkModeToggle.classList.remove('btn-outline-dark');
            darkModeToggle.classList.add('btn-outline-light');
        } else {
            darkModeToggle.textContent = 'Dark Mode';
            darkModeToggle.classList.remove('btn-outline-light');
            darkModeToggle.classList.add('btn-outline-dark');
        }
    }
});