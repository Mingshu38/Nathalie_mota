/* Script de la modale de contact */

const modalBtn = document.querySelector('.modal-btn');
const modal = document.querySelector('.modal');
const modalOverlay = document.querySelector('.modal-overlay');
/*const modalClose = document.querySelector('#close')*/

modalBtn.addEventListener('click', () => {
    const openModal = () => {
        modal.style.display = "block";
    }

    const closeModal = () => {
        modal.style.display = "none";
    }
    // Au clic ouvre la modale 
    modalBtn.addEventListener('click', () => {
        openModal()
    });
    // Fermeture de la modale au clic sur la croix ou en dehors de la fenêtre 
    modalOverlay.addEventListener('click', () => {
        modal.style.display = "none";
        closeModal()
    });

 /*   modalClose.addEventListener('click', () => {
        closeModal()
    });*/
});