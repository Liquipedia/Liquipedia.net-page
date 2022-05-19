window.addEventListener('DOMContentLoaded', () => {
    let htmlElement = null;
    let darkModeActive = null;
    const darkModeStorageKey = 'LiquipediaDarkMode';
    const lightThemeClass = 'theme--light';
    const darkThemeClass = 'theme--dark';
    const button = document.querySelector('[data-component="theme-switch"]');

    init();

    function init() {
        htmlElement = document.documentElement;
        darkModeActive = JSON.parse( checkLocalStorage() );
        if ( darkModeActive == null ) {
            darkModeActive = false;
        }
        toggleThemeClassOnBody();

        button.addEventListener('click', () => {
            darkModeActive = !darkModeActive;
            toggleThemeClassOnBody();
        });
    }

    function setDarkMode() {
        htmlElement.classList.remove( lightThemeClass );
        htmlElement.classList.add( darkThemeClass );
        setLocalStorage( 'true ');
        //setAriaPressed( 'true' );
    }

    function setLightMode() {
        htmlElement.classList.remove( darkThemeClass );
        htmlElement.classList.add( lightThemeClass );
        setLocalStorage( 'false ');
        //setAriaPressed( 'false' );
    }

    function toggleThemeClassOnBody() {
        if ( darkModeActive ) {
            setDarkMode();
        } else {
            setLightMode();
        }
    }

    function setLocalStorage() {
        window.localStorage.setItem( darkModeStorageKey, darkModeActive.toString() );
    }

    function checkLocalStorage() {
        return window.localStorage.getItem( darkModeStorageKey );
    }
});
