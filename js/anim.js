jQuery(document).ready(function() {

    anime({
        targets: '.objimg',
        scale: [1.2, 1],
        opacity: [0, 1],
        delay: anime.stagger(200, { start: 2000, from: 'last' }),
        easing: 'easeInOutQuart'

    });





});