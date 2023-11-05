<?php 

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require 'config/config.php'; 
require 'config/database.php'; 

// Verifica si el usuario está autenticado. Si no lo está, redirige a la página de inicio.
if (!isset($_SESSION['user_type'])){
    header('Location: index.php');
    exit;
}

// Verifica si el usuario es de tipo 'admin'. Si no lo es, redirige a la página de inicio.
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../index.php');
    exit;
}

// Se crea una instancia de la clase Database para manejar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();


?>

<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
    </div>
</main>
<?php include 'footer.php'; ?>