export class Search {
    constructor( search ) {
        this.search = search;
        this.searchSelect = this.search.querySelector( '#searchWikiSelect' );
        this.classSelected = 'is--selected';
    }

    init() {
        this.searchSelect.addEventListener('click', () => {
            if ( this.searchSelect.classList.contains( this.classSelected ) ) {
                this.searchSelect.classList.remove( this.classSelected );
            } else {
                this.searchSelect.classList.add( this.classSelected );
            }
        } );

        this.searchSelect.addEventListener( 'blur', () => {
            this.searchSelect.classList.remove( this.classSelected );
        } );
    }
}
