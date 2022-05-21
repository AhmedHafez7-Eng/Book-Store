let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');


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
}