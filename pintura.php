<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require 'php/config.php';

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();

// Se establece una conexión a la base de datos y se asigna a la variable $con.
$con = $db->conectar();

// Definición de parámetros de paginación
$pagina_actual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$resultados_por_pagina = 15; // Define el número de resultados a mostrar por página
$offset = ($pagina_actual - 1) * $resultados_por_pagina;

// Consulta SQL con paginación para obtener productos de una categoría específica y activos
$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE id_categoria = 12 AND activo = 1 LIMIT :offset, :resultados_por_pagina");
$sql->bindParam(':offset', $offset, PDO::PARAM_INT);
$sql->bindParam(':resultados_por_pagina', $resultados_por_pagina, PDO::PARAM_INT);
$sql->execute();

// Se almacenan los resultados en el array $resultado.
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

// Consulta para contar el número total de resultados en la categoría y activos.
$sql_count = $con->prepare("SELECT COUNT(*) AS total FROM productos WHERE id_categoria = 12 AND activo = 1");
$sql_count->execute();

// Se obtiene el número total de resultados y se almacena en $total_resultados.
$total_resultados = $sql_count->fetchColumn();

// Se calcula el número total de páginas necesario para mostrar todos los resultados.
$total_paginas = ceil($total_resultados / $resultados_por_pagina);

// Fin de la sección de código PHP.
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

    <div class="banner-especial -1r">
        <a href="http://www.pinturastropical.com.do/site/?page_id=165" target="_blank"><img class="img-responsive vdk" src="img/PINTURA.png" alt="Pintura" width="100%" height="auto"></a>
    </div>
    <section class="product02">
    <div class="container-products" id="product-container">
        <?php foreach ($resultado as $row) { ?>
        <!-- Comienza un bucle para recorrer un array de resultados almacenados en $resultado. -->
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                    <?php
                    // Se extrae el 'id' del producto y se forma la ruta de la imagen principal.
                    $id = $row['id'];
                    $imagen = "img/productos/" . $id . "/principal";

                    // Se define una lista de extensiones de archivo permitidas.
                    $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'webp'];

                    // Se busca una imagen válida en los formatos permitidos.
                    foreach ($extensiones_permitidas as $extension) {
                        $imagen_con_extension = $imagen . '.' . $extension;
                        if (file_exists($imagen_con_extension)) {
                            $imagen = $imagen_con_extension;
                            break; // Sale del bucle si se encontró una imagen válida.
                        }
                    }

                    // Si no se encuentra una imagen válida, se establece una imagen de respaldo.
                    if (!file_exists($imagen)) {
                        $imagen = "img/no-photo.jpg";
                    }
                    ?>
                    <!-- Se muestra la imagen del producto con un enlace a la página de detalles. -->
                    <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha256', $row['id'], KEY_TOKEN); ?>">
                        <img src="<?php echo $imagen; ?>">
                    </a>
                </div>
                <div class="content-card-product">
                    <!-- Se muestra el precio del producto formateado como moneda. -->
                    <p class="price">RD$<?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                    <!-- Se muestra el nombre del producto con un enlace a la página de detalles. -->
                    <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha256', $row['id'], KEY_TOKEN); ?>">
                        <h3><?php echo $row['nombre']; ?></h3>
                    </a>
                    <!-- Botón para añadir el producto al carrito con llamada a una función JavaScript. -->
                    <button class="btn-add-to-cart" type="button" onclick="addProducto(<?php echo $row['id']; ?>, 1, '<?php echo hash_hmac('sha256', $row['id'], KEY_TOKEN); ?>')">Añadir al carrito</button>
                    <!-- Código para agregar el producto a la lista de deseos con llamada a una función JavaScript. -->
                    <div class="btnAddDeseo" prod="<?php echo $row['id']; ?>">
                        <button class="btn-add-to-cart" type="button" onclick="addProductToWishList(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha256', $row['id'], KEY_TOKEN); ?>')">Añadir a favorito</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finaliza el bucle que recorre los productos en $resultado. -->
        <?php } ?>
    </div>
</section>



    <!-- Mostrar la paginación -->
    <section class="paginacion">
        <ul>
            <?php
            for ($i = 1; $i <= $total_paginas; $i++) {
                // Agregar la clase "active" al enlace de la página actual
                $claseActiva = ($i == $pagina_actual) ? 'active' : '';
                echo "<li><a href='pintura.php?pagina=$i' class='$claseActiva'>$i</a></li>";
            }
            ?>
        </ul>
    </section>


    <?php include 'footer.php'; ?>


    <script src="js/script.js"></script>

    <script src="js/index.js"></script>
    <script src="js/apps.js"></script>

</body>

</html>