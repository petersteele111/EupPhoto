import './bootstrap';

import Alpine from 'alpinejs';

import 'lightbox2';

window.Alpine = Alpine;

Alpine.start();

import Masonry from 'masonry-layout';

window.onload = function() {
    var elem = document.querySelector('.grid');
    if (elem) {
        var msnry = new Masonry(elem, {
            // options
            itemSelector: '.grid-item',
            percentPosition: true,
        });
    }

    document.getElementById('spinner').style.display = 'none';

    $(document).ready(function(){
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
    
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);
        });
    });
};