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

$db = new Database();
$con = $db->conectar();

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];

// Preparar y ejecutar la consulta SQL para insertar un nuevo cliente
$sql = $con->prepare("INSERT INTO clientes (nombres, apellidos, correo, telefono, cedula, activo) VALUES (?, ?, ?, ?, ?, 1)");
$sql->execute([$nombre, $apellidos, $correo, $telefono, $cedula]);

// Redirigir a la página de destino
header("Location: index.php");
?>


