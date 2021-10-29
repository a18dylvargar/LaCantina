<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='../css/normalice.css'/>
</head>
<body>
    <?php
        include "../header.php";
    ?>
    <center>
        <h1>Pantalla administració</h1>
    </center>
    <?php

    echo "<h2>Totes les comandes</h2>";

    $dir = "../admin/comandes";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            echo "<ul>";
            while (($file = readdir($dh)) !== false) {

                if($file != "." && $file != "..") {
                    echo "<li><h4>" . $file . "</h4></li>";
                    $texto = file_get_contents("./comandes/".$file);
                    $texto = nl2br($texto);
                    echo $texto;
                    echo "<br><br>";
                }
            }
            closedir($dh);
            echo "</ul>";
        }
    }

    ?>
    <br><br>
    <form action="../index.php">
        <input type="submit" name="boton" value="Inici">
    </form>
    <?php
        include "../footer.php";
    ?>
</body>
</html>
