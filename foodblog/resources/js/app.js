/* resources/js/app.js */


import 'bootstrap/dist/js/bootstrap.bundle.js';



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


