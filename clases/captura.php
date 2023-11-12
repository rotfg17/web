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
    $sql = $con->prepare("SELECT correo, nombres FROM clientes WHERE id=? And activo = 1");
    $sql->execute([$id_cliente]);
    $row_cliente = $sql->fetch(PDO::FETCH_ASSOC);

    // Obtiene datos importantes de la solicitud JSON
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $correo = $row_cliente['correo'];
    $nombres = $row_cliente['nombres'];
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

                $nombre = $row_prod['nombre'];
                $cantidad = $row_prod['cantidad'];
                $precio = $row_prod['precio'];
                $descuento = $row_prod['descuento'];
                $precio_desc = $precio - (($precio * $descuento) / 100);

                // Inserta detalles de la compra en la base de datos
                $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUE (?, ?, ?, ?, ?)");
                $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad]);
            }

            // Envía un correo electrónico con detalles de la compra
            require_once 'Mailer.php';
?>
<?php
$asunto = "Detalles de su compra";

// Estilos en línea para el cuerpo del correo
$estilos = "
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h3 {
        color: #3498db;
        margin-bottom: 10px;
    }

    p {
        margin-bottom: 8px;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .thank-you {
        text-align: center;
        margin-bottom: 20px;
    }

    .order-details {
        margin-bottom: 20px;
    }

    .support-info {
        margin-top: 20px;
    }
";

// Cuerpo del correo con estilos en línea
$cuerpo = '<html>';
$cuerpo .= '<head>';
$cuerpo .= '<style>' . $estilos . '</style>';
$cuerpo .= '</head>';
$cuerpo .= '<body>';
$cuerpo .= '<div class="container">';
$cuerpo .= '<div class="thank-you"><h3>¡Gracias por su compra!</h3></div>';
$cuerpo .= '<img src="https://scontent.fhex5-2.fna.fbcdn.net/v/t39.30808-6/271809553_4677616398954273_3880868244671468411_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGcu-H9-1F0Yevsf-lfSfefkxQrHuKvu9OTFCse4q-70_Aljmpboy_0CQwx4gtn5otpzDPIsz2KG8TI9enfLcvv&_nc_ohc=yNbF8OBDMfYAX_DSKIZ&_nc_ht=scontent.fhex5-2.fna&oh=00_AfCMgc7U0UCc8hiPbac-fVJaYofACDRyPwScbVo3psd8Vw&oe=65553195" width="100" height="auto">';
$cuerpo .= '<p>&iexcl;Hola ' . $nombres .  '!</p>';
$cuerpo .= '<p>Aquí tienes un resumen de tu pedido:</p>';
$cuerpo .= '<div class="order-details">';
$cuerpo .= '<p>&iexcl;Gracias por elegir a Ferre Seibo!</p>';
$cuerpo .= '<p>Estamos emocionados de informarte que tu compra ha sido procesada con éxito.   <b>' . $nombre .  '</b> está en camino y pronto lo tendrás en tus manos.</p>';
$cuerpo .= '<div class="order-details">';
$cuerpo .= '<p class="order-info">Orden #: <span> <b>' . $id_transaccion .  '</b></span></p>';
$cuerpo .= '<p class="order-info">Nombre del producto: <span> <b>' . $nombre .  '</b></span></p>';
$cuerpo .= '<p class="order-info">Cantidad: <span> <b>' . $cantidad .  '</b></span></p>';
$cuerpo .= '<p class="order-info">Total: <span> <b>' . $total .  '</b></span></p>';
$cuerpo .= '</div>';
$cuerpo .= '<p>Si tienes alguna pregunta sobre tu pedido o necesitas asistencia, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>';
$cuerpo .= '<p>Agradecemos tu confianza en nosotros y esperamos que disfrutes de tu nuevo producto. <b>' . $nombre .  '</b> Gracias por ser parte de nuestra comunidad</p>';
$cuerpo .= '<div class="support-info"><p>Saludos,<br>El equipo de Ferre Seibo</p></div>';
$cuerpo .= '</div>';
$cuerpo .= '</body>';
$cuerpo .= '</html>';


            $mailer = new Mailer();
            $mailer->enviarCorreo($correo, $asunto, $cuerpo);
        }

       

        // Limpia el carrito de la sesión
        unset($_SESSION['carrito']);
    }
}
