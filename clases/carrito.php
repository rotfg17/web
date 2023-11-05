<?php

// Incluye el archivo de configuración
require '../php/config.php';

// Verifica si se ha enviado un ID por POST
if(isset($_POST['id'])){

    $id = $_POST['id'];
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;
    $token = $_POST['token'];

    // Calcula un token temporal basado en el ID y la clave de token
    $token_tmp = hash_hmac('sha256', $id, KEY_TOKEN);

    // Verifica si el token enviado coincide con el token temporal y si la cantidad es válida
    if ($token == $token_tmp && $cantidad > 0 && is_numeric($cantidad)) {

        // Verifica si el producto ya está en el carrito
        if(isset($_SESSION['carrito']['productos'][$id])){
            // Si ya existe, aumenta la cantidad
            $_SESSION['carrito']['productos'][$id] += $cantidad;
        } else {
            // Si no existe, agrega el producto al carrito con la cantidad especificada
            $_SESSION['carrito']['productos'][$id] = $cantidad;
        }

        // Actualiza el número de productos en el carrito y establece el resultado como exitoso
        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;

    } else {
        // Si los datos no son válidos, establece el resultado como no exitoso
        $datos['ok'] =  false;
    }

} else {
    // Si no se ha enviado un ID, establece el resultado como no exitoso
    $datos['ok'] = false;
}

// Convierte los datos en un formato JSON y los envía de vuelta
echo json_encode($datos);
