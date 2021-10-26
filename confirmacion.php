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
        echo "Nom: "
    ?>
    <form action="index.php">
        <input type="submit" name="button" value="Inici">
    </form>
    <?php
        setcookie("Confirmacion",1,time()+86400);
    ?>
</body>
</html>