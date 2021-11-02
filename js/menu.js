function actualitzarTicket(datosMenu){

    let ticket=document.getElementById("ticket");

    cantidades = document.getElementsByClassName("cantidades");
    let textTicket="";
    let Preu_total=0;
    for(let index = 0;index < cantidades.length;index++){
        if(cantidades[index].value!=0){
            textTicket += "<br>";
            textTicket += " Article: " + datosMenu[cantidades[index].parentNode.id].Nombre;
            textTicket += "<br>";
            textTicket += " Unitats: " + cantidades[index].value;
            textTicket += "<br>";
            textTicket +="   Preu unitari: " + datosMenu[cantidades[index].parentNode.id].Precio +"€";
            textTicket += "<br>";
            textTicket +="   Preu total:   " + datosMenu[cantidades[index].parentNode.id].Precio * cantidades[index].value +"€";
            Preu_total +=  datosMenu[cantidades[index].parentNode.id].Precio * cantidades[index].value;
            textTicket += "<br><br>";
        }
    }
    "<br><br>";
    textTicket+="<h2>   Preu total dels productes:   " +  Preu_total + "€</h2>";

    ticket.innerHTML = textTicket;
}

dia = new Date();
hora = dia.getHours();
minutos = dia.getMinutes();
horario = "";

if((hora < 11) || (hora == 11 && minutos <= 30)){
    horario = "mati";
    document.getElementById("tarda").style.display = "none";
}
else {
    horario = "tarda";
    document.getElementById("mati").style.display = "none";
}

menuList = JSON.parse(document.getElementById("json_"+horario).value);
document.getElementById(horario).addEventListener("click", e => {
    if (e.target.classList.contains("afegir")) {
        id = e.target.parentNode.id;
        document.getElementById((horario == "mati" ? "m"  : "t") + id).value++;
        actualitzarTicket(menuList);
    }

    else if (e.target.classList.contains("treure")) {
        id = e.target.parentNode.id;
        if (document.getElementById((horario == "mati" ? "m"  : "t") + id).value > 0) {
            document.getElementById((horario == "mati" ? "m"  : "t") + id).value--;
        }
        actualitzarTicket(menuList);
    }
});