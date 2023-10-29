<?php  

// Requiere los archivos necesarios
require '../config/database.php';
require '../config/config.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])){
   header('Location: ../index.php');
   exit;
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php');
    exit;
 }

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];
$nombres = $_GET['nombres'];


$sql = $con->prepare("SELECT id, nombres, apellidos, correo, telefono, cedula FROM clientes WHERE id = ? LIMIT 1");
$sql->execute([$id]);
$cliente = $sql->fetch(PDO::FETCH_ASSOC);

?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h2  class="mt-3">Editar producto</h2>
        <!-- Categorías -->

        <form action="actualiza.php" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
            <div class="mb-3">
              <label for="nombres" class="form-label">Nombres:</label>
              <input type="text"
                class="form-control" name="nombres" id="nombres" value="<?php echo $cliente['nombres']; ?>" required autofocus>
            </div>

            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
            <div class="col mb-3">
              <label for="apellidos" class="form-label">Apellidos:</label>
              <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $cliente['apellidos']; ?>" required autofocus>
            </div>
            
            <div class="col mb-3">
              <label for="correo" class="form-label">Correo:</label>
              <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $cliente['correo']; ?>" autofocus>
            </div>
            <div class="row mb-2">
            <div class="col mb-3">
              <label for="telefono" class="form-label">Teléfono:</label>
              <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo $cliente['telefono']; ?>" required autofocus>
            </div>

            <div class="col mb-3">
              <label for="cedula" class="form-label">Cédula:</label>
              <input type="number" class="form-control" name="cedula" id="cedula" value="<?php echo $cliente['cedula']; ?>" required autofocus>
            </div>
            </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</main>

<?php require_once '../footer.php';