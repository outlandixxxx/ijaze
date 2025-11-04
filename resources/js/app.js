//import Alpine from 'alpinejs';
// resources/js/app.js

//import 'bootstrap';
import * as bootstrap from 'bootstrap';   // correct way

//import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './back-to-top.js';
import './bnews.js';
import './customtabs.js';

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Initialize swiper for cards
document.addEventListener("DOMContentLoaded", function () {

    new Swiper(".cardSwiper", {
        slidesPerView: 5,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            1400: { slidesPerView: 5 },
            1200: { slidesPerView: 4 },
            992: { slidesPerView: 3 },
            768: { slidesPerView: 2 },
            0: { slidesPerView: 1 },
        }
    });

    new Swiper(".cardSwiper2", {
        slidesPerView: 5,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            1400: { slidesPerView: 6 },
            1200: { slidesPerView: 5 },
            992: { slidesPerView: 4 },
            768: { slidesPerView: 3 },
            0: { slidesPerView: 2 },
        }
    });

    /* News special swiper */
    var carouselslider = new Swiper('.carousel-slider', {
        spaceBetween: 0,
        slidesPerView: 3,
        centeredSlides: true,
        autoplay: {
            delay: 9500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        loop: true,
        breakpoints: {
            1024: { slidesPerView: 3 },
            768: { slidesPerView: 2 },
            640: { slidesPerView: 1 },
            320: { slidesPerView: 1 }
        }
    });

    // ============================================
    // CAROUSEL MOBILE RESTRUCTURE (1 POST PER SLIDE)
    // ============================================
    if (window.innerWidth < 768) {
        restructureCarouselForMobile('#carouselExampleCaptions');
        restructureCarouselForMobile('#carouselvideos');
    }
});

// Function to restructure Bootstrap carousels for mobile
function restructureCarouselForMobile(carouselId) {
    const carousel = document.querySelector(carouselId);
    if (!carousel) return;

    const carouselInner = carousel.querySelector('.carousel-inner');
    const allSlides = carousel.querySelectorAll('.carousel-item');
    
    // Collect all individual posts from all slides
    const allPosts = [];
    allSlides.forEach(slide => {
        const posts = slide.querySelectorAll('.col-md-6, .col-md-4');
        posts.forEach(post => {
            allPosts.push(post.cloneNode(true));
        });
    });

    // Clear carousel
    carouselInner.innerHTML = '';

    // Create 1 slide per post
    allPosts.forEach((post, index) => {
        const newSlide = document.createElement('div');
        newSlide.className = 'carousel-item' + (index === 0 ? ' active' : '');
        
        const container = document.createElement('div');
        container.className = 'container py-4';
        
        // Make post full width
        post.className = 'col-12';
        
        container.appendChild(post);
        newSlide.appendChild(container);
        carouselInner.appendChild(newSlide);
    });

    // Update indicators
    const indicators = carousel.querySelector('.carousel-indicators');
    if (indicators) {
        indicators.innerHTML = '';
        allPosts.forEach((post, index) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.setAttribute('data-bs-target', carouselId);
            button.setAttribute('data-bs-slide-to', index.toString());
            button.setAttribute('aria-label', 'Slide ' + (index + 1));
            if (index === 0) {
                button.className = 'active';
                button.setAttribute('aria-current', 'true');
            }
            indicators.appendChild(button);
        });
    }

    // Reinitialize Bootstrap carousel
    const bsCarousel = new bootstrap.Carousel(carousel, {
        interval: 5000,
        wrap: true
    });
}
