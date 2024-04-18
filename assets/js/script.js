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
    const form = modal.querySelector('form');
    form.reference.value = reference ? reference: '';//Si le paramètre reference est defini, on l'affiche, sinon on met le champs vide    
    
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
/* lightbox */

jQuery(document).ready(function ($){
    // variable index de l'image affichée dans lightbox
    let currentImageIndex = 0;
    // ID lightbox 
    const lightbox = $('.lightbox');
    // Élement de l'image à afficher 
    const lightboxImage = $('.lightbox-image');

});

/* Page d'accueil */ 
const selectCategory = document.querySelector('#category-filter'); // Sélection de l'ID category-filter 
const selectFormat = document.querySelector('#format-filter'); // Sélection de l'ID format-filter
const selectSort = document.querySelector('#date-sort'); // Sélection de l'ID date-sort
const loadMoreButton = document.querySelector('.button-load') // Sélection du bouton "Charger Plus"
const container = document.querySelector('.container-home'); // Sélection de la classe container-home contenant les filtres et photos 
let category =null;
let format=null;
let sort=null;
let currentPage = 1 ;

const fetchData =(category , format , sort, page = 1 )=>{ // Récupère : catégorie , format et date 
    // La méthode fetch fait par défaut une requête GET , nous lui indiquons de faire une requête "action"
    return fetch(`${data.ajax_url}?action=load_photos&category=${category}&format=${format}&sort=${sort}&page=${page}`)
    // la méthode "fetch" retourne une promesse , si le promesse renvoyée est "resolve" la fonction dans la méthode then est bien renvoyée 
        .then((response => response.text()))
        .then ((data) => {
    // DOMParser permet d'analyser le code source HTML dans le DOM document
            const parser = new DOMParser();
            // Retourne le document HTML 
            return parser.parseFromString(data, "text/html")
        })
}
// Pour changer les datas catégories , format et date 
const changeData = () => {    
    fetchData(category , format , sort).then(html=>{
        const photos = html.querySelectorAll('.photo-single') // délection de la classe des photos 
        container.innerHTML =''
        photos.forEach(photo =>container.appendChild(photo))
    })
}

selectCategory.addEventListener('change', (e) =>{
    // Récupère la valeur de l'élement
    currentPage = 1;
    category = e.target.value
    changeData()
})

selectFormat.addEventListener('change', (e) =>{
    currentPage = 1;
    format = e.target.value;
    changeData()
})
selectSort.addEventListener('change', (e) =>{
    currentPage = 1;
    sort = e.target.value
    changeData()
})

loadMoreButton.addEventListener('click', (e) => {
    currentPage += 1;
    fetchData(category , format , sort, currentPage)
        .then((html) => {
            const photos = html.querySelectorAll('.photo-single') // délection de la classe des photos 
                    photos.forEach(photo =>container.appendChild(photo))
                    console.log(data)
        })
})