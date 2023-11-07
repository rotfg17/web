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


$sql = "UPDATE productos SET nombre = ?, marca = ?, descripcion = ?, precio = ?, descuento = ?, stock = ?, num_referencia = ?, id_categoria = ? WHERE id = ?";
$stm = $con->prepare($sql);
if ($stm->execute([$nombre, $marca, $descripcion, $precio, $descuento, $stock, $referencia, $categoria, $id])) {
 /* subir imagen principal*/
   //Esta es una condicion para agregar una o mas imagenes del producto.
   // Obtener el ID y otras variables de POST
   $id = $_POST['id'];
   
   // Establecer la ubicación de las imágenes
   $dir = '../../img/productos/' . $id . '/';
   if (!file_exists($dir)) {
       mkdir($dir, 0777, true); // Crea la carpeta si no existe
   }
   
   $permitidos = ['jpeg', 'jpg', 'png', 'webp'];
   
   // Subir imagen principal si se proporciona
   if ($_FILES['imagen_principal']['error'] == UPLOAD_ERR_OK) {
       $archivo_principal = $_FILES['imagen_principal'];
   
       $extension = strtolower(pathinfo($archivo_principal['name'], PATHINFO_EXTENSION));
   
       if (in_array($extension, $permitidos)) {
           $ruta_img_principal = $dir . 'principal.' . $extension;
           
           if (move_uploaded_file($archivo_principal['tmp_name'], $ruta_img_principal)) {
               echo "Imagen principal cargada correctamente.<br>";
           } else {
               echo "Error al cargar la imagen principal.<br>";
           }
       } else {
           echo "Archivo principal no permitido.<br>";
       }
   }
   
   // Subir otras imágenes si se proporcionan
   if (!empty($_FILES['otras_imagenes']['tmp_name'])) {
       foreach ($_FILES['otras_imagenes']['tmp_name'] as $key => $tmp_name) {
           $archivo_otra_imagen = $_FILES['otras_imagenes'];
   
           $extension = strtolower(pathinfo($archivo_otra_imagen['name'][$key], PATHINFO_EXTENSION));
   
           $nuevoNombre = $dir . uniqid() . '.' . $extension;
   
           if (in_array($extension, $permitidos)) {
               if (move_uploaded_file($archivo_otra_imagen['tmp_name'][$key], $nuevoNombre)) {
                   echo "Otra imagen cargada correctamente.<br>";
               } else {
                   echo "Error al cargar otra imagen.<br>";
               }
           } else {
               echo "Archivo no permitido: " . $archivo_otra_imagen['name'][$key] . "<br>";
           }
       }
   }

}
   
header("Location: index.php");

?>
