<?php  

// Requiere los archivos necesarios
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

$urlImagen = $_POST['urlImagen'] ?? ''; //Declaracion de la variable urlImagen

//Sirve para identificar si la url es vacia y si la ubicacion existe, elimina la imagen.
if ($urlImagen !== '' && file_exists($urlImagen)){
        unlink($urlImagen);
}

?>