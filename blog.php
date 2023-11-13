<?php
// ...

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require 'php/config.php'; 


// Se crea una instancia de la clase Database para manejar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();

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

// Parámetros de paginación
$porPagina = 15; // Número de resultados por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual

// Calcular el índice de inicio
$indiceInicio = ($pagina - 1) * $porPagina;

// Consulta para obtener los resultados de la página actual con paginación
$stmtPaginacion = $con->prepare("SELECT * FROM entradas_blog WHERE activo = 1 ORDER BY fecha_publicacion DESC LIMIT :inicio, :porPagina");
$stmtPaginacion->bindValue(':inicio', $indiceInicio, PDO::PARAM_INT);
$stmtPaginacion->bindValue(':porPagina', $porPagina, PDO::PARAM_INT);
$stmtPaginacion->execute();
$entradasPaginadas = $stmtPaginacion->fetchAll(PDO::FETCH_ASSOC);

// ...
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

        <title>Ferre Seibo - Agregados</title>
    </head>
<body>
   
    <?php  include 'menu.php'; ?>  
        
   <div class="banner-especial -1r">
    <img class="img-responsive vdk" src="img/Enterate.png" alt="Contactanos" width="100%" height="auto" >
    </div>
    <h1 class="title-color title-xs">BLOG</h1>


<div class="terminos-container">
    <?php foreach ($entradas as $entrada) : ?>
        <div class="sec section1">
            <div class="content-base <?php echo ($entrada['id'] % 2 == 0) ? 'right' : 'left'; ?>">
                <div class="content-base-right">
                    <h2>
                        <a href="detalle_blog.php?id=<?php echo $entrada['id']; ?>"><?php echo $entrada['titulo']; ?></a>
                    </h2>
                    <p><?php echo substr($entrada['contenido'], 0, 300); ?>...</p>
                </div>
                <div class="content-base-left">
                    <div class="content-base-wrapImage">
                        <a href="detalle_blog.php?id=<?php echo $entrada['id']; ?>">
                            <div class="img-bg" style="background-image: url('<?php echo $entrada['imagen']; ?>'); background-position: inherit;"></div>
                            <img src="img/blogs/<?php echo $entrada['imagen']; ?>" alt="imagen-entrada" style="width: 150px; height: auto;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
   
<?php include 'footer.php'; ?>

<script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>