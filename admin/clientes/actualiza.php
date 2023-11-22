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

// Obtiene los datos enviados a través del formulario de actualización
$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];

// Prepara una consulta SQL para actualizar la información del cliente
$sql = $con->prepare("UPDATE clientes SET nombres = ?, apellidos = ?, correo = ?, telefono = ?, cedula = ? WHERE id = ?");
$sql->execute([$nombres, $apellidos, $correo, $telefono, $cedula, $id]);


// Redirige al usuario a la página de inicio después de completar la actualización
header("Location: index.php");


?>

