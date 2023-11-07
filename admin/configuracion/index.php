<?php  

// Incluye los archivos necesarios para la configuración y la conexión a la base de datos
require '../config/database.php';
require '../config/config.php';
require '../clases/cifrado.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])) {
   header('Location: ../index.php'); // Redirige a la página de inicio si el usuario no está autenticado
   exit;
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin') {
    header('Location: ../../index.php'); // Redirige a la página de inicio general si el usuario no es un administrador
    exit;
}

// Establece la conexión a la base de datos
$db = new Database();
$con = $db->conectar();

// Consulta SQL para obtener la configuración del sistema
$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

$config = [];

// Recorre los datos de configuración y almacena en un array asociativo
foreach($datos as $dato){
    $config[$dato['nombre']] = $dato['valor'];
}


?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Configuración</h1>

        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="general.php">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php">Correo electrónico</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="paypal.php">Paypal</a>
  </li>
</ul>
        <br>
        <form action="guarda.php" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="smtp">SMTP</label>
                    <input class="form-control" type="text" name="smtp" id="smtp" value="<?php echo $config['correo_smtp']; ?>">
                </div>

                <div class="col-6">
                    <label for="puerto">Puerto</label>
                    <input class="form-control" type="text" name="puerto" id="puerto" value="<?php echo $config['correo_puerto']; ?>">
                </div>

                <div class="col-6">
                    <label for="correo">Correo electrónico</label>
                    <input class="form-control" type="email" name="correo" id="correo" value="<?php echo $config['correo_email']; ?>">
                </div>

                <div class="col-6">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo $config['correo_password']; ?>">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../footer.php';

