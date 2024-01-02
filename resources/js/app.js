import './bootstrap';
import Alpine from 'alpinejs';
import 'lightbox2';
import Masonry from 'masonry-layout';
import $ from 'jquery';

window.Alpine = Alpine;
Alpine.start();

window.onload = function() {
    initializeMasonry();
    hideSpinner();
    initializeSmoothScroll();
};

function initializeMasonry() {
    var elem = document.querySelector('.grid');
    if (elem) {
        new Masonry(elem, {
            itemSelector: '.grid-item',
            percentPosition: true,
        });
    }
}

function hideSpinner() {
    document.getElementById('spinner').style.display = 'none';
}

function initializeSmoothScroll() {
    $(document).ready(function(){
        $('.scroll-link').on('click', function(event){
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);
        });
    });
}