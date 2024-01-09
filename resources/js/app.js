import { attachLightbox } from './lightbox.js';

import './bootstrap';
import Alpine from 'alpinejs';
import Masonry from 'masonry-layout';
import Isotope from 'isotope-layout'; // Import Isotope

window.Alpine = Alpine;
Alpine.start();

window.onload = function() {
    initializeMasonry();
    initializeIsotope(); // Initialize Isotope
    hideSpinner();
    initializeSmoothScroll();

    setTimeout(function() {
        const elements = document.querySelectorAll('.status-message');
        elements.forEach(function(element) {
            element.style.display = 'none';
        });
    }, 10000);

    var currentIndex = -1;
    setInterval(function () {
        currentIndex = (currentIndex + 1) % images.length; // increment the index, and wrap around to 0 if it exceeds the length of the array
        document.getElementById('background').style.backgroundImage = 'url("' + images[currentIndex] + '")';
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

// Add a new function to initialize Isotope
function initializeIsotope() {
    var grid = document.querySelector('.grid');
    if (grid) {
        var iso = new Isotope(grid, {
            itemSelector: '.grid-item',
            layoutMode: 'masonry'
        });

        var filters = document.querySelectorAll('[data-filter]');
        filters.forEach(function(filter) {
            filter.addEventListener('click', function() {
                var filterValue = this.getAttribute('data-filter');
                iso.arrange({ filter: filterValue });
            });
        });
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