<?php

require 'php/database.php';
require 'php/config.php';

$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$error = '';
if($id_transaccion == ''){
    $error = 'Error al procesar la peticion';
} else {
    $sql = $con->prepare("SELECT count(id) FROM compra WHERE id_transaccion=? and status=?");
    $sql->execute([$id_transaccion, 'COMPLETED']);
    if($sql->fetchColumn() > 0 ) {

        $sql = $con->prepare("SELECT id, fecha, correo, total FROM compra Where id_transaccion=? and status=? LIMIT 1");
        $sql->execute([$id_transaccion, 'COMPLETED']);
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        $idCompra =$row['id'];
        $total =$row['total'];
        $fecha =$row['fecha'];

        $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
        $sqlDet->execute([$idCompra]);
    } else {
        $error = 'Error al comprobar la compra';
    }
}

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/css.css">

        <title>Ferre Seibo - Pintura</title>
    </head>
<body>
   
    <?php  include 'menu.php'; ?>

    <section class="product02" style="background-color: #f5f5f5; padding: 20px; text-align: center;">
    <div class="container">
        <?php if(strlen($error) > 0) { ?>
            <div class="row">
                <div class="col">
                    <h2 style="color: red;"><?php echo $error; ?></h2>
                </div>
            </div>
        <?php } else { ?>
            <div class="container-products" id="product-container">
                <div class="col">
                    <h3><b>Id. de transacción:</b> <?php echo $id_transaccion; ?></h3>
                    <h3><b>Fecha de la transacción:</b> <?php echo $fecha; ?></h3>
                    <h3><b>Total:</b> <?php echo DOLAR . number_format($total, 2, '.', '.'); ?></h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {
                                $importe = $row_det['precio'] * $row_det['cantidad']; ?>
                                <tr>
                                    <td><?php echo $row_det['cantidad']; ?></td>
                                    <td><?php echo $row_det['nombre']; ?></td>
                                    <td><?php echo $importe; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</section>




<script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>