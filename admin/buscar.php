<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require '../php/config.php';



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
    
<?php include 'header.php'; ?> 
 


<section>
<h2>Resultado de Búsqueda</h2>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <!-- Encabezados de la tabla -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <!-- Celdas de la tabla para mostrar los detalles del producto -->
                    <td><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES); ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['descuento']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td><?php echo $producto['num_referencia']; ?></td>
                    <td><?php echo $producto['id_categoria']; ?></td>
                    <!-- Puedes agregar más celdas según tus necesidades -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
