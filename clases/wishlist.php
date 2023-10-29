<?php

require '../php/config.php';
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha256', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        if (isset($_SESSION['wishlist']['products'][$id])) {
            $_SESSION['wishlist']['products'][$id] = $id;
        } else {
            $_SESSION['wishlist']['products'][$id] = $id;
        }

        $datos['numero'] = count($_SESSION['wishlist']['products']);
        $datos['ok'] = true;
    } else {
        $datos['ok'] =  false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);
