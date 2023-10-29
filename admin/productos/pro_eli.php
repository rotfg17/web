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

$sql = "SELECT id, nombre, marca, descripcion, precio, descuento, stock, num_referencia, id_categoria FROM productos WHERE activo = 0";
$resultado = $con->query($sql);
$productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3">Categorías</h2>
        <!-- Categorías-->

        <a href="index.php" class="btn btn-primary">Activas</a>
        <a href="cat_eli.php" class="btn btn-primary">Eliminadas</a>
            <br><br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Categoría</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($productos as $producto) { ?>
                        <tr>
                        <td><?php echo $producto['id'] ?></td>
                            <td><?php echo $producto['nombre'] ?></td>
                            <td><?php echo $producto['marca'] ?></td>
                            <td><?php echo $producto['descripcion'] ?></td>
                            <td><?php echo $producto['precio'] ?></td>
                            <td><?php echo $producto['descuento'] ?></td>
                            <td><?php echo $producto['stock'] ?></td>
                            <td><?php echo $producto['num_referencia'] ?></td>
                            <td><?php echo $producto['id_categoria'] ?></td>
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