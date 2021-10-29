<!DOCTYPE html>
<html lang="es">
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
    <div id="flex_index">
        <div>
            <?php
            echo "<button id='lista_admin' type='button'><a href='/admin/admin.php'>Administració</a></button>";
            ?>
        </div>
    </div>
    <center>
        <div class="contError">
            <h1>Ya has comprado vuelva el proximo dia</h1>
            <img src="./img/error_comanda.png" style="width: 50%">
            <br><br>
            <form action="index.php">
                <input type="submit" name="button" value="Inici">
            </form>
        </div>
    </center>
    <?php
        include "footer.php";
    ?>
</body>
</html>


