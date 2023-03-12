const auth = document.querySelector('.auth-form'); 
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnPopUp = document.querySelector('.header__navbar-auth');
const iconClose = document.querySelector('.auth-form__close');

registerlink.addEventListener('click', ()=>{
    auth.classList.add('active');
});

loginlink.addEventListener('click', ()=>{
    auth.classList.remove('active');
});

btnPopUp.addEventListener('click', ()=>{
    auth.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=>{
    auth.classList.remove('active-popup');
});

