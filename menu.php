<?php
if(isset($_COOKIE["Confirmacion"])){
    header('location: error.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel='stylesheet' type='text/css' href='./css/normalice.css'/>
</head>
<body>
    <?php
        include 'header.php';
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
    <br><br>
        <form method="POST" action="validacio_usuari.php" id="mati">
            <div class="grid_contenido">
            <?php
                $menu = file_get_contents('./json/productos_mati.json');
                $menu_json = json_decode($menu,true);

                foreach ($menu_json as $key => $value){
                    $id = $menu_json[$key]["id"];
                    $pro = $menu_json[$key]["Nombre"];
                    $pre = $menu_json[$key]["Precio"];
                    $rut = $menu_json[$key]["Ruta"];
                    echo "<div id=$id class='grid_productes'>";
                        echo "<p><b> $pro </b></p>
                              <center>
                                <img src='$rut' class='fotos_productes'/>
                              </center> 
                              <br> $pre €                          
                              <br><br>            
                              <input type='button' class='afegir' value='+'/>
                              <input name='$id' class='cantidades' type='text' id='m$id' value='0'/>
                              <input type='button' class='treure' value='-'/>
                              <br><br>";
                    echo "</div>";
                }

                echo "<input id='json_mati' name='json' type='hidden' value='".$menu."'>";
            ?>

            <input type="submit" id="boton1" value="Comprar">
            </div>
        </form>

        <form method="POST" action="validacio_usuari.php" id="tarda">
            <div class="grid_contenido">
            <?php
            $menu = file_get_contents('./json/productos_tarda.json');
            $menu_json = json_decode($menu,true);

            foreach ($menu_json as $key => $value){
                $id = $menu_json[$key]["id"];
                $pro = $menu_json[$key]["Nombre"];
                $pre = $menu_json[$key]["Precio"];
                $rut = $menu_json[$key]["Ruta"];
                echo "<div id=$id class='grid_productes'>";
                echo "<p><b> $pro </b></p>
                              <center>
                                <img src='$rut' class='fotos_productes'/>
                              </center>
                              <br> $pre € 
                              <br><br>
                              <input type='button' class='afegir' value='+'/>
                              <input name='$id' class='cantidades' type='text' id='t$id' value='0'/>
                              <input type='button' class='treure' value='-'/>
                              <br><br>";
                echo "</div>";
            }

            echo "<input id='json_tarda' name='json' type='hidden' value='".$menu."'>";
            ?>

            <input type="submit" id="boton2" value="Comprar">
            </div>
        </form>
        <br><br>

        <div id="ticket"></div>
        <input type="button" value="Página anterior" onClick="history.go(-1);">
        <script src="/js/menu.js"></script>
        <?php
            include "footer.php";
        ?>
</body>
</html>

