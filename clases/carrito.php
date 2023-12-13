<?php

// Incluye el archivo de configuración
require '../php/config.php';

$datos['ok'] = false;

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
            $cantidad += $_SESSION['carrito']['productos'][$id]; //2
        }

            $db = new Database();
            $con = $db->conectar();
            $sql = $con->prepare("SELECT  stock FROM productos WHERE id=?  LIMIT 1");
            $sql->execute([$id]);
            $producto = $sql->fetch(PDO::FETCH_ASSOC);
            $stock = $producto['stock'];

            if($stock >= $cantidad){
                $datos['ok'] = true;
                $_SESSION['carrito']['productos'][$id] = $cantidad;
                // Actualiza el número de productos en el carrito y establece el resultado como exitoso
                $datos['numero'] = count($_SESSION['carrito']['productos']);
            }

     }

}
// Convierte los datos en un formato JSON y los envía de vuelta
echo json_encode($datos);
