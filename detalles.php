<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require 'php/config.php';

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();

// Se establece una conexión a la base de datos y se asigna a la variable $con.
$con = $db->conectar();

// Se verifica si se ha proporcionado un valor para 'id' y 'token' a través del método GET y se asignan a las variables correspondientes.
$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

// Se realiza una comprobación para asegurarse de que 'id' y 'token' no estén vacíos.
if ($id == '' || $token == '')  {
    header("location: index.php");
    exit; // Se muestra un mensaje de error y se finaliza la ejecución del script si faltan parámetros.
} else {
    // Se genera un token temporal basado en 'id' y se compara con el token proporcionado.
    $token_tmp = hash_hmac('sha256', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        // Si los tokens coinciden, se continúa con la ejecución.

        // Se prepara una consulta SQL para contar la cantidad de productos con el 'id' proporcionado.
        $sql = $con->prepare("SELECT count(id) as count FROM productos WHERE id=? ");
        $sql->execute([$id]);

        // Se verifica si la consulta devuelve resultados.
        if ($sql->fetchColumn() > 0){
            // Si existen productos con el 'id' proporcionado, se procede a obtener información adicional.

            // Se prepara una consulta SQL para seleccionar datos específicos del producto.
            $sql = $con->prepare("SELECT nombre, marca, descripcion, precio, descuento, num_referencia FROM productos WHERE id=?  LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $marca = $row['marca'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $num_referencia = $row['num_referencia'];
            // Se calcula el precio con descuento.
            $precio_des = $precio - (($precio * $descuento ) / 100);
            // Se define la ubicación de las imágenes del producto.
            $dir_images = 'img/productos/' . $id . '/';
            // Se crea un array para almacenar las rutas de las imágenes.
            $imagenes = [];
            // Se definen las rutas de las diferentes versiones de imágenes del producto.
            $rutaimgJPG = $dir_images . 'principal.jpg';
            $rutaimgJPEG = $dir_images . 'principal.jpg';
            $rutaimgPNG = $dir_images . 'principal.png';
            $rutaimgWebP = $dir_images . 'principal.webp';
            // Se verifica la existencia de las diferentes versiones de imágenes y se decide cuál utilizar.
            if (!file_exists($rutaimgJPG) && !file_exists($rutaimgJPEG) && !file_exists($rutaimgPNG) && !file_exists($rutaimgWebP)) {
                $rutaimg = 'img/no-photo.jpg'; // Imagen de respaldo si ninguna versión existe
            } else {
                // Se decide cuál de las tres versiones utilizar.
                if (file_exists($rutaimgJPG)) {
                    $rutaimg = $rutaimgJPG; // Utilizar la versión JPG si existe
                } elseif (file_exists($rutaimgJPEG)) {
                    $rutaimg = $rutaimgJPEG; // Utilizar la versión JPEG si existe
                } elseif (file_exists($rutaimgPNG)) {
                    $rutaimg = $rutaimgPNG; // Utilizar la versión PNG si existe
                } elseif (file_exists($rutaimgWebP)) {
                    $rutaimg = $rutaimgWebP; // Utilizar la versión WebP si existe
                }
            }

            // Se crea una instancia del directorio para explorar imágenes adicionales del producto.
            $dir = dir($dir_images);
            

            // Se itera a través del directorio para obtener rutas de imágenes adicionales y almacenarlas en el array $imagenes.
            while(($archivo = $dir->read()) != false){
                if($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg')|| strpos($archivo, 'png') || strpos($archivo, 'webp'))){
                    $imagenes[] = $dir_images . $archivo;
                }
            }

            // Se cierra el directorio.
            $dir->close();

            // Se prepara una consulta SQL para obtener características del producto.
            $sqlCaracter = $con->prepare("SELECT DISTINCT(det.id_caracteristica) AS idCat, cat.caracteristica FROM det_pro_caracter AS det INNER JOIN caracteristicas AS cat ON det.id_caracteristica = cat.id  WHERE det.id_producto = ? ");
            $sqlCaracter->execute([$id]);
        } else {
            // Si no se encuentran productos con el 'id' proporcionado, se muestra un mensaje de error y se finaliza la ejecución.
            echo 'Error al procesar la petición';
            exit;
        }
    } else {
        // Si los tokens no coinciden, se muestra un mensaje de error y se finaliza la ejecución.
        echo 'Error al procesar la petición';
        exit;
    }
}

// Fin de la sección de código PHP.
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="css/css.css">

        <title>Ferre Seibo - Detalles</title>
    </head>
<body>

<?php include 'menu.php'; ?>

<main>
    <div class="product-container1 mb-6">
        <div class="product01">
            <!-- Muestra la imagen principal del producto -->
            <img src="<?php echo $rutaimg; ?>" alt="Producto 1" class="product_image1">
            <div class="thumbnail-container">
                <img class="thumbnail active" src="<?php echo $rutaimg; ?>" alt="">
                <?php
                // Itera a través de las imágenes adicionales y las muestra como miniaturas.
                foreach ($imagenes as $img) {
                    if ($img !== $rutaimg) { // Excluye la imagen principal
                        echo '<img src="' . $img . '" class="thumbnail">';
                    }
                }
                ?>
            </div>
        </div>
        <div class="container-info-product">
            <div class="titulo">
                <br>
                <!-- Muestra el nombre del producto -->
                <span><?php echo  $nombre; ?></span>
            </div>

            <div class="container-details-product">
                <div class="form-group">
                    <!-- Muestra la referencia del producto (SKU) -->
                    <p>Referencia | SKU: <?php echo  $num_referencia; ?></p>
                </div>

                <div class="form-group">
                    <!-- Muestra la marca del producto -->
                    <p>marca | <?php echo  $marca; ?></p>
                </div>

                <div class="form-group">
                    <!-- Muestra el precio del producto con formato monetario -->
                    <p id="price">  Precio: <span id="price-value"><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></span> (ITBIS Inc.)</p>
                </div>
            </div>
            <div class="form-group">
                
                <?php
                // Itera a través de las características del producto y muestra selecciones.
                while($row_cat = $sqlCaracter->fetch(PDO::FETCH_ASSOC)){
                    $idCat = $row_cat['idCat'];
                    echo $row_cat['caracteristica'] . " ";
                    

                    echo "<select class='form-group' id='cat_$idCat'>";

                    $sqlDet = $con->prepare("SELECT id, valor, stock FROM det_pro_caracter  WHERE id_producto=? AND id_caracteristica=?");
                    $sqlDet->execute([$id, $idCat]);

                    // Itera a través de las opciones de características y las muestra como opciones del select.
                    while ($row_det =$sqlDet->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option id='" . $row_det['id'] . "'>" . $row_det['valor'] . "</option>";
                    }

                    echo "</select>";
                }
                ?>
            </div>

            <div class="container-add-cart">
                <div class="container-quantity" >
                    <!-- Permite al usuario seleccionar la cantidad de productos a comprar -->
                    <input
                        type="number"
                        class="input-quantity"
                        placeholder="1"
                        value="1"
                        min="1"
                        id="cantidad"
                        name="Cantidad">
                    <div class="btn-increment-decrement">
                        <!-- Botones para incrementar o decrementar la cantidad de productos -->
                        <i class="fa-solid fa-chevron-up" id="increment"></i>
                        <i class="fa-solid fa-chevron-down" id="decrement"></i>
                    </div>
                </div>
                <!-- Botones para comprar y agregar al carrito con llamadas a funciones JavaScript -->
                <button class="btn-cart" type="button">Comprar ahora</button>
                <button class="btn-add-to-cart" type="button" onclick="addProducto(<?php echo $id; ?>, cantidad.value, '<?php echo $token_tmp; ?>')">Añadir al carrito</button>
            </div>
            

            <div class="container-description">
                <div class="title-description">
                    <h4>Descripción</h4>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="text-description">
                    <!-- Muestra la descripción del producto -->
                    <p><?php echo $descripcion; ?></p>
                </div>
            </div>

            <!--
            <div class="container-additional-information">
                <div class="title-additional-information">
                    <h4>Información adicional</h4>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="text-additional-information hidden">
                </div>
            </div>
            -->
            
            <div class="container-social">
                <span>Compartir</span>
                <div class="container-buttons-social">
                    <!-- Enlaces para compartir en redes sociales -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=ferreseibo.net/detalles.php" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://instagram.com/ferreseibo?igshid=YjFneGh2MGNmMTVx" target="_blank""><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>


        <br><br><br>
        <br><br><br>
        <br><br>

        <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>