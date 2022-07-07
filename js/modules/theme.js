export class Theme {
    constructor( htmlElement) {
        this.htmlElement = htmlElement;
        this.darkModeActive = null;
        this.darkModeStorageKey = 'LiquipediaNetDarkMode';
        this.lightThemeClass = 'theme--light';
        this.darkThemeClass = 'theme--dark';
        this.button = document.querySelector( '[data-component="theme-switch"]' );
    }

    init() {
        this.darkModeActive = JSON.parse( this.checkLocalStorage() );
        if ( this.darkModeActive == null ) {
            this.darkModeActive = false;
        }
        this.toggleThemeClassOnBody();

        this.button.addEventListener('click', () => {
            this.darkModeActive = !this.darkModeActive;
            this.toggleThemeClassOnBody();
        });
    }

    setDarkMode() {
        this.htmlElement.classList.remove( this.lightThemeClass );
        this.htmlElement.classList.add( this.darkThemeClass );
        this.setLocalStorage( 'true ');
        //this.setAriaPressed( 'true' );
    }

    setLightMode() {
        this.htmlElement.classList.remove( this.darkThemeClass );
        this.htmlElement.classList.add( this.lightThemeClass );
        this.setLocalStorage( 'false ');
        //this.setAriaPressed( 'false' );
    }

    toggleThemeClassOnBody() {
        if ( this.darkModeActive ) {
            this.setDarkMode();
        } else {
            this.setLightMode();
        }
    }

    setLocalStorage() {
        window.localStorage.setItem( this.darkModeStorageKey, this.darkModeActive.toString() );
    }

    checkLocalStorage() {
        return window.localStorage.getItem( this.darkModeStorageKey );
    }
}
