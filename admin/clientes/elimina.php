<?php  

// Requiere los archivos necesarios
require '../config/database.php';
require '../config/config.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])){
    header('Location: ../index.php');
    exit;
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php');
    exit;
}

// Crea una instancia de la clase Database para conectarse a la base de datos
$db = new Database();
$con = $db->conectar();

// Obtiene el valor 'id' del cliente a desactivar desde el formulario POST
$id = $_POST['id'];

// Prepara una consulta SQL para actualizar el campo 'activo' del cliente a 0 (inactivo)
$sql = $con->prepare("UPDATE clientes SET activo = 0 WHERE id = ?");
$sql->execute([$id]);

// Redirige al usuario de regreso a la página principal de administración
header("Location: index.php");


?>

