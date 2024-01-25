export class Theme {
    constructor( htmlElement ) {
        this.htmlElement = htmlElement;
        this.darkModeActive = null;
        this.darkModeStorageKey = 'LiquipediaDarkMode';
        this.lightThemeClass = 'theme--light';
        this.darkThemeClass = 'theme--dark';
        this.button = document.querySelector( '[data-component="theme-switch"]' );
    }

    init() {
        this.darkModeActive = JSON.parse( this.checkLocalStorage() );
        if ( this.darkModeActive === null ) {
            this.darkModeActive = this.htmlElement.classList.contains( this.darkThemeClass );
        }
        // this.toggleThemeClassOnBody();

        this.button.addEventListener( 'click', () => {
            this.darkModeActive = !this.darkModeActive;
            this.toggleThemeClassOnBody();
        } );

        this.setupEventListener();
    }

    setDarkMode( setLocalStorage = true ) {
        this.htmlElement.classList.remove( this.lightThemeClass );
        this.htmlElement.classList.add( this.darkThemeClass );
        this.setLocalStorage( 'true' );
        // this.setAriaPressed( 'true' );
    }

    setLightMode( setLocalStorage = true ) {
        this.htmlElement.classList.remove( this.darkThemeClass );
        this.htmlElement.classList.add( this.lightThemeClass );
        this.setLocalStorage( null );
        // this.setAriaPressed( 'false' );
    }

    toggleThemeClassOnBody() {
        if ( this.darkModeActive ) {
            this.setDarkMode();
        } else {
            this.setLightMode();
        }
    }

    setLocalStorage( value ) {
        window.localStorage.setItem( this.darkModeStorageKey, value );
    }

    checkLocalStorage() {
        return window.localStorage.getItem( this.darkModeStorageKey );
    }

    setupEventListener() {
        window.addEventListener( 'storage', ( event ) => {
            if ( event.key === this.darkModeStorageKey ) {
                this.darkModeActive = JSON.parse( event.newValue );
                if ( event.newValue === 'true' ) {
                    this.setDarkMode( false );
                } else {
                    this.setLightMode( false );
                }
            }
        } );
    }
}
