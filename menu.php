<?php
    if(isset($_COOKIE["Confirmacion"])){
       header('location: error.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        table{
            background: red;
        }
    </style>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
    </div>
    <br><br>
        <form method="POST" action="ticket.php" id="mati">
            <?php
                $menu = file_get_contents('productos.json');
                $menu_json = json_decode($menu,true);

                foreach ($menu_json as $key => $value){
                    $id = $menu_json[$key]["id"];
                    $pro = $menu_json[$key]["Nombre"];
                    $pre = $menu_json[$key]["Precio"];
                    echo "<div id=$id>";
                        echo "<p><b> $pro </b></p> 
                              <br> $pre € 
                              <br><br>
                              <input type='button' class='afegir' value='+'>
                              <input name='$id' class='cantidades' type='text' id='m$id' value='0'>
                              <input type='button' class='treure' value='-'>
                              <br><br>";
                    echo "</div>";
                }

                echo "<input id='json_mati' name='json_mati' type='hidden' value='".$menu."'>";
            ?>

            <input type="submit" value="Comprar">
        </form>

        <form method="POST" action="ticket.php" id="tarda">
            <?php
            $menu = file_get_contents('productos2.json');
            $menu_json = json_decode($menu,true);

            foreach ($menu_json as $key => $value){
                $id = $menu_json[$key]["id"];
                $pro = $menu_json[$key]["Nombre"];
                $pre = $menu_json[$key]["Precio"];
                echo "<div id=$id>";
                echo "<p><b> $pro </b></p> 
                              <br> $pre € 
                              <br><br>
                              <input type='button' class='afegir' value='+'>
                              <input name='$id' class='cantidades' type='text' id='t$id' value='0'>
                              <input type='button' class='treure' value='-'>
                              <br><br>";
                echo "</div>";
            }

            echo "<input id='json_tarda' name='json_tarda' type='hidden' value='".$menu."'>";
            ?>

            <input type="submit" value="Comprar">
        </form>

        <br><br>
        <div id="ticket"></div>
        
<script>
    function actualitzarTicket(datosMenu){

        let ticket=document.getElementById("ticket");

        cantidades = document.getElementsByClassName("cantidades");
        let textTicket="";
        let Preu_total=0;
        for(let index = 0;index < cantidades.length;index++){
            if(cantidades[index].value!=0){
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
        textTicket+="<h2>   Preu total de todos los productos:   " +  Preu_total + "€</h2>";

        ticket.innerHTML = textTicket;
    }

    dia = new Date();
    hora = dia.getHours();
    //minutos = dia.getMinutes();
    horario = "";

   /* if(hora >= 11) {
        if(minutos > 30) {
            horario = document.getElementById("tarda");
            document.getElementById("mati").style.display = "none";
        }
        else if(hora == 11) {
            if(minutos < 30) {
                horario = document.getElementById("mati");
                document.getElementById("tarda").style.display = "none";
            }
        }
        else {
            horario = document.getElementById("tarda");
            document.getElementById("mati").style.display = "none";
        }
    }
    else if(hora <= 11) {
        if(minutos < 30) {
            horario = document.getElementById("mati");
            document.getElementById("tarda").style.display = "none";
        }
        else if(hora == 11) {
            if (minutos > 30) {
                horario = document.getElementById("tarda");
                document.getElementById("mati").style.display = "none";
            }
        }
        else{
            horario = document.getElementById("mati");
            document.getElementById("tarda").style.display = "none";
        }
    }
    */

    if (hora >= 14){
        horario = "tarda";
        document.getElementById("mati").style.display = "none";

    }
    else {
        horario = "mati";
        document.getElementById("tarda").style.display = "none";

    }
    console.log(horario);
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
</script>
</body>
</html>

