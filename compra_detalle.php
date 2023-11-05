<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require 'php/config.php';

// Se incluye el archivo 'clienteFunciones.php' ubicado en la carpeta 'clases'.
require 'clases/clienteFunciones.php';

// Se recupera el valor de la variable 'token' almacenada en la sesión del usuario.
$token_session = $_SESSION['token'];

// Se recupera el valor del parámetro 'orden' desde la URL a través del método GET y se asigna a la variable $orden.
$orden = $_GET['orden'] ?? null;

// Se recupera el valor del parámetro 'token' desde la URL a través del método GET y se asigna a la variable $token.
$token = $_GET['token'] ?? null;

// Se realiza una serie de comprobaciones para verificar la validez de los parámetros 'orden' y 'token'.
// Si no son válidos, se redirige al usuario a la página 'compras.php' y se finaliza la ejecución del script.
if ($orden == null || $token == null || $token != $token_session) {
    header("Location: compras.php");
    exit;
}

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();

// Se establece una conexión a la base de datos y se asigna a la variable $con.
$con = $db->conectar();

// Se prepara una consulta SQL para seleccionar datos de la tabla 'compra' basados en la 'id_transaccion' proporcionada, limitando a un solo resultado.
$sqlCompra = $con->prepare("SELECT id, id_transaccion, fecha, total FROM compra WHERE id_transaccion = ? LIMIT 1");

// Se ejecuta la consulta SQL con el valor de 'orden' como parámetro.
$sqlCompra->execute([$orden]);

// Se obtienen los resultados de la consulta en forma de un array asociativo y se asignan a la variable $rowCompra.
$rowCompra = $sqlCompra->fetch(PDO::FETCH_ASSOC);

// Se extrae el valor de 'id' de la fila resultante y se asigna a la variable $idCompra.
$idCompra = $rowCompra['id'];

// Se crea un objeto DateTime a partir de la fecha obtenida de la consulta y se formatea como 'd/m/Y'.
$fecha = new DateTime($rowCompra['fecha']);
$fecha = $fecha->format('d/m/Y');

// Se prepara otra consulta SQL para seleccionar datos de la tabla 'detalle_compra' relacionados con la compra en cuestión.
$sqlDetalle = $con->prepare("SELECT id, nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");

// Se ejecuta la consulta SQL con el valor de $idCompra como parámetro.
$sqlDetalle->execute([$idCompra]);

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
    <div class="container br">
            
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                   <strong> Detalles de la Compra </strong>
                </div>
                <div class="card-body">
                    <p><strong>
                    Pedido realizado: </strong><?php  echo $fecha; ?></p>
                    <p><strong>Detalles finales del pedido: #</strong><?php  echo $rowCompra['id_transaccion']; ?></p>
                    <p><strong>Total del pedido: </strong><?php  echo DOLAR . ' '. number_format($rowCompra['total'], 2, '.', ','); ?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
    <div class="table-responsive">
        <table class='table '> 
        <thead>
            <tr>
                <th>Productos</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
             while($row = $sqlDetalle->fetch(PDO::FETCH_ASSOC)){
            $precio = $row['precio']; 
            $cantidad = $row['cantidad'];
            $subtotal = $precio * $cantidad;
            ?>
            <tr>
                <td><?php echo $row['nombre'];?></td>
                <td><?php echo MONEDA .' '. number_format($precio, 2, '.', ',');?></td>
                <td><?php echo $cantidad;?></td>
                <td><?php echo MONEDA .' '. number_format($subtotal, 2, '.', ',');?></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
            </div>
        </div>
    </div>
    </div>
    
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
