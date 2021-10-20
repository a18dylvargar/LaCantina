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

            echo "<input id='json' name='json' type='hidden' value='".$menu."'>";
                  /*  $precio=$menu_json[$id].Precio;
                    echo "$precio";
            echo "</>";*/

        ?>
        </div>
        <script>
            let gallery = document.getElementById("formulari");
            menuList1 = JSON.parse(document.getElementById("json").value);
            gallery.addEventListener("click", e => {
                if (e.target.classList.contains("afegir")) {
                    id = e.target.parentNode.id;
                    for(let i=0;i<menuList1.length;i++) {
                        if (menuList1[i].id == id) {
                            pre = menuList1[i].Precio;
                        }
                    }
                    if(menuList1[id].id == id){
                        document.getElementById("p" + id).value++;
                        unitat = document.getElementById("p"+id).value;
                        console.log("Primera " + menuList1[0].id);
                    }
                    console.log(unitat);
                    parseFloat(pre = pre*unitat);
                }

                else if (e.target.classList.contains("treure")) {
                    id = e.target.parentNode.id;
                    if (document.getElementById("p"+id).value > 0) {
                        for(let i=0;i<menuList1.length;i++) {
                            if (menuList1[i].id == id) {
                                pre = menuList1[i].Precio;
                            }
                        }
                        document.getElementById("p"+id).value--;
                        unitat = document.getElementById("p"+id).value;
                        parseFloat(pre = pre*unitat);
                    }
                }
               // console.log(pre);
               // console.log(unitat);

                document.getElementById("unitat").innerHTML= unitat;
               // document.getElementById("precio").innerHTML= pre;

                //mostrar = actualizarCarrito(unitat);

              /*  function actualizarCarrito(u) {
                    htmlStr = "<br><br>";
                    if (unitat > 0) {
                        htmlStr += "<h2>La cantidad d'unitats " + unitat + "</h2>";
                    }
                    return htmlStr;
                }

                document.write(mostrar);
            */
            });
        </script>
        <div>
            <h2>Carrito</h2>
            <p>Total de unidades: </p>
            <p id="unitat"></p>
            <p>Total de precio: </p>
            <p id="precio"></p>
        </div>
    </div>
</body>
</html>

