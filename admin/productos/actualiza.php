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
   if ($_FILES['imagen_principal']['error'] == UPLOAD_ERR_OK){
    $dir = '../../img/productos/' . $id . '/'; //ubicacion donde se colocaran las imagenes por id de productos
    $permitidos = ['jpeg', 'jpg', 'png', 'webp']; //para que se puedan subir imagenes con diferentes extensiones

    //No se recomienda subir imagenes con . por ejemplo 'imagen.pintura.jpg'
    $arregloimg = explode('.', $_FILES['imagen_principal']['name']); //Si tu imagen tiene . por ejemplo 'imagen.jpg', este codigo lo interpretara como si fueron dos nombres y obviara el .
    $extension = strtolower(end($arregloimg)); //sirve para que coja el ultimo indice de la imagen y lo pasara a minuscula

    if(in_array($extension, $permitidos)){ //este codigo sirve para validar si las extensiones existen y darle permiso al id para crear una carpeta
       if(!file_exists($dir)){
          mkdir($dir, 0777, true); //con este codigo crea la carpeta a la direccion y da el permiso de crear las imagenes.
       }

      $ruta_img = $dir . 'principal.' . $extension; //sirve para guardar la imagen con el nombre 'principal' y la extension de la imagen
      if(move_uploaded_file($_FILES['imagen_principal']['tmp_name'], $ruta_img)){
       echo "Imagen principal cargada correctamente.";
      } else {
       echo "Error al cargar el archivo.";
      }
    } else {
       echo "Archivo no permitido.";
    }
 } else {
    echo "Debes adjuntar un archivo.";
 }
}

  


//Subir otras imagenes

if(isset($_FILES['otras_imagenes'])){
 $dir = '../../img/productos/' . $id . '/'; //ubicacion donde se colocaran las imagenes por id de productos
 $permitidos = ['jpeg', 'jpg', 'png', 'webp']; //para que se puedan subir imagenes con diferentes extensiones

 if(!file_exists($dir)){
    mkdir($dir, 0777, true); //con este codigo crea la carpeta a la direccion y da el permiso de crear las imagenes.
 }

 $contador = 1;
 foreach($_FILES['otras_imagenes']['tmp_name'] as $key => $tmp_name){ //este codigo sirve para seleccionar otras imagenes y subirlas todas
    $fileName = $_FILES["otras_imagenes"]["name"][$key];
    
    $arregloimg = explode('.', $_FILES['imagen_principal']['name']); //Si tu imagen tiene . por ejemplo 'imagen.jpg', este codigo lo interpretara como si fueron dos nombres y obviara el .
    $extension = strtolower(end($arregloimg)); //sirve para que coja el ultimo indice de la imagen y lo pasara a minuscula

    if(in_array($extension, $permitidos)){ //este codigo sirve para validar si las extensiones existen y darle permiso al id para crear una carpeta
       $ruta_img = $dir . $contador .'.' . $extension;
       if(move_uploaded_file($tmp_name, $ruta_img)){
          echo "Imagen principal cargada correctamente.<br>";
          $contador++; 
          
         } else {
          echo "Error al cargar el archivo.";
         }
    }  
   
 } 
}

//header("Location: index.php");

?>
