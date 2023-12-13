<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require 'php/config.php';

// Se incluye el archivo 'clienteFunciones.php' ubicado en la carpeta 'clases'.
require 'clases/clienteFunciones.php';

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();

// Se establece una conexión a la base de datos y se asigna a la variable $con.
$con = $db->conectar();

// Se genera un token utilizando la función 'generarToken' (no se muestra en el código proporcionado).
$token = generarToken();

// Se almacena el token en la sesión del usuario para su posterior uso.
$_SESSION['token'] = $token;

// Se recupera el ID del cliente de la sesión y se asigna a la variable $idCliente.
$idCliente = $_SESSION['user_cliente'];

// Se prepara una consulta SQL para seleccionar datos de la tabla 'compra' basados en el 'idCliente' del usuario.
// Los resultados se ordenan por fecha en orden descendente (últimas compras primero).
$sql = $con->prepare("SELECT id_transaccion, fecha, status, total, medio_pago FROM compra WHERE id_cliente = :idCliente ORDER BY DATE(fecha) DESC");

// Se ejecuta la consulta SQL, pasando el valor de ':idCliente' como un parámetro.
$sql->execute([':idCliente' => $idCliente]);


// Fin de la sección de código PHP.
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
    
<?php include 'menu.php'; ?> 
  
<main>
    <div class="container p-4">
            <h1>Mis pedidos</h1>
            <hr>

            <?php while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                
            

            <div class="card  mb-4 ">
        <div class="card-header">
            Pedido realizado <br> <?php echo $row['fecha'] ?>
        </div>
        
        <div class="card-body">
            <h5 class="card-title">Orden #<?php echo $row['id_transaccion']; ?></h5>
            <p class="card-text">Total <?php echo $row['total']; ?></p>
            
            
            <a href="compra_detalle.php?orden=<?php echo $row['id_transaccion']; ?>&token=<?php echo $token; ?>" class="btn btn-warning">Ver compra</a>
        </div>
        </div>

        <?php  } ?>
    </div>    
</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
