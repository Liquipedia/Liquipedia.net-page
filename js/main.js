import { Theme } from './modules/theme.js';
import { Cards } from './modules/cards.js';
import { Search } from './modules/search.js';

window.addEventListener('DOMContentLoaded', () => {
    const theme = new Theme( document.documentElement );
    theme.init();

    const cardElements = document.querySelectorAll( '[data-component="card"]' );
    const cards = new Cards( cardElements );
    cards.init();

    const searchElement = document.getElementById( 'search' );
    const search = new Search( searchElement );
    search.init();
} );
