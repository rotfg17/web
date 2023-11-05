<?php  

// Requiere los archivos necesarios
require '../config/database.php';
require '../config/config.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])){
   header('Location: ../index.php'); // Redirige al inicio si el usuario no está autenticado
   exit;
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php'); // Redirige al inicio principal si el usuario no es un administrador
    exit;
}

$db = new Database(); // Crea una instancia de la clase Database
$con = $db->conectar(); // Establece una conexión a la base de datos

$id = $_GET['id']; // Obtiene el ID de la categoría desde los parámetros GET

$sql = $con->prepare("SELECT id, nombre FROM categoria WHERE id = ? LIMIT 1"); // Prepara una consulta SQL para seleccionar una categoría por su ID
$sql->execute([$id]); // Ejecuta la consulta SQL con el ID obtenido desde los parámetros GET
$categoria = $sql->fetch(PDO::FETCH_ASSOC); // Almacena los resultados en un arreglo asociativo llamado $categoria


?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h2  class="mt-3">Editar categoría</h2>
        <!-- Categorías -->

        <form action="actualiza.php" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" value="<?php echo $categoria['nombre']; ?>" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</main>

<?php require_once '../footer.php';