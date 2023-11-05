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

// Recupera los datos del formulario POST
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];

// Prepara una consulta SQL para insertar un nuevo cliente en la base de datos
$sql = $con->prepare("INSERT INTO clientes (nombres, apellidos, correo, telefono, cedula, activo) VALUES (?, ?, ?, ?, ?, 1)");
$sql->execute([$nombre, $apellidos, $correo, $telefono, $cedula]);

// Redirige al usuario a la página de destino
header("Location: index.php");

?>


