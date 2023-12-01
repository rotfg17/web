<?php  
require '../php/config.php';

// Crea una instancia de la clase Database para conectarse a la base de datos
$db = new Database();
$con = $db->conectar();

// Validación y sanitización de datos del formulario POST
$calle = isset($_POST['calle']) ? htmlspecialchars($_POST['calle']) : '';
$ciudad = isset($_POST['ciudad']) ? htmlspecialchars($_POST['ciudad']) : '';
$opcional = isset($_POST['opcional']) ? htmlspecialchars($_POST['opcional']) : '';
$sector = isset($_POST['sector']) ? htmlspecialchars($_POST['sector']) : '';

// Obtén el id_cliente de la sesión o de donde lo obtienes
// Esto es solo un ejemplo; asegúrate de obtenerlo de la manera correcta
$id_cliente = isset($_POST['id_cliente']) ? intval($_POST['id_cliente']) : 0;

try {
    // Prepara una consulta SQL para insertar una nueva dirección en la base de datos
    $sqlDireccion = $con->prepare("INSERT INTO direccion (calle, ciudad, opcional, sector, id_cliente, activo) VALUES (?, ?, ?, ?, ?, 1)");
    $sqlDireccion->execute([$calle, $ciudad, $opcional, $sector, $id_cliente]);

    // Obtén información del cliente
    $sqlCliente = $con->prepare("SELECT nombres, apellidos, telefono FROM clientes WHERE id = ? AND activo = 1");
    $sqlCliente->execute([$id_cliente]);
    $cliente = $sqlCliente->fetch(PDO::FETCH_ASSOC);

    // Redirige al usuario a la página de destino
    header("Location: ../pago.php");
    exit; // Asegura que no se ejecuten más líneas de código después de la redirección

} catch (PDOException $e) {
    // Manejo de errores: Imprime el mensaje de error
    echo "Error al insertar el registro o al obtener información del cliente: " . $e->getMessage();
}
?>
