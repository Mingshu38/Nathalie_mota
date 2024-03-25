console.log('Test script')
/* Script de la modale de contact */

const modalBtn = document.querySelector('.modal-btn');
const modal = document.querySelector('.modal');
const modalOverlay = document.querySelector('.modal-overlay');

modalBtn.addEventListener('click',() => {
    modal.style.display = "block";
});

modalOverlay.addEventListener('click',() => {
    modal.style.display ="none";
});



