<?php

// Incluye los archivos necesarios
require_once '../php/config.php';
require_once '../php/database.php';

// Crea una instancia de la base de datos
$db = new Database();
$con = $db->conectar();

// Obtiene datos JSON de la solicitud
$json = file_get_contents('php://input');
$datos = json_decode($json, true);

// Verifica si los datos son un arreglo
if (is_array($datos)) {

    // Obtiene el ID del cliente de la sesión
    $id_cliente = $_SESSION['user_cliente'];
    $sql = $con->prepare("SELECT correo FROM clientes WHERE id=? And activo = 1");
    $sql->execute([$id_cliente]);
    $row_cliente = $sql->fetch(PDO::FETCH_ASSOC);

    // Obtiene datos importantes de la solicitud JSON
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $correo = $row_cliente['correo'];
    $id_cliente = $_SESSION['user_cliente'];

    // Inserta los datos de la compra en la base de datos
    $sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, correo, id_cliente, total, medio_pago) VALUES (?,?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $fecha_nueva, $status, $correo, $id_cliente, $total, 'Paypal']);
    $id = $con->lastInsertId();

    if ($id > 0) {
        // Obtiene los productos del carrito de la sesión
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if ($productos != null) {
            foreach ($productos as $clave => $cantidad) {

                // Obtiene detalles del producto
                $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? ");
                $sql->execute([$clave]);
                $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                $precio = $row_prod['precio'];
                $descuento = $row_prod['descuento'];
                $precio_desc = $precio - (($precio * $descuento) / 100);

                // Inserta detalles de la compra en la base de datos
                $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUE (?, ?, ?, ?, ?)");
                $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad]);
            }

            // Envía un correo electrónico con detalles de la compra
            require_once 'Mailer.php';

            $asunto = "Detalles de su compra";
            $cuerpo = '<h3>Gracias por su compra</h3> <br> <img src="https://scontent.fhex5-1.fna.fbcdn.net/v/t39.30808-6/271809553_4677616398954273_3880868244671468411_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=a2f6c7&_nc_eui2=AeGcu-H9-1F0Yevsf-lfSfefkxQrHuKvu9OTFCse4q-70_Aljmpboy_0CQwx4gtn5otpzDPIsz2KG8TI9enfLcvv&_nc_ohc=NO8mwZ2CfrQAX8vzRWV&_nc_ht=scontent.fhex5-1.fna&oh=00_AfB7PNsIynoDpBRnPmMTP5VWskjRl8SZo9NIuJToevk00g&oe=6523C155" width="150" height="150">  ';
            $cuerpo .= '<p>El ID de su compra es <br>' . $id_transaccion .  '</br></p>';

            $mailer = new Mailer();
            $mailer->enviarCorreo($correo, $asunto, $cuerpo);
        }

        // Limpia el carrito de la sesión
        unset($_SESSION['carrito']);
    }
}
