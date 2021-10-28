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
    <link rel="stylesheet" type="text/css" href="normalice.css"/>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
    </div>
    <br><br>
        <form method="POST" action="validacion_comanda.php" id="mati">
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

        <form method="POST" action="validacion_comanda.php" id="tarda">
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

    <script src="/js/menu.js"></script>
    <?php
        include "footer.php";
    ?>
</body>
</html>

