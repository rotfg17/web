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

$sql = "SELECT id, nombre FROM categoria WHERE activo = 1"; // Consulta SQL para seleccionar categorías activas
$resultado = $con->query($sql); // Ejecuta la consulta SQL
$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC); // Obtiene un array asociativo con los resultados


?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3">Categorías</h2>
        <!-- Categorías-->

        <a href="nuevo.php" class="btn btn-primary">Agregar</a>
        <a href="cat_eli.php" class="btn btn-primary">Eliminadas</a>
            <br><br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($categorias as $categoria) { ?>
                        <tr>
                            <td><?php echo $categoria['id'] ?></td>
                            <td><?php echo $categoria['nombre'] ?></td>
                            <td><a class="btn btn-warning btn-sm" href="edita.php?id=<?php echo 
                            $categoria['id']; ?>">Editar</a></td>
                            <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina" data-bs-id=" <?php echo $categoria['id'] ?>">
                            <i class="fa-solid fa-xmark"></i>
                            </button>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        

    </div>
</main>

<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalElimina" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Confirmar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Deseas eliminar esta categoría?
            </div>
            <div class="modal-footer">
                <form action="elimina.php" method="post">

                <input type="hidden" name="id">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Este script funciona para eliminar la categoria deseada -->
<script>
    let eliminaModal = document.getElementById('modalElimina')
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let modalInput = eliminaModal.querySelector('.modal-footer input')
        modalInput.value = id
    })

</script>

<?php require_once '../footer.php';