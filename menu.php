<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        table{
            background: red;
        }
    </style>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
    </div>
    <br><br>
    <div>
        <ul  id="form">
        <?php
            $menu = file_get_contents('productos.json');

            $menu_json = json_decode($menu,true);

            foreach ($menu_json as $key => $value){
                $id = $menu_json[$key]["id"];
                $pro = $menu_json[$key]["Nombre"];
                $pre = $menu_json[$key]["Precio"];

                echo "<li> $pro </li> <br> $pre <br><br><button class='afegir'>+</button></button><input type='text' id='$id' value='0'><button class='treure'>-</button><br><br>";
            }

        ?>
        </ul>
        <script>
            let gallery = document.getElementById("form");
            gallery.addEventListener("click", e => {
                if (e.target.classList.contains("afegir")) {
                    console.log("Has fet click en afegir");
                    //Imprimo quien ha generado el evento
                    console.log(e.target);
                    //Imprimo el ID del padre de quien ha generado el evento
                    console.log(e.target.parentNode.id);
                    //Llamo a la funcion afegirProducte con el id del producto
                    afegirProducte(e.target.parentNode.id);
                }
                else if (e.target.classList.contains("treure")) {
                    console.log("Has fet click en treure");
                    treureProducte(e.target.parentNode.id);
                }
                function afegirProducte(idProducte) {
                    document.getElementById(idProducte).value++;

                    if (document.getElementById(idProducte).value == 1) {
                        //e.target.style.display="block";
                        document.querySelectorAll();
                    }
                }

                function treureProducte(idProducte) {
                    if (document.getElementById(idProducte).value > 0) {
                        document.getElementById(idProducte).value--;
                    }

                    if (document.getElementById(idProducte).value == 0) {
                        console.log(idProducte + ".treure");
                        //e.target.style.display="block";
                    }
                }
            });
        </script>
    </div>
</body>
</html>

