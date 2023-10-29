<?php

$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;

require_once $path . 'database.php';
require_once $path . '/../admin/clases/cifrado.php';

$db = new Database();
$con = $db->conectar();

$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [];

foreach($datos as $dato){
    $config[$dato['nombre']] = $dato['valor'];
}

//Configuracion del sistema
define("SITE_URL", "http://localhost/website"); 
define("KEY_TOKEN", "FERRE.2023-mon--2598301*");
define("MONEDA", "RD$");
define("DOLAR", "USD$");


//Configuracion Paypal
define("CLIENT_ID", "AdQ05myVMQmkF9wVllz2WY6JekeJz1ZlWq4BYIJRDA0OXEnT_lsq4cV71vLWXgrR5nedXD_-yyrn6HO_");
define("CURRENCY", "USD");


//Datos para envio de correo electronico 
define("MAIL_HOST", $config['correo_smtp']);
define("MAIL_USER", $config['correo_email']);
define("MAIL_PASS", descifrar($config['correo_password'], ['key' => KEY_CIFRADO, 'method' => METODO_CIFRADO]));
define("MAIL_PORT", $config['correo_puerto']);

;

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}


?>