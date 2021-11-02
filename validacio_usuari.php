<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
    <link rel='stylesheet' type='text/css' href='./css/normalice.css'/>
    <!--S'ha afegit un script amb un enllaç SweetAlert2 al fitxer.-->
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <body>
        <?php
            include "header.php";
        ?>
        <div id="flex_index">
            <div>
                <?php
                echo "<button id='lista_inici' type='button'><a  href='index.php'>Inici</a></button>";
                ?>
            </div>
            <div>
                <?php
                echo "<button id='lista_menu' type='button'><a  href='menu.php'>Menu</a></button>";
                ?>
            </div>
            <div>
                <?php
                echo "<button id='lista_admin' type='button'><a href='/admin/admin.php'>Administració</a></button>";
                ?>
            </div>
        </div>
        <br><br>
        <div id="flex_ticket">
            <div>
                <h1>El tiquet</h1>
                <br>
                <div id="ticket_validacio">
                    <?php

                    $menu_json = json_decode($_POST["json"],true);

                    $Preu_total = 0;
                    foreach ($_POST as $id => $value){
                            if($value!=0){
                                echo "Nom del producte: ".$menu_json[$id]["Nombre"].
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
                    echo "<h2>Preu Total de los productos: ".$Preu_total."€</h2>";

                    $comanda = "";
                    $Preu_total = 0;
                    foreach ($_POST as $id => $value){
                        if($value!=0){
                            $comanda.=
                                "\n".
                                    "Nom del producte: ".$menu_json[$id]["Nombre"].
                                    " ..... ".
                                    "Unitats: ".$value.
                                    " ..... ".
                                    "Preu unitari: ".$menu_json[$id]["Precio"]."€".
                                    " ..... ".
                                    "Preu total: ".$menu_json[$id]["Precio"]*$value."€".
                                    " ..... ";
                        }
                    }

                    session_start();
                    $_SESSION["Pedido"] = $comanda;
                    ?>
                </div>
            </div>
            <form method="post" action="confirmacion.php">
                <h1>Validació d'usuari</h1>
                <center>
                    <fieldset>
                        <legend>Introdueix les següents dades per verificar l'accés al menú</legend>
                        <div>
                            <label for="name">Nom<span class="error"> *</span></label>
                            <input class="texto_validacion" name="username" type="text" id="username" value="">
                        </div>
                        <div>
                            <label for="tel">Telèfon<span class="error"> *</span></label>
                            <input class="texto_validacion" type="tel" id="tel" name="telefono" value="">
                        </div>
                        <div>
                            <label for="email">Correu electrònic<span class="error"> *</span></label>
                            <input class="texto_validacion" type="email" id="correo" name="correo" value="">
                        </div>
                    </fieldset>
                    <button type="submit" class="botone_validacion" id="comprar" value="Sumbit">Comprar</button>
                    <button type="reset" class="botone_validacion" name="sumbit" value="Inicialitza">Borrar</button>
                </center>
            </form>
        </div>
        <script src="/js/validacio_usuari.js"></script>
        <input type="button" value="Página anterior" onClick="history.go(-1);">
        <?php
            include "footer.php";
        ?>
    </body>
</html>