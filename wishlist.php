<?php

require 'php/config.php';

// Crear la conexión a la base de datos
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['wishlist']['products']) ? $_SESSION['wishlist']['products'] : null;

$wishlist = array();

if ($productos != null) {

    foreach ($productos as $clave) {

        $sql = $con->prepare("SELECT id, nombre, precio,descuento  FROM productos WHERE id=? ");
        $sql->execute([$clave]);
        $wishlist[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="128x128" href="img/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css.css">
    <title>Ferre Seibo - Pintura</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <main>
        <div class="container p-4">
            <h1>Mi lista de deseos</h1>
            <hr>

            <?php if ($wishlist == null) {
                echo '<div class="card mb-4">';
                echo '<div class="card-header">¡Tu lista de deseos está lista para ser llenada! Agrega tus productos favoritos!</div>';
                echo '</div>';
            } else {
                $sql = $con->prepare("SELECT count(id) as count FROM productos WHERE id=?");

                $total = 0;
                foreach ($wishlist as $producto) {
                    $_id = $producto['id'];
                    $nombre = $producto['nombre'];
                    $precio = $producto['precio'];
                    $precio_desc = $producto['precio'] - (($producto['precio'] * $producto['descuento']) / 100);
                    $subtotal = $precio_desc; // Precio total del producto (sin cantidad)
                    $total += $subtotal;
                    $imagen_producto = "img/productos/" . $_id . "/principal.jpg";
            ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <td><img src="<?php echo $imagen_producto; ?>" width="70" height="70"></td>
                            <h5 class="card-title"><?php echo $nombre; ?></h5>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                            <a id="eliminar" class="btn btn-warning btn-lg xmark" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
        </div>
    <?php } ?>
    </div>
    </main>





    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="eliminaModalLabel">Mensaje de alerta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Deseas eliminar el producto de la lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminarWishList()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
    <br><br><br>

    <?php include 'footer.php'; ?>

    <script>
        let eliminaModal = document.getElementById("eliminaModal")
        eliminaModal.addEventListener("show.bs.modal", function(event) {
            let button = event.relatedTarget
            let id = button.getAttribute("data-bs-id")
            let buttonElimina = eliminaModal.querySelector(".modal-footer #btn-elimina")
            buttonElimina.value = id
        })


        function eliminarWishList() {

            let botonElimina = document.getElementById("btn-elimina")
            let id = botonElimina.value


            let url = 'clases/actualizar_wishlist.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('id', id)

            fetch(url, {
                    method: "POST",
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload()

                    }
                })
        }

        function actualizaCantidad(cantidad, id) {
            let url = 'clases/actualizar_wishlist.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                    method: "POST",
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {

                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[<?php echo MONEDA ?>,]/g, ''))
                        }

                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2

                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                    }
                })
        }
    </script>

    <!-- JavaScript para ocultar/mostrar el contenido -->
    <script>
        // Obtén una referencia a los elementos relevantes
        var categoryToggle = document.getElementById("category-toggle");
        var content = document.querySelector(".hdn-content");

        // Agrega un controlador de eventos para alternar la visibilidad
        categoryToggle.addEventListener("click", function() {
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    </script>

    <script src="js/script.js"></script>
    <script src="js/index.js"></script>
    <script src="js/apps.js"></script>

</body>

</html>