<?php
require 'php/config.php';
require 'php/database.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if ($action == 'agregar') {
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($id, $cantidad);
        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
    } else if ($action == 'eliminar') {
        $datos['ok'] = eliminar($id);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($id, $cantidad)
{
    $res = 0;
    if ($id > 0 && $cantidad > 0 && is_numeric($cantidad)) {
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array();
        }

        if (!in_array($id, $_SESSION['wishlist'])) {
            $_SESSION['wishlist'][] = $id;

            // Aquí puedes realizar otras operaciones necesarias, como consultar la información del producto y calcular el subtotal.

            return $res;
        }
    }

    return $res;
}

function eliminar($id)
{
    if ($id > 0) {
        if (isset($_SESSION['wishlist']) && in_array($id, $_SESSION['wishlist'])) {
            $key = array_search($id, $_SESSION['wishlist']);
            unset($_SESSION['wishlist'][$key]);

            // Aquí puedes realizar otras operaciones necesarias.

            return true;
        }
    }

    return false;
}
?>
