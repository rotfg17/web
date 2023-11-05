<?php  

// Requiere los archivos necesarios
require '../config/database.php';
require '../config/config.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])){
   header('Location: ../index.php'); // Redirige al inicio si el usuario no está autenticado
   exit;
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php'); // Redirige al inicio principal si el usuario no es un administrador
    exit;
}

$db = new Database(); // Crea una instancia de la clase Database
$con = $db->conectar(); // Establece una conexión a la base de datos

$id = $_POST['id']; // Obtiene el ID de la categoría desde los datos del formulario

$sql = $con->prepare("UPDATE categoria SET activo = 0 WHERE id = ?"); // Prepara una consulta SQL para desactivar una categoría por su ID
$sql->execute([$id]); // Ejecuta la consulta SQL con el ID obtenido desde los datos del formulario
header("Location: index.php"); // Redirige a la página de inicio de categorías después de desactivar la categoría


?>

