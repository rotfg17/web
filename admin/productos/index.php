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

// Parámetros de paginación
$porPagina = 15; // Número de resultados por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual

// Consulta SQL
$sql = "SELECT id, nombre, marca, descripcion, precio, descuento, stock, num_referencia, id_categoria FROM productos WHERE activo = 1";
$resultado = $con->query($sql);
$productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

// Total de resultados
$totalResultados = $resultado->rowCount();

// Calcular el número total de páginas
$totalPaginas = ceil($totalResultados / $porPagina);

// Calcular el índice de inicio
$indiceInicio = ($pagina - 1) * $porPagina;

// Consulta para obtener los resultados de la página actual
$sqlPaginacion = $sql . " LIMIT $indiceInicio, $porPagina";
$resultadoPaginacion = $con->query($sqlPaginacion);
$productos = $resultadoPaginacion->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../header.php';?>
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-3">Productos</h2>
        <!-- Productos-->

        <a href="nuevo.php" class="btn btn-primary">Agregar</a>
        <a href="pro_eli.php" class="btn btn-primary">Eliminadas</a>
            <br><br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>                   
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
                            <td><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES); ?></td>
                            <td><?php echo $producto['marca'] ?></td>
                            <td><?php echo $producto['descripcion'] ?></td>
                            <td><?php echo $producto['precio'] ?></td>
                            <td><?php echo $producto['descuento'] ?></td>
                            <td><?php echo $producto['stock'] ?></td>
                            <td><?php echo $producto['num_referencia'] ?></td>
                            <td><?php echo $producto['id_categoria'] ?></td>
                            <td><a class="btn btn-warning btn-sm" href="edita.php?id=<?php echo 
                            $producto['id']; ?>">Editar</a></td>
                            <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina"
                              data-bs-id=" <?php echo $producto['id'] ?>">
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
            ¿Deseas eliminar este producto?
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

<!-- Este script funciona para eliminar el producto deseada -->
<script>
    let eliminaModal = document.getElementById('modalElimina')
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let modalInput = eliminaModal.querySelector('.modal-footer input')
        modalInput.value = id
    })

</script>

<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <?php if ($pagina > 1): ?>
      <li class="page-item">
        <a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link" aria-hidden="true">&laquo;</span>
      </li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
      <li class="page-item <?php echo ($i == $pagina) ? 'active' : ''; ?>">
        <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($pagina < $totalPaginas): ?>
      <li class="page-item">
        <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link" aria-hidden="true">&raquo;</span>
      </li>
    <?php endif; ?>
  </ul>
</nav>


<?php require_once '../footer.php';