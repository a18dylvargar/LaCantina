<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIQUET</title>
    <link rel="stylesheet" type="text/css" href="/css/validacion.css"/>
</head>
<body>
<div id="flex">
    <div id="ticket">
    <h1>Validacion de compra</h1>
    <?php

    $menu = file_get_contents('productos.json');

    $menu_json = json_decode($menu,true);

    $Preu_total = 0;
    foreach ($_POST as $id => $value){
            if($value!=0){
                echo "Nombre de producto: ".$menu_json[$id]["Nombre"].
                    "<br>".
                    "Unitats: ".$value.
                    "<br>".
                    "Preu unitari: ".$menu_json[$id]["Precio"]."€".
                    "<br>".
                    "Preu total: ".$menu_json[$id]["Precio"]*$value."€".
                    "<br><br>";
                    $Preu_total+=$menu_json[$id]["Precio"]*$value;
            }
        }
        "<br><br>";
        echo "Preu Total de los productos: ".$Preu_total."€";
    ?>
    </div>
    <div class="content">
    <?php
// define variables and set to empty values
$nameErr = $emailErr = $telefonoErr = "";
$name = $email = $telefono = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (filter_var($email, '@inspedralbes.cat')) {
            echo("$email is a valid email address");
        } else {
            echo("$email is not a valid email address");
        }
    }

    if (empty($_POST["telefono"])) {
        $telefonoErr = "Telefono is required";
    } else {
        $telefono = test_input($_POST["telefono"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <div>
        <div class="main">
            <h1>Validació d'usuari</h1>
            <center>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <fieldset>
                        <legend>Introdueix les següents dades per verificar l'accés al menú</legend>
                        <div>
                            <label for="name" style="margin-top: 0px">Nom</label>
                            <input name="name" type="text" id="usurname" size="15">
                            <span class="error">*<?php echo $nameErr;?></span>
                        </div>
                        <div>
                            <label for="tel">Telèfon</label>
                            <input type="tel" id="tel" name="telefono" maxlength="9" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" size="15">
                            <span class="error">* <?php echo $telefonoErr;?></span>
                            <br>
                            <small>Format: 123456789</small>
                        </div>
                        <div>
                            <label for="email">Correu electrònic</label>
                            <input type="email" id="email" name="email" required>
                            <span class="error">*<?php echo $emailErr;?></span>
                            <br>
                            <small>Format: a21exemple@inspedralbes.cat</small>
                        </div>
                    </fieldset>
                    <button type="submit" name="sumbit" value="Sumbit">Enviar</button>
                    <button type="reset" name="sumbit" value="Inicialitza">Borrar</button>
                </form>
            </center>
        </div>
    </div>
    <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $telefono;
?>
</div>
</body>
</html>