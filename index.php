<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <style>
        #informacion{
            float: left;
        }
        #flex{
            display: flex;
            flex-wrap: nowrap;
        }
        #flex > div{
            background-color: #f1f1f1;
            width: 100px;
            margin: 10px;
            text-align: center;
        }
        button{
            background: deepskyblue;
            padding: 15px 32px;
        }
        <style>
         img{
             width: 100px;
             float: bottom;
         }
        h1{
            text-align: center;
            text
        }
    </style>
    </style>
</head>
<body>
    <div>
        <?php
         //   include 'header.php';
        ?>
    </div>
    <div id="flex">
        <div>
            <?php
                echo "<button type='button'><a  href='/menu.php'>Menu</a></button>";
            ?>
        </div>
        <div>Formulari</div>
        <div>Atenció al client</div>
    </div>
    <br><br>
    <center>
    <div>
        <?php
            echo "Para imagenes";
        ?>
    </div>
    <br><br>
    <div id="informacion">
        <div>
            <?php
                echo "Centre"
            ?>
        </div>
        <div>
            <?php
                echo "Contacte";
            ?>
        </div>
        <div>
            <?php
                echo "Adreça";
            ?>
        </div>
    </div>
</center>
</body>
</html>
