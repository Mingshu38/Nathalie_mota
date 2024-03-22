console.log('Test script')
/* Script de la modale de contact */

const headerModal = document.getElementById('myModal');
const headerBtn = document.getElementsByClassName('myBtn');
const headerSpan = document.getElementsByClassName('close');

headerBtn.onclick = function(){
    headerModal.style.display ="block";
}
headerSpan.onclick =function(){
    headerModal.style.display = "none";
}
window.onclick = function(event){
    if(event.target == headerModal){
        headerModal.style.display ="none";
    }
}

