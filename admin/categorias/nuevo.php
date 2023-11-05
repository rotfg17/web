<?php  

// Requiere los archivos necesarios
require '../config/database.php'; // Incluye el archivo que define la clase de base de datos
require '../config/config.php';  // Incluye el archivo de configuración con constantes y la inicialización de la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])){
   header('Location: ../index.php'); // Redirige al inicio si el usuario no está autenticado
   exit; // Finaliza la ejecución del script
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php'); // Redirige al inicio principal si el usuario no es un administrador
    exit; // Finaliza la ejecución del script
}

$db = new Database(); // Crea una instancia de la clase Database para gestionar la conexión a la base de datos
$con = $db->conectar(); // Establece una conexión a la base de datos y almacena el objeto de conexión en la variable $con


?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h2  class="mt-3">Nueva categoría</h2>
        <!-- Categorías -->

        <form action="guarda.php" method="post" autocomplete="off">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</main>

<?php require_once '../footer.php';