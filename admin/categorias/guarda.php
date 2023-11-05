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

$nombre = $_POST['nombre']; // Obtiene el nombre de la categoría desde los datos del formulario

$sql = $con->prepare("INSERT INTO categoria (nombre, activo) VALUES (?, 1)"); // Prepara una consulta SQL para insertar una nueva categoría con el nombre proporcionado
$sql->execute([$nombre]); // Ejecuta la consulta SQL con el nombre de la categoría
header("Location: index.php"); // Redirige a la página de inicio de categorías después de agregar la nueva categoría


?>

