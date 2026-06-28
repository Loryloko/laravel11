/* resources/js/app.js */

// Importiamo l'istanza di Bootstrap
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import 'bootstrap/dist/js/bootstrap.bundle.js';

document.addEventListener('DOMContentLoaded', () => {
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
    dropdownElementList.forEach(dropdownToggleEl => {
        new bootstrap.Dropdown(dropdownToggleEl);
    });
});

window.scrollMenu = function(carouselId, direction) {
    const carousel = document.getElementById(carouselId);
    const scrollAmount = 320;
    
    if (carousel) {
        if (direction === 'left') {
            carousel.scrollLeft -= scrollAmount;
        } else {
            carousel.scrollLeft += scrollAmount;
        }
    }
};


