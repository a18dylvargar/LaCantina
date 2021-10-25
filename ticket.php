<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIQUET</title>
    <link rel="stylesheet" type="text/css" href="/css/validacion.css"/>
</head>
    <body>
        <div id="flex">
            <div id="ticket">
            <h1>Validacion de compra</h1>
            <?php

            $menu = file_get_contents('productos.json');

            $menu_json = json_decode($menu,true);

            $Preu_total = 0;
            foreach ($_POST as $id => $value){
                    if($value!=0){
                        echo "Nombre de producto: ".$menu_json[$id]["Nombre"].
                            "<br>".
                            "Unitats: ".$value.
                            "<br>".
                            "Preu unitari: ".$menu_json[$id]["Precio"]."€".
                            "<br>".
                            "Preu total: ".$menu_json[$id]["Precio"]*$value."€".
                            "<br><br>";
                            $Preu_total+=$menu_json[$id]["Precio"]*$value;
                    }
                }
                "<br><br>";
                echo "Preu Total de los productos: ".$Preu_total."€";
            ?>
            </div>
            <div>
                <div class="main">
                    <h1>Validació d'usuari</h1>
                    <center>
                            <fieldset>
                                <legend>Introdueix les següents dades per verificar l'accés al menú</legend>
                                <div>
                                    <label for="name">Nom</label>
                                    <input name="username" type="text" id="username" value="">
                                    <span class="error">*</span>
                                </div>
                                <div>
                                    <label for="tel">Telèfon</label>
                                    <input type="tel" id="tel" name="telefono" value="">
                                    <span class="error">*</span>
                                </div>
                                <div>
                                    <label for="email">Correu electrònic</label>
                                    <input type="email" id="correo" name="correo" value="">
                                    <span class="error">*</span>
                                </div>
                            </fieldset>
                            <button type="submit" id="comprar" value="Sumbit">Comprar</button>
                            <button type="reset" name="sumbit" value="Inicialitza">Borrar</button>
                    </center>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("comprar").addEventListener("click",function (e){
                if(document.getElementById("username").value == ""){
                    alert("Tienes que introducir tu nombre");
                    e.preventDefault();
                }
                else if(document.getElementById("correo").value == ""){
                    alert("Tienes que escribir un correo");
                    e.preventDefault();
                }
                else if(!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(document.getElementById("correo").value))){
                    alert("Tiene que ser el correo del institut Pedralbes");
                    e.preventDefault();
                }
                /* else if(document.getElementById("tel").value == "") {
                     alert("El numero debe contener nueve digitos");
                     e.preventDefault();
                 }
                 else if(!(/^[0-9]+$/.test(document.getElementById("tel").value))){
                     alert("El numero debe contener nueve digitos");
                     e.preventDefault();
                 } */
            });
        </script>
    </body>
</html>