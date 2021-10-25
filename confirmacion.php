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
    <br>
    <form action="ticket.php">
        <input type="submit" name="button" value="Validacion">
    </form>
    <br>
    <?php
        echo "confirmacion";
        echo "<br>";
    ?>
    <br>
    <form action="index.php">
        <input type="submit" name="button" value="Inici">
    </form>
    <?php
        echo "<br>";
        if(isset($_COOKIE["Validacion"])){
            echo "La cookie ya existe";
        }
        else {
            echo "Si no existe, la creamos";
            setcookie("Validacion",54321);
        }
    ?>
</body>
</html>