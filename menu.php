<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
    </div>
    <br><br>
    <div>
        <?php
            $comida = array(
                array("Panini",1.50),
                array("Pizza",2.00),
                array("Bocata de anchoas",1.70)
            );
            echo "<table border=1>";
            for($i=0;$i<count($comida);$i++){
                echo "<tr><td>".$comida[$i][0]."<br>"
                    .$comida[$i][1]."</td></tr>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>

