<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
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
</body>
</html>