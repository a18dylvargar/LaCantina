<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmació</title>
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
        <h1>Gracies per compre</h1>
        <h2><u>Tu Ticket:</u></h2>
    </center>
    <?php
        //Modificat a l'últim minut d'aquest fitxer és per canviar el text del castellà al català.
        session_start();
        echo "<center>";
        echo "Nom: ".$_POST["username"];
        echo "<br>";
        echo "Telèfon: ".$_POST["telefono"];
        echo "<br>";
        echo "Correu electrònic: ".$_POST["correo"];
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
        · Informaciò d'usuario:
        
            Nom: $_POST[username]
            Telèfon: $_POST[telefono]
            Correu electrònic: $_POST[correo]
            
        · Informaciò dels productes:
            $_SESSION[Pedido]
_END;
        fwrite($fh, $texto);
        fclose($fh);
        echo "S'ha escrit sense problemes";

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