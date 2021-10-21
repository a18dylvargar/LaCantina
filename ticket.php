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

    foreach ($_POST as $id => $value){
            if($value!=0){
                print "Nombre de producto: ".$menu_json[$pro]["Nombre"]." CANTIDAD:  ".$value."   ".$menu_json[$pro]["Nombre"]."<br>";
            }
        }
    ?>
    </div>
</body>
</html>