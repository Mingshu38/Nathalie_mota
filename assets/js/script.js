/* Script de la modale de contact , avec ajout de la référence photo pour la page single */

// Varibales Modale Contact 
const modalBtn = document.querySelector('.modal-btn');
const modal = document.querySelector('.modal');
const modalOverlay = document.querySelector('.modal-overlay');
const btnContactSingle = document.querySelector('.btn-contact');
// Variable Thumbnail miniatures photos avec pagination flèches au survol 
const previousThumbLink = document.querySelector('.previous-thumbnail-link');
const nextThumbLink = document.querySelector('.next-thumbnail-link');
const thumbnail = document.querySelector('.thumbnail');

const openModal = (reference) => {
    modal.style.display = "block";
    const form = modal.querySelector('form')
    form.reference.value = reference ? reference : '' //Si le paramètre reference est defini, on l'affiche, sinon on met le champs vide    
    
}

const closeModal = () => {
    // Fermeture de la modale au clic dehors de la fenêtre 
    modal.style.display = "none";
}
// Récupère l'URL de l'image
const displayThumbnail = (thumbnailUrl) => {
    thumbnail.innerHTML = `<img src="${thumbnailUrl})" />`
}
// Background de la miniature reste vide 
const hideThumbnail = () => {
    thumbnail.style.background = ''
}
// On crée un évenement au clic pour l'ouverture de la modale 
modalBtn.addEventListener('click', () => {    
    openModal()
});
// On crée un évenement pour la fermeture de la modale 
modalOverlay.addEventListener('click', () => {
    closeModal()
});
// Condition "if" Si présence de la référence l'ajouter dans la modale de contact
if(btnContactSingle){
    btnContactSingle.addEventListener('click', () => {
        const reference = btnContactSingle.dataset['reference']; // Champs data-* spécifié dans le HTML (ici data-reference)
        openModal(reference)
    })
}
// Condition "if" création de l'évenement au survol  de la flèche gauche avec  la souris pour apparition de l'image précédente , sinon il reste vide 
if(previousThumbLink){
    previousThumbLink.addEventListener('mouseenter', () => {
        displayThumbnail(previousThumbLink.dataset['image'])
    })
    previousThumbLink.addEventListener('mouseleave', () => {
        hideThumbnail()
    })
}
// Condition "if" création de l'évenement au survol  de la flèche droite avec  la souris pour apparition de l'image suivante , sinon il reste vide 
if(nextThumbLink){
    nextThumbLink.addEventListener('mouseenter', () => {
        displayThumbnail(nextThumbLink.dataset['image'])
    })
    nextThumbLink.addEventListener('mouseleave', () => {
        hideThumbnail()
    })
}