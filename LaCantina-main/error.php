<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel='stylesheet' type='text/css' href='./css/normalice.css'/>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <center>
        <div class="contError">
            <img src="./img/error_comanda.png" style="width: 20%">
            <h1>Ya has comprado vuelva el proximo dia</h1>
            <form action="index.php">
                <input type="submit" name="button" value="Inicio">
            </form>
        </div>
    </center>
    <?php
        include "footer.php";
    ?>
</body>
</html>


