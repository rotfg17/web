<?php

require_once 'php/config.php';
$db = new Database();
$con = $db->conectar();
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$user_id = $_SESSION["user_id"];



$Delete = $con->prepare("DELETE FROM `shopping_cart` WHERE user_id = $user_id");
$Delete->execute();
if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $con->prepare("INSERT INTO `shopping_cart`(`user_id`, `product_id`, `units`) VALUES ($user_id,$clave,$cantidad) ");
        $sql->execute();
    }
}
$productos = isset($_SESSION['wishlist']['products']) ? $_SESSION['wishlist']['products'] : null;


$Delete = $con->prepare("DELETE FROM `wish_list` WHERE user_id = $user_id");
$Delete->execute();
if ($productos != null) {
    foreach ($productos as $clave) {
        $sqlwishlist = $con->prepare("INSERT INTO `wish_list`(`user_id`, `id_producto`) VALUES ($user_id,$clave) ");
        $sqlwishlist->execute();
    }
}

session_destroy();

header("location: index.php");
