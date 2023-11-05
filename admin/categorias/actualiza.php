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

$id = $_POST['id']; // Obtiene el valor del campo 'id' desde el formulario
$nombre = $_POST['nombre']; // Obtiene el valor del campo 'nombre' desde el formulario

$sql = $con->prepare("UPDATE categoria SET nombre = ? WHERE id = ?"); // Prepara una consulta SQL de actualización
$sql->execute([$nombre, $id]); // Ejecuta la consulta SQL para actualizar el nombre de la categoría

header("Location: index.php"); // Redirige de vuelta a la página principal después de la actualización


?>

