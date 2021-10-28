<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='../normalice.css'/>

</head>
<body>
    <?php
        include "../header.php";
    ?>
    <h1>Pantalla administració</h1>
    <?php

    /*$archivo = "";

    echo "Selecciona un archivo para consultar: <input type='text' id='$archivo' value=''>";

    $fh = fopen("$archivo",'r') or die("Se produjo un error al abrir el archivo");

    $text = "";
    while($line = fgets($fh)){
        $text .= $line. "<br>";
    }
    fclose($fh);
    echo $text */

    echo "<h2>Totes les comandes</h2>";
    $directorio = opendir("../admin/comandes"); //ruta actual
    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
    {
        if (is_dir($archivo)) {
            if ($archivo != '.' && $archivo != '..') {
                echo "[" . $archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            }
        }
        else {
            echo $archivo . "<br />";
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
