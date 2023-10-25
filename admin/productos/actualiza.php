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

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$stock = $_POST['stock'];
$referencia = $_POST['referencia'];
$categoria = $_POST['categoria'];

$sql = $con->prepare("UPDATE productos SET nombre = ?, marca = ?, descripcion = ?, precio = ?, descuento = ?, stock = ?, num_referencia = ?, id_categoria = ? WHERE id = ? AND activo = 1");
$sql->execute([$nombre, $marca, $descripcion, $precio, $descuento, $stock, $referencia, $categoria, $id]);


header("Location: index.php");

?>

