<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require '../config/database.php';
require '../config/config.php';

$db = new Database();
$con = $db->conectar();

// Obtener el término de búsqueda desde la URL
$term = isset($_GET['search']) ? $_GET['search'] : '';

// Consulta para buscar productos que contengan el término de búsqueda
$sql = $con->prepare("SELECT * FROM productos WHERE nombre LIKE :term");

// Añadir comodines % al término de búsqueda para buscar referencias
$term = '%' . $term . '%';

// Bind de parámetro y ejecución de la consulta
$sql->bindParam(':term', $term, PDO::PARAM_STR);
$sql->execute();

// Obtener resultados como un array asociativo
$productos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="128x128"  href="img/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/css.css">
    <title>Ferre Seibo</title>

</head>
<body>
    
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
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
