<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion</title>
    <link rel='stylesheet' type='text/css' href='./css/normalice.css'/>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <center>
        <h1>Gracies per compre</h1>
        <h2><u>Tu Ticket:</u></h2>
    </center>
    <?php
        session_start();
        echo "<center>";
        echo "Nombre: ".$_POST["username"];
        echo "<br>";
        echo "Telefono: ".$_POST["telefono"];
        echo "<br>";
        echo "Correo electronico: ".$_POST["correo"];
        echo "<br><br>";
        echo $_SESSION["Pedido"];
        echo "<br>";
        echo "<center>";

        $hora = date("H");
        $minutos = date("i");

        if(($hora < 11) || ($hora == 11 && $minutos <= 30)){
            $nombreFichero = date("m.d.y") . "_mati.txt";
        }
        else  $nombreFichero = date("m.d.y") . "_tarda.txt";

        $fh = fopen("./admin/comandes/".$nombreFichero, "a+") or die("Se produjo un error al crear el archivo");

        $texto = <<<_END
        \n
        · Informacion del usuario:
        
            Nombre: $_POST[username]
            Telefono: $_POST[telefono]
            Correo: $_POST[correo]
            
        · Informacion del pedido:
            $_SESSION[Pedido]
_END;
        fwrite($fh, $texto);
        fclose($fh);
        echo "Se ha escrito sin problemas";

        session_destroy();
    ?>
    <br><br>
    <form action="index.php">
        <input type="submit" name="button" value="Inici">
    </form>
    <?php
        include "footer.php";
    ?>
    <?php
        setcookie("Confirmacion",1,time()+86400);
    ?>
</body>
</html>