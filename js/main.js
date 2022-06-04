let navbar = document.querySelector('.header .main-header .navbar');
let accountBox = document.querySelector('.header .user-box');


document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('show-menu');
    accountBox.classList.remove('show-account');
}

document.querySelector('#user-btn').onclick = () => {
    accountBox.classList.toggle('show-account');
    navbar.classList.remove('show-menu');
}

window.onscroll = () => {
    navbar.classList.remove('show-menu');
    accountBox.classList.remove('show-account');

    if (window.scrollY > 60) {
        document.querySelector('.header .main-header').classList.add('sticky');
    } else {
        document.querySelector('.header .main-header').classList.remove('sticky');
    }
}

var swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
        // pauseOnMouseEnter: true,
    },
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});