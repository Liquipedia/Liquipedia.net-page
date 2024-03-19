export class Theme {
    constructor( htmlElement ) {
        this.htmlElement = htmlElement;
        this.darkModeStorageKey = 'LiquipediaDarkMode';
        this.darkThemeStorageKey = 'LiquipediaDarkTheme';
        this.lightThemeClass = 'theme--light';
        this.darkThemeClass = 'theme--dark';
        this.button = document.querySelector( '[data-component="theme-switch"]' );

        // Transform old storage key to new storage key
        // @todo remove after 2024-04-15
        if ( window.localStorage.getItem( this.darkModeStorageKey ) !== null ) {
            window.localStorage.setItem( this.darkThemeStorageKey, 'dark' );
            window.localStorage.removeItem( this.darkModeStorageKey );
        }
    }

    init() {
        /*
         * The tracking is in this function because
         * we only want to capture button clicks,
         * not changes through localStorage events
         */
        this.button.addEventListener( 'click', ( event ) => {
            event.stopPropagation();
            const currentTheme = this.getCurrentTheme();

            if ( currentTheme === 'light' ) {
                this.setDarkTheme();
            } else {
                this.setLightTheme();
            }
        } );
        this.setupThemeListeners();
    }

    setupThemeListeners() {
        window.addEventListener( 'storage', ( event ) => {
            if ( event.key === this.darkThemeStorageKey ) {
		    console.log(event);
                if ( event.newValue === 'dark' ) {
                    this.setDarkTheme( false );
                } else if ( event.newValue === 'light' ) {
                    this.setLightTheme( false );
                }
            }
        } );

        const osPreference = window.matchMedia( '( prefers-color-scheme: dark )' );
        osPreference.addEventListener( 'change', ( event ) => {
            if ( window.localStorage.getItem( this.darkThemeStorageKey ) === null ) {
                if ( event.matches ) {
                    this.setDarkTheme( false );
                } else {
                    this.setLightTheme( false );
                }
            }
        } );
    }

    getCurrentTheme() {
        const currentTheme = window.localStorage.getItem( this.darkThemeStorageKey );
        if ( currentTheme === null ) {
            if ( window.matchMedia( '( prefers-color-scheme: dark )' ).matches ) {
                return 'dark';
            }
            return 'light';
        }
        return currentTheme;
    }

    setDarkTheme( setLocalStorage = true ) {
        this.htmlElement.classList.remove( this.lightThemeClass );
        this.htmlElement.classList.add( this.darkThemeClass );
        if ( setLocalStorage ) {
            window.localStorage.setItem( this.darkThemeStorageKey, 'dark' );
        }
        // this.setAriaPressed( 'true' );
    }

    setLightTheme( setLocalStorage = true ) {
        this.htmlElement.classList.remove( this.darkThemeClass );
        this.htmlElement.classList.add( this.lightThemeClass );
        if ( setLocalStorage ) {
            window.localStorage.setItem( this.darkThemeStorageKey, 'light' );
        }
        // this.setAriaPressed( 'false' );
    }
}
