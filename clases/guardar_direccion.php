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
$idcliente = isset($_POST['id']) ? intval($_POST['id']) : 0;

try {
    // Verifica si la dirección ya existe para el id_cliente
    $sqlVerificarDireccion = $con->prepare("SELECT id FROM direccion WHERE id_cliente = ? AND calle = ? AND ciudad = ? AND opcional = ? AND sector = ? AND activo = 1 LIMIT 1");
    $sqlVerificarDireccion->execute([$idcliente, $calle, $ciudad, $opcional, $sector]);
    $direccionExistente = $sqlVerificarDireccion->fetch(PDO::FETCH_ASSOC);

    if (!$direccionExistente) {
        // La dirección no existe, realiza la inserción
        $sqlDireccion = $con->prepare("INSERT INTO direccion (calle, ciudad, opcional, sector, id_cliente, activo) VALUES (?, ?, ?, ?, ?, 1)");
        $sqlDireccion->execute([$calle, $ciudad, $opcional, $sector, $idcliente]);
    }

    // Obtén información del cliente
    $sqlCliente = $con->prepare("SELECT nombres, apellidos, telefono FROM clientes WHERE id = ? AND activo = 1");
    $sqlCliente->execute([$idcliente]);
    $cliente = $sqlCliente->fetch(PDO::FETCH_ASSOC);

    // Redirige al usuario a la página de destino
    header("Location: ../pago.php");
    exit; // Asegura que no se ejecuten más líneas de código después de la redirección

} catch (PDOException $e) {
    // Manejo de errores: Imprime el mensaje de error
    echo "Error al insertar el registro o al obtener información del cliente: " . $e->getMessage();
}

?>
