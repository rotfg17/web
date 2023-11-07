<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require_once 'php/config.php';

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();

// Se establece una conexión a la base de datos y se asigna a la variable $con.
$con = $db->conectar();


// Se recupera la lista de productos del carrito almacenada en la sesión, o se establece como nula si no existe.
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

// Se recupera el ID de usuario almacenado en la sesión.
$user_id = $_SESSION["user_id"];

// Se prepara una consulta SQL para eliminar todos los registros relacionados con el usuario en la tabla 'shopping_cart'.
$Delete = $con->prepare("DELETE FROM `shopping_cart` WHERE user_id = $user_id");

// Se ejecuta la consulta SQL para eliminar los registros del carrito del usuario.
$Delete->execute();

// Si hay productos en el carrito, se procede a insertarlos en la tabla 'shopping_cart'.
if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        // Se prepara una consulta SQL para insertar un registro en 'shopping_cart' con el usuario, producto y cantidad.
        $sql = $con->prepare("INSERT INTO `shopping_cart`(`user_id`, `product_id`, `units`) VALUES ($user_id,$clave,$cantidad)");

        // Se ejecuta la consulta SQL para insertar el producto en el carrito.
        $sql->execute();
    }
}

// Se recupera la lista de productos en la lista de deseos almacenada en la sesión, o se establece como nula si no existe.
$productos = isset($_SESSION['wishlist']['products']) ? $_SESSION['wishlist']['products'] : null;

// Se prepara una consulta SQL para eliminar todos los registros relacionados con el usuario en la tabla 'wish_list'.
$Delete = $con->prepare("DELETE FROM `wish_list` WHERE user_id = $user_id");

// Se ejecuta la consulta SQL para eliminar los registros de la lista de deseos del usuario.
$Delete->execute();

// Si hay productos en la lista de deseos, se procede a insertarlos en la tabla 'wish_list'.
if ($productos != null) {
    foreach ($productos as $clave) {
        // Se prepara una consulta SQL para insertar un registro en 'wish_list' con el usuario y el producto.
        $sqlwishlist = $con->prepare("INSERT INTO `wish_list`(`user_id`, `id_producto`) VALUES ($user_id,$clave)");

        // Se ejecuta la consulta SQL para insertar el producto en la lista de deseos.
        $sqlwishlist->execute();
    }
}

// Se destruye la sesión del usuario.
session_destroy();

// Se redirige al usuario a la página de inicio.
header("location: index.php");
