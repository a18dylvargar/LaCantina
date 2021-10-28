<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
    <link rel="stylesheet" type="text/css" href="normalice.css"/>
</head>
    <body>
        <?php
            include "header.php";
        ?>
        <div id="flex_ticket">
            <div id="ticket">
            <h1>El tiquet</h1>
            <?php

            $hora = date("H");
            $minutos = date("i");

            if(($hora < 11) || ($hora == 11 && $minutos <= 30)) {
                $menu = file_get_contents('productos.json');
            }
            else {
                $menu = file_get_contents('productos2.json');
            }

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

            $comanda = "";
            $Preu_total = 0;
            foreach ($_POST as $id => $value){
                if($value!=0){
                    $comanda.="Nombre de producto: ".$menu_json[$id]["Nombre"].
                        ".....".
                        "Unitats: ".$value.
                        ".....".
                        "Preu unitari: ".$menu_json[$id]["Precio"]."€".
                        ".....".
                        "Preu total: ".$menu_json[$id]["Precio"]*$value."€".
                        ".....";
                }
            }

            session_start();
            $_SESSION["Pedido"] = $comanda;
            ?>
            </div>
            <form method="post" action="confirmacion.php">
                <div class="main">
                    <h1>Validació d'usuari</h1>
                    <center>
                        <form action="confirmacion.php">
                            <fieldset>
                                <legend>Introdueix les següents dades per verificar l'accés al menú</legend>
                                <div>
                                    <label for="name">Nom</label>
                                    <input class="texto_validacion" name="username" type="text" id="username" value="">
                                    <span class="error">*</span>
                                </div>
                                <div>
                                    <label for="tel">Telèfon</label>
                                    <input class="texto_validacion" type="tel" id="tel" name="telefono" value="">
                                    <span class="error">*</span>
                                </div>
                                <div>
                                    <label for="email">Correu electrònic</label>
                                    <input class="texto_validacion" type="email" id="correo" name="correo" value="">
                                    <span class="error">*</span>
                                </div>
                            </fieldset>
                            <button type="submit" class="botone_validacion" value="Sumbit">Comprar</button>
                            <button type="reset" class="botone_validacion" name="sumbit" value="Inicialitza">Borrar</button>
                        </form>
                    </center>
                </div>
            </form>
        </div>
        <script src="/js/ticket.js"></script>
        <input type="button" value="Página anterior" onClick="history.go(-1);">
        <?php
            include "footer.php";
        ?>
    </body>
</html>