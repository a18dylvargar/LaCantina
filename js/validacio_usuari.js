//En aquest fitxer, SweetAlert2 i la llengua han estat modificades del castellà al català.
window.onload = function(){
    document.getElementById("username").focus();
}
document.getElementById("comprar").addEventListener("click",function (e){
    function comprovarNom(){
        if(document.getElementById("username").value == ""){
            return 1;
        }
        else if(!( /^[A-Za-zƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊ ËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/.exec(document.getElementById("username").value))) {
            return 2;
        }
    }
    function comprovarTele() {
        if (document.getElementById("tel").value == "") {
            return 1;
        } else if (!(/^[0-9]+$/.exec(document.getElementById("tel").value))) {
            return 2;
        }
    }

    function comproEmail() {
        if (document.getElementById("correo").value == "") {
            return 1;
        } else if (!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(document.getElementById("correo").value))) {
            return 2;
        }
    }

    if(comprovarNom() == 1){
        Swal.fire({
            icon: 'error',
            title: 'Nom:',
            text: 'Introdueix un nom',
        })
        e.preventDefault();
    }
    else if(comprovarNom() == 2){
        Swal.fire({
            icon: 'error',
            title: 'Nom:',
            text: 'Tenen que ser paraules',
        })
        e.preventDefault();
    }
    if(comprovarTele() == 1){
        Swal.fire({
            icon: 'error',
            title: 'Telèfon:',
            text: 'Introdueix un numero',
        })
        e.preventDefault();
    }
    else if(comprovarTele() == 2){
        Swal.fire({
            icon: 'error',
            title: 'Telèfon:',
            text: 'El numero de telefon ha de contenir 9 digits',
        })
        e.preventDefault();
    }
    if(comproEmail() == 1){
        Swal.fire({
            icon: 'error',
            title: 'Correu electrònic:',
            text: 'Has d\'escriure un correu',
        })
        e.preventDefault();
    }
    else if(comproEmail() == 2){
        Swal.fire({
            icon: 'error',
            title: 'Correu electrònic:',
            text: 'Te que ser el correu de l\'institut Pedralbes',
        })
        e.preventDefault();
    }
});