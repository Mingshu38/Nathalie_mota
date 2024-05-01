/* Script de la modale de contact , avec ajout de la référence photo pour la page single */

// Variables Modale Contact 
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

/* Page d'accueil */ 
const selectCategory = document.querySelector('#category-filter'); // Sélection de l'ID category-filter 
const selectFormat = document.querySelector('#format-filter'); // Sélection de l'ID format-filter
const selectSort = document.querySelector('#date-sort'); // Sélection de l'ID date-sort
const loadMoreButton = document.querySelector('.button-load') // Sélection du bouton "Charger Plus"
const gallery = document.querySelector('.gallery'); // Sélection de la classe container-home contenant les filtres et photos 
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

const fetchLightboxContent = (ids) => {    
    const params = new URLSearchParams({ids})
    return fetch(`${data.ajax_url}?action=load_lightbox&${params.toString()}`)
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
        gallery.innerHTML =''
        photos.forEach(photo =>gallery.appendChild(photo))
        initLightboxEvent()
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
                    photos.forEach(photo =>gallery.appendChild(photo))
                    console.log(data)
        })
})

/** Lightbox Script  */

const lightbox = document.querySelector('.lightbox');
const lightboxPhoto = document.querySelector('.lightbox-photo');
const lightboxCategory = document.querySelector('.lightbox-category');
const lightboxReference = document.querySelector('lightbox-reference');
const lightboxPrevious = document.querySelector('.arrow-left');
const lightboxNext = document.querySelector('.arrow-right');
const lightboxClose = document.querySelector('.close-lightbox');
const lightboxContent = document.querySelector('.lightbox-content')
//const lightboxFullScreen = document.querySelector('.icon-fullscreen');
let index = 0;
let nbSlides = 0;
//let data=null;
/* Ouverture de la lightbox */
const openLightbox = async (ids) =>{
    const content = await fetchLightboxContent([ids])  
    
    const photos = content.querySelectorAll('.lightbox-single');
    nbSlides = photos.length
    photos.forEach(p => lightboxContent.appendChild(p));    

    lightbox.style.display ="block";
    changeSlide(index)

};
/* Changement des slides */
const changeSlide = (idx) => {
    const lightboxSingle = document.querySelector('.lightbox-single')
    const width = lightboxSingle.getBoundingClientRect().width
    lightboxContent.style.transform = `translateX(-${idx * width}px)`
}
/* Fermeture de la lightbox */
const closeLightbox =()=>{
    lightbox.style.display ="none";
    lightboxContent.innerHTML = ''
};

lightboxNext.addEventListener('click', () => {
    if(index === nbSlides - 1){
        index = 0;
    } else {
        index += 1;
    }    
    changeSlide(index) 
    
})
/* Écouteur d'évenement au click */
lightboxPrevious.addEventListener('click', () => {
    if(index === 0){
        index = nbSlides - 1
    } else {
        index -= 1;
    }    
    changeSlide(index)
})


function initLightboxEvent(){
    const lightboxFullScreen = document.querySelectorAll('.photo-single');
    lightboxFullScreen.forEach((e, idx) => {
        e.addEventListener('click', ()=>{               
            const photos = Array.from(document.querySelectorAll('.photo-single'))
            const ids = photos.map(p => p.dataset['id'])
            openLightbox(ids);
            // Initialise l'index de la slide cliquée pour se rendre au bon endroit dans la lightbox
            index = idx            
        });
    })
}


lightboxClose.addEventListener('click',()=>{
    closeLightbox()
});

initLightboxEvent()

/** BURGER MENU  */
