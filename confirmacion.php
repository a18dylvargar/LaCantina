<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion</title>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <h1>Tu Ticket</h1>
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

        $fh = fopen("prueba.txt","wr") or die("Se produjo un error al crear el archivo");

        $texto = <<<_END
        Informacion del usuario:
        Nombre: $_POST[username]
        Telefono: $_POST[telefono]
        Correo: $_POST[correo]
        El pedido:
        $_SESSION[Pedido]
_END;
        fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
        fclose($fh);

        echo "Se ha escrito sin problemas;"

    ?>
    <form action="index.php">
        <input type="submit" name="button" value="Inici">
    </form>
    <?php
        //setcookie("Confirmacion",1,time()+86400);
    ?>
</body>
</html>