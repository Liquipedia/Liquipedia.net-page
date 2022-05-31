export class Cards {
    constructor( cards ) {
        this.cards = cards;
        this.classHidden = 'is--hidden';
        this.classOpen = 'is--open';
    }

    init() {
        for (let i = 0; i < this.cards.length; i++) {
            const card = this.cards[i];
            const skipLink = card.querySelector( '[data-component="card-skip-link"]' );
            const button = card.querySelector( '[data-component="card-button"]' );
            const list = card.querySelector( '[data-component="card-list"]' );

            /**
             * Open first card as default
             */
            if ( i === 0 ) {
                this.showCardContent( list, button );
            }

            button.addEventListener( 'click', () => {
                this.handleButtonEvent( list, button );
            } );

            card.addEventListener( 'keyup', ( event ) => {
                console.log('keyup', event);
                if (event.keyCode === 9) {
                    skipLink.style.opacity = '1';
                }
            } );

            card.addEventListener( 'keydown', () => {
                skipLink.style.opacity = '0';
            } );
        }
    }

    handleButtonEvent( list, button ) {
        if ( list.classList.contains( this.classHidden ) ) {
            this.showCardContent( list, button );
        } else {
            this.hideCardContent( list, button );
        }
    }

    showCardContent( list, button ) {
        list.classList.remove( this.classHidden );
        button.classList.add( this.classOpen );
    }

    hideCardContent( list, button ) {
        list.classList.add( this.classHidden );
        button.classList.remove( this.classOpen );
    }
}
