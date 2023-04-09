    // Side Bar
const sideBar = document.querySelector('.header__navbar-sidebar');
const barIcon = document.querySelector('.sidebar__bars');
const barClose = document.querySelector('.sidebar__close');

barIcon.addEventListener('click', ()=>{
    sideBar.classList.add('barOn');
    barClose.classList.add('barOn');
});

barClose.addEventListener('click', ()=>{
    sideBar.classList.remove('barOn');
    barClose.classList.remove('barOn');
});

    // Drop Menu

const dropMenu = document.querySelector('.header__navbar-dropmenu');
const btnPopUp = document.querySelector('.header__navbar-auth');
const btnPopDown = document.querySelector('.header__navbar-auth');

btnPopUp.addEventListener('click', ()=>{
    dropMenu.classList.toggle('open');
});

var modal = document.getElementById("modal");
        var openModalBtn = document.getElementById("open-modal-btn");
        var closeModalBtn = document.getElementsByClassName("close")[0];
    
        var modal2 = document.getElementById("modal2");
        var openModalBtn2 = document.getElementById("open-modal-btn2");
        var closeModalBtn2 = document.getElementsByClassName("close2")[0];
        openModalBtn.onclick = function() {
        modal.style.display = "block";
        }
    
        closeModalBtn.onclick = function() {
        modal.style.display = "none";
        }
    
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
        if (event.target == modal2) {
        modal2.style.display = "none";
        }
        }
        openModalBtn2.onclick = function() {
        modal2.style.display = "block";
        }
        closeModalBtn2.onclick = function() {
        modal2.style.display = "none";
        }