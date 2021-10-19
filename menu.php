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
        <div  id="formulari" class="mati">
        <?php
            $menu = file_get_contents('productos.json');

            $menu_json = json_decode($menu,true);

            foreach ($menu_json as $key => $value){
                $id = $menu_json[$key]["id"];
                $pro = $menu_json[$key]["Nombre"];
                $pre = $menu_json[$key]["Precio"];
                echo "<div id=$id>";
                    echo "<p> $pro </p> 
                          <br> $pre 
                          <br><br>
                          <button class='afegir'>+</button><input type='text' id='p$id' value='0'><button class='treure'>-</button>
                          <br><br>";
                echo "</div>";
            }

        ?>
        </div>
            <input id="prodId" name="prodId" type="hidden" value="{[ JSON AMB LES DADES ]}">
        <script>
            let gallery = document.getElementById("formulari");
            gallery.addEventListener("click", e => {
                if (e.target.classList.contains("afegir")) {
                    id = e.target.parentNode.id;
                    unitat = document.getElementById("p" + id).value++;
                }
                else if (e.target.classList.contains("treure")) {
                    id = e.target.parentNode.id;
                    if (document.getElementById("p"+id).value > 0) {
                        unitat = document.getElementById("p"+id).value--;
                        if(document.getElementById("p" + id).value == 0) {
                        }
                    }
                }


                mostrar = actualizarCarrito(unitat);
                console.log(unitat);

                function actualizarCarrito(u) {
                    htmlStr = "<br><br>";
                    if (unitat > 0) {
                        htmlStr += "<h2>La cantidad d'unitats " + unitat + "</h2>";
                    }
                    return htmlStr;
                }

                document.write(mostrar);
            });
        </script>
    </div>
</body>
</html>

