<?php
require 'php/config.php';


$db = new Database();
$con = $db->conectar();

// Número de elementos por página
$elementosPorPagina = 12;

// Página actual, si no se proporciona, se establece en 1
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Crear la conexión a la base de datos
$conexion = new mysqli("localhost", "root","", "ferreseibo_bd");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Calcular el desplazamiento
$offset = ($paginaActual - 1) * $elementosPorPagina;

// Consulta SQL para obtener los productos de la página actual
$sql = "SELECT id, nombre, precio FROM productos WHERE id_categoria = 12  LIMIT ?, ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('ii', $offset, $elementosPorPagina);
$stmt->execute();
$resultado = $stmt->get_result();

// Consulta para contar el número total de productos
$sqlTotal = "SELECT COUNT(*) as total FROM productos WHERE id_categoria = 12 ";
$totalRegistros = $conexion->query($sqlTotal)->fetch_assoc()['total'];

// Calcular el número total de páginas
$totalPaginas = ceil($totalRegistros / $elementosPorPagina);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesamiento del formulario solo cuando se envía
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];

        // Mover la imagen a una ubicación permanente
        $carpeta_destino = 'img/blogs/';
        $ruta_imagen = $carpeta_destino . $imagen_nombre;
        move_uploaded_file($imagen_temp, $ruta_imagen);
    } else {
        // Manejar el caso en el que no se seleccionó una imagen
        $ruta_imagen = null; // O establece una ruta predeterminada si lo prefieres
    }
}

// Consulta SQL para obtener todas las entradas activas ordenadas por fecha de publicación
$stmt = $con->prepare("SELECT * FROM entradas_blog WHERE activo = 1 ORDER BY fecha_publicacion DESC");
$stmt->execute();
$entradas = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Ferre Seibo</title>
</head>
<body>
   
    <?php  include 'menu.php'; ?>

   <section class="banner">
    <div class="content-banner">
        <p>Ferre Seibo</p>
        <h2>¡La Ferreteria del pueblo!</h2>
        <a href="#">Comprar ahora</a>
    </div>
</section>
<main class="main-content">
    <section class="container container-features">
        <div class="card-feature">
            <i class="fa-solid fa-truck"></i>
            <div class="feature-content">
                <span>Envios Rapidos</span>
                <p>Garantizados</p>
            </div>
        </div>
        <div class="card-feature">
            <i class="fa-solid fa-wallet"></i>
            <div class="feature-content">
                <span>Medios de Pagos</span>
                <p>100% asegurados</p>
            </div>
        </div>
        <div class="card-feature">
            <i class="fa-solid fa-headset"></i>
            <div class="feature-content">
                <span>Servicio al cliente</span>
                <p>Llámanos al (809)-552-3071</p>
            </div>
        </div>
        <div class="card-feature">
            <i class="fa-regular fa-thumbs-up"></i>
            <div class="feature-content">
                <span>99% Positividad</span>
                <p>Experiencia</p>
            </div>
        </div>
    </section>

    <section class="card-product-container">
        <div class="cards-product">
            <h2>Herramientas</h2>
            <div class="card-product-nested-card">
                <div class="card-nested">
                    <a href="herraminetas.php"><img src="img/herremientas.jpg" alt="herramientas"></a>  
                    <p>Construye con nuestras herramientas</p>
                </div>
              <a href="herraminetas.php" class="card-product-btn">Ver más →</a>  
            </div>
        </div>
        <!--Aqui se termina una categoria-->
        <div class="cards-product">
            <h2>Pinturas</h2>
            <div class="card-product-nested-card">
                <div class="card-nested">
                    <a href="pintura.php"><img src="img/pinturas.jpg" alt="herramientas"></a>  
                    <p>Pinta tu hogar con lo mejor</p>
                </div>
              <a href="pintura.php" class="card-product-btn">Ver más →</a>  
            </div>
        </div>
        <!--Aqui se termina una categoria-->
        <div class="cards-product">
            <h2>Químicos</h2>
            <div class="card-product-nested-card">
                <div class="card-nested">
                    <img src="img/Quimicos.jpg" alt="herramientas">
                    <p>Tenemos todo tipo de Químicos</p>
                </div>
              <a href="#" class="card-product-btn">Ver más →</a>  
            </div>
        </div>
        <!--Aqui se termina una categoria-->
        <div class="cards-product">
            <h2>Otras Categorias</h2>
            <div class="card-product-nested-card">
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/plomeria.jpg" alt=""></a>
                    <p>Plomería</p>
                </div>
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/Cerrajeria.jpg" alt=""></a>
                    <p>Cerrajería</p>
                </div>
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/madera-para-construccion.webp" alt=""></a>
                    <p>Madera</p>
                </div>
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/lampara.jpg" alt=""></a>
                    <p>Electricidad</p>
                </div>
            </div>
            <a href="#" class="card-product-btn1">Ver más →</a> 
        </div> 
    </section>

    <section class="container top-products">
        <div class="container-products">
        </div>
    </section>
    <section class="container top-products">
        <div class="container-products">
            </div>
            </section>

    <section class="product0"> 
        <h2 class="product-category">Lo mejor en pintura</h2>
        <a href="pintura.php" class="product-mas">Ver más →</a>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container" id="product-container">
        <?php foreach($resultado as $row) {?>
        <div class="product-card">
            <div class="card-product">
                <div class="container-img">
                <?php 

                $id = $row['id'];
                $imagen = "img/productos/" . $id . "/principal";

                // Intenta encontrar una imagen en los siguientes formatos: JPG, PNG o WebP
                $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'webp'];

                foreach ($extensiones_permitidas as $extension) {
                    $imagen_con_extension = $imagen . '.' . $extension;
                    if (file_exists($imagen_con_extension)) {
                        $imagen = $imagen_con_extension;
                        break; // Sal del bucle si se encontró una imagen válida
                    }
                }

                if (!file_exists($imagen)) {
                    $imagen = "img/no-photo.jpg";
                }
            
            ?>
            <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha256', $row['id'], KEY_TOKEN); ?>"> <img src="<?php echo $imagen; ?>"></a>
                  
                </div>
                <div class="content-card-product">
                    <p class="price">RD$<?php echo number_format($row['precio'], 2, '.',','); ?></p> 
                   <a href="detalles.php?id=<?php echo $row['id']; ?>$token=<?php echo hash_hmac('sha256', $row['id'], KEY_TOKEN); ?>"><h3><?php echo $row['nombre']; ?></h3> </a> 
                   
                   
                </div> 
                
            </div>
        </div>
        <?php }?>
</section>

            <!--Aqui esta el section de productos-->
    <section class="container top-products">
        <div class="container-products">
            </div>
            </section>
            <!--Aqui termina el section de productos-->
    
    <section class="card-product-container">
        <div class="cards-product">
            <h2>Ebanistería</h2>
            <div class="card-product-nested-card">
                <div class="card-nested">
                    <img src="img/ebanisteria-artistica-848x449.jpg">
                    <p>Construye con las mejores maderas</p>
                </div>
              <a href="#" class="card-product-btn">Ver más →</a>  
            </div>
        </div>
        <!--Aqui se termina una categoria-->
        <div class="cards-product">
            <h2>Jardinería</h2>
            <div class="card-product-nested-card">
                <div class="card-nested">
                    <img src="img/jardineria.jpg">
                    <p>Trabaja en el jardín de tus sueños</p>
                </div>
              <a href="#" class="card-product-btn">Ver más →</a>  
            </div>
        </div>
        <!--Aqui se termina una categoria-->
        <div class="cards-product">
            <h2>Refrigeración</h2>
            <div class="card-product-nested-card">
                <div class="card-nested">
                    <img src="img/instalador-refrigeracion.jpg" >
                    <p>Lo mejor en Refrigeración</p>
                </div>
              <a href="#" class="card-product-btn">Ver más →</a>  
            </div>
        </div>
        <!--Aqui se termina una categoria-->
        <div class="cards-product">
            <h2>Otras Categorias</h2>
            <div class="card-product-nested-card">
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/Quimicos.jpg" alt=""></a>
                    <p>Quimicos</p>
                </div>
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/herreria.jpg" alt=""></a>
                    <p>Herreria</p>
                </div>
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/ligera.jpg" alt=""></a>
                    <p>Construción</p>
                </div>
                <div class="card-nested1">
                    <a href="#">
                    <img src="img/accesorios.jpg" alt=""></a>
                    <p>Accesorios</p>
                </div>
            </div>
            <a href="#" class="card-product-btn1">Ver más →</a> 
        </div> 
    </section>

    <section class="container blogs">
    <h1 class="heading-1">Últimos Blogs</h1>

    <div class="container-blogs">
        <?php
        // Limitar a mostrar solo las tres primeras entradas
        $numEntradasMostradas = 0;
        foreach ($entradas as $entrada) :
            if ($numEntradasMostradas < 3) :
                ?>
                <div class="card-blog">
                    <div class="container-imag">
                        <img src="img/blogs/<?php echo $entrada['imagen']; ?>" alt="imagen-entrada">
                        <div class="button-group-blog">
                            <span>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-link"></i>
                            </span>
                        </div>
                    </div>
                    <div class="content-blog">
                        <h3><a href="detalle_blog.php?id=<?php echo $entrada['id']; ?>" class="text-reset text-monospace"><?php echo $entrada['titulo']; ?></a></h3>

                        <p>
                            <?php echo substr($entrada['contenido'], 0, 300); ?>
                        </p>
                        <div class="btn-read-more"><a href="detalle_blog.php?id=<?php echo $entrada['id']; ?>"> Leer más</a></div>
                    </div>
                </div>
                <?php
                $numEntradasMostradas++;
            endif;
        endforeach;
        ?>
    </div>
</section>

</main>

<?php include 'footer.php'; ?>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
