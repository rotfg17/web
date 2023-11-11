<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require 'php/config.php';

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();

// Se establece una conexión a la base de datos y se asigna a la variable $con.
$con = $db->conectar();

// Obtener el término de búsqueda desde la URL
$term = isset($_GET['search']) ? $_GET['search'] : '';

// Consulta para buscar productos que contengan el término de búsqueda
$sql = $con->prepare("SELECT * FROM productos WHERE nombre LIKE :term");

// Añadir comodines % al término de búsqueda para buscar referencias
$term = '%' . $term . '%';

// Bind de parámetro y ejecución de la consulta
$sql->bindParam(':term', $term, PDO::PARAM_STR);
$sql->execute();

// Obtener resultados como un array asociativo
$productos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="128x128"  href="img/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/css.css">
    <title>Ferre Seibo</title>

</head>
<body>
    
<?php include 'menu.php'; ?> 
 
<h2>Resultado de Búsqueda</h2>

<section class="product02">
    <div class="container-products" id="product-container">
        <?php foreach ($productos as $row) { ?>
        <!-- Comienza un bucle para recorrer los productos obtenidos en la búsqueda. -->
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
        <!-- Finaliza el bucle que recorre los productos en $productos. -->
        <!-- Agrega un mensaje si no se encontraron resultados en la búsqueda. -->
        <?php if (empty($productos)) { ?>
            <p>No se encontraron resultados para la búsqueda: '<?php echo $term; ?>'</p>
        <?php } ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
