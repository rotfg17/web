<?php
require 'php/config.php';
require 'clases/clienteFunciones.php';

$token_session = $_SESSION['token'];
$orden = $_GET['orden'] ?? null;
$token = $_GET['token'] ?? null;

if ($orden == null || $token == null || $token != $token_session) {
    header("Location: compras.php");
    exit;
}

$db = new Database();
$con = $db->conectar();

$sqlCompra = $con->prepare("SELECT id, id_transaccion, fecha, total FROM compra WHERE id_transaccion = ? LIMIT 1");
$sqlCompra->execute([$orden]);
$rowCompra = $sqlCompra->fetch(PDO::FETCH_ASSOC);
$idCompra = $rowCompra['id'];

$fecha = new DateTime($rowCompra['fecha']);
$fecha = $fecha->format('d/m/Y');


$sqlDetalle = $con->prepare("SELECT id,  nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
$sqlDetalle->execute([$idCompra]);

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
                <th></th>
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
