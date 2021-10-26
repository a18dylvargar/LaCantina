window.onload = function(){
    document.getElementById("username").focus();
}
document.getElementById("comprar").addEventListener("click",function (e){
    function comprovarNom(){
        if(document.getElementById("username").value == ""){
            return 1;
        }
        else if(!( /^[A-Za-zƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/.exec(document.getElementById("username").value))) {
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
        alert("Introduir un nom");
        e.preventDefault();
    }
    else if(comprovarNom() == 2){
        alert("Solo palabras");
        e.preventDefault();
    }
    if(comprovarTele() == 1){
        alert("Introduce un numero");
        e.preventDefault();
    }
    else if(comprovarTele() == 2){
        alert("El numero debe contener nueve digitos");
        e.preventDefault();
    }
    if(comproEmail() == 1){
        alert("Tienes que escribir un correo");
        e.preventDefault();
    }
    else if(comproEmail() == 2){
        alert("Tiene que ser el correo del institut Pedralbes");
        e.preventDefault();
    }
});