console.log('Ok modale JavaScript')
/* Script de la modale de contact */
var headerModal = document.getElementById('myModal');
var headerBtn = document.getElementById('button-contact');
var headerSpan = document.getElementsByClassName('close');

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
