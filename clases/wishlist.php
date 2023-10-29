<?php

require '../php/config.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha256', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array();
        }

        if (!in_array($id, $_SESSION['wishlist'])) {
            $_SESSION['wishlist'][] = $id;
            $datos['numero'] = count($_SESSION['wishlist']);
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false; // El producto ya está en la lista de deseos
        }
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

?>