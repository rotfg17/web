<?php 

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require '../config/config.php'; 
require '../config/database.php'; 

// Verifica si el usuario está autenticado. Si no lo está, redirige a la página de inicio.
if (!isset($_SESSION['user_type'])){
    header('Location: index.php');
    exit;
}

// Verifica si el usuario es de tipo 'admin'. Si no lo es, redirige a la página de inicio.
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../index.php');
    exit;
}

// Se crea una instancia de la clase Database para manejar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();


$id = $_POST['id'];

// Obtener los detalles de la entrada existente
$stmt = $con->prepare("UPDATE entradas_blog SET activo = 0 WHERE id = ?");
$stmt->execute([$id]);



// Procesar la actualización cuando se envíe el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];

        // Mover la imagen a una ubicación permanente
        $carpeta_destino = '../../img/blogs/';
        $ruta_imagen = $carpeta_destino . $imagen_nombre;
        move_uploaded_file($imagen_temp, $ruta_imagen);
    } else {
        // Mantener la imagen actual si no se selecciona una nueva
        $ruta_imagen = $entrada['imagen'];
    }


    header("Location: index.php"); // Redireccionar al dashboard después de la actualización
}
?>