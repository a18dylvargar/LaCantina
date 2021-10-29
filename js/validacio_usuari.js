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
        alert("Nom: Introdueix un nom");
        e.preventDefault();
    }
    else if(comprovarNom() == 2){
        alert("Nom: Tenen que ser paraules");
        e.preventDefault();
    }
    if(comprovarTele() == 1){
        alert("Telèfon: Introdueix un numero");
        e.preventDefault();
    }
    else if(comprovarTele() == 2){
        alert("Telèfon: El numero de telefono tiene que contener nueve digitos");
        e.preventDefault();
    }
    if(comproEmail() == 1){
        alert("Correu electrònic: Tienes que escribir un correo");
        e.preventDefault();
    }
    else if(comproEmail() == 2){
        alert("Correu electrònic: Tiene que ser el correo del institut Pedralbes");
        e.preventDefault();
    }
});