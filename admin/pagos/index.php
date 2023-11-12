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
$sql = "SELECT c.id, c.id_transaccion, c.fecha, c.status, c.correo,cl.nombres, cl.apellidos, c.total, c.medio_pago  FROM compra c
INNER JOIN clientes cl ON c.id_cliente = cl.id";
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
        <h2 class="mt-3">Pagos</h2>
            <br><br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>                   
                        <th scope="col">Orden #</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Status</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Total pedido</th>
                        <th scope="col">Método de pago</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($productos as $producto) { ?>
                        <tr>                          
                            <td><?php echo htmlspecialchars($producto['id_transaccion'], ENT_QUOTES); ?></td>
                            <td><?php echo $producto['fecha'] ?></td>
                            <td><?php echo $producto['status'] ?></td>
                            <td><?php echo $producto['correo'] ?></td>
                            <td><?php echo $producto['nombres'] ?></td>
                            <td><?php echo $producto['apellidos'] ?></td>
                            <td><?php echo $producto['total'] ?></td>
                            <td><?php echo $producto['medio_pago'] ?></td>
                            <td>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


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