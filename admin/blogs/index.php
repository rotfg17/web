<?php 

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require '../config/config.php'; 
require '../config/database.php'; 

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


$stmt = "SELECT * FROM entradas_blog where activo=1 ORDER BY fecha_publicacion DESC ";
$resultado = $con->query($stmt);
$entradas = $resultado->fetchAll(PDO::FETCH_ASSOC);

// Parámetros de paginación
$porPagina = 15; // Número de resultados por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual


// Total de resultados
$totalResultados = $resultado->rowCount();

// Calcular el número total de páginas
$totalPaginas = ceil($totalResultados / $porPagina);

// Calcular el índice de inicio
$indiceInicio = ($pagina - 1) * $porPagina;

// Consulta para obtener los resultados de la página actual
$sqlPaginacion = $stmt . " LIMIT $indiceInicio, $porPagina";
$resultadoPaginacion = $con->query($sqlPaginacion);
$productos = $resultadoPaginacion->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../header.php'; ?>
<div class="container-fluid px-4">
<h2  class="mt-3">Entradas de blogs</h2>
<br>
<a href="procesar_entrada.php" class="btn btn-primary">Agregar</a>

        <br><br>

        <table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Contenido</th>
            <th>Publicado</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entradas as $entrada) : ?>
            <tr>
                <td><?= $entrada['titulo']; ?></td>
                <td><?= substr($entrada['contenido'], 0, 100); ?>...</td>
                
                <td><?= $entrada['fecha_publicacion']; ?></td>
                
                <td>
                    <a class="btn btn-warning btn-sm" href="edita.php?id=<?php echo $entrada['id']; ?>">Editar</a>
                </td>
                <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalElimina"
                data-bs-id=" <?php echo $entrada['id'] ?>">
                <i class="fa-solid fa-xmark"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

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
            ¿Deseas eliminar esta entrada de blog?
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
    
    </div>
<?php include '../footer.php'; ?>