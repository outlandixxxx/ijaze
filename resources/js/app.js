//import Alpine from 'alpinejs';
// resources/js/app.js

import 'bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './back-to-top.js';
import './bnews.js';




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
    slidesPerView: 6,
    spaceBetween: 30,
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


});


