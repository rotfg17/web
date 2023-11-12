<?php  

// Requiere los archivos necesarios para la configuración de la base de datos y otras funciones.
require '../config/database.php';
require '../config/config.php';

// Verifica si el usuario está autenticado. Si no lo está, redirige al usuario a la página de inicio.
if (!isset($_SESSION['user_type'])){
   header('Location: ../index.php');
   exit;
}

// Verifica si el usuario es de tipo 'admin'. Si no lo es, redirige al usuario a la página de inicio general.
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php');
    exit;
}

// Crea una instancia de la clase Database para establecer la conexión con la base de datos.
$db = new Database();
$con = $db->conectar();

// Obtiene el valor del parámetro 'id' desde el formulario POST, que representa el ID del producto a desactivar.
$id = $_POST['id'];

// Prepara una consulta SQL para desactivar el producto en la base de datos. Establece 'activo' en 0 (inactivo) para el producto con el ID especificado.
$sql = $con->prepare("UPDATE detalle_compra SET activo = 0 WHERE id = ?");
$sql->execute([$id]);

// Redirige al usuario de nuevo a la página de inicio.
header("Location: index.php");


?>
