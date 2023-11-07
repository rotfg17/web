<?php

require '../config/database.php';
require '../config/config.php';
require '../clases/cifrado.php';
include '../header.php';

// Establece la conexión a la base de datos
$db = new Database();
$con = $db->conectar();

// Recopila los datos del formulario
$smtp = $_POST['smtp'];
$puerto = $_POST['puerto'];
$correo = $_POST['correo'];
$password = cifrar($_POST['password']); // Se cifra la contraseña antes de almacenarla en la base de datos

// Prepara y ejecuta las consultas para actualizar la configuración en la base de datos
$sql = $con->prepare("UPDATE configuracion SET valor = ? WHERE nombre = ?");
$sql->execute([$smtp, 'correo_smtp']);
$sql->execute([$puerto, 'correo_puerto']);
$sql->execute([$correo, 'correo_email']);
$sql->execute([$password, 'correo_password']);


?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Configuración actualizada</h2>
        
        <a href="index.php" class="btn btn-primary">Regresar</a>
    </div>
</main>

<?php include '../footer.php';