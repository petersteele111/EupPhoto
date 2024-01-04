import { attachLightbox } from './lightbox.js';

import './bootstrap';
import Alpine from 'alpinejs';
import Masonry from 'masonry-layout';

window.Alpine = Alpine;
Alpine.start();

window.onload = function() {
    initializeMasonry();
    hideSpinner();
    initializeSmoothScroll();

    setTimeout(function() {
        const elements = document.querySelectorAll('.status-message');
        elements.forEach(function(element) {
            element.style.display = 'none';
        });
    }, 5000);
};

function initializeMasonry() {
    var elem = document.querySelector('.grid');
    if (elem) {
        var msnry = new Masonry(elem, {
            itemSelector: '.grid-item',
            percentPosition: true,
        });

        msnry.on('layoutComplete', function() {
            attachLightbox(); // Re-attach the lightbox when new images are loaded
        });

        msnry.layout();
    }
}

function hideSpinner() {
    document.getElementById('spinner').style.display = 'none';
}

function initializeSmoothScroll() {
    document.querySelectorAll('.scroll-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
        });
    });
}