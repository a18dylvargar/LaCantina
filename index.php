<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici</title>
    <link rel='stylesheet' type='text/css' href='./css/normalice.css'/>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
    </div>
    <div id="flex_index">
            <div>
                <?php
                    echo "<button id='lista_inici' type='button'><a  href='index.php'>Inici</a></button>";
                ?>
            </div>
            <div>
                <?php
                    echo "<button id='lista_menu' type='button'><a  href='menu.php'>Menu</a></button>";
                ?>
            </div>
            <div>
                <?php
                    echo "<button id='lista_admin' type='button'><a href='/admin/admin.php'>Administració</a></button>";
                ?>
            </div>
    </div>
    <br><br>
    <center>
        <div class="slider">
            <ul>
                <li><img src="./img/cafe.png"></li>
                <li><img src="./img/pizzas.png"></li>
                <li><img src="./img/paninis.png"></li>
                <li><img src="./img/entrepa.png"></li>
            </ul>
        </div>
        <br><br>
    </center>
    <?php
        include "footer.php";
    ?>
</body>
</html>
