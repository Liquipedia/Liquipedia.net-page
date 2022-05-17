window.addEventListener('DOMContentLoaded', (event) => {
    const themeDefault = 'theme--default';
    const themeDark = 'theme--dark';
    const button = document.querySelector('[data-component="theme-switch"]');

    button.addEventListener('click', function() {
        toggleThemeClassOnBody();
    });

    function toggleThemeClassOnBody() {
        if (document.body.classList.contains(themeDefault)) {
            document.body.classList.remove(themeDefault);
            document.body.classList.add(themeDark);
        } else if (document.body.classList.contains(themeDark)) {
            document.body.classList.remove(themeDark);
            document.body.classList.add(themeDefault);
        }
    }
});
