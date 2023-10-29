<?php

require 'php/config.php';

// Crear la conexión a la base de datos
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;


$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
     
        $sql = $con->prepare("SELECT id, nombre, precio,descuento, $cantidad AS cantidad FROM productos WHERE id=? "); 
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("location: index.php");
    exit;
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
        <link rel="stylesheet" href="css/css.css">
       <title>Ferre Seibo - Pintura</title>
    </head>
<body>

<?php include 'menu.php'; ?>  

   <main>
    <div class="container product02">

    <div class="row">
        <div class="col-6">
            <h4>Detalles de pago</h4>
            <div id="paypal-button-container"></div>
        </div>

        <div class="col-6">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr> 
                        <th></th>
                        <th>Producto</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr><td colspan="5" class="text-center"><b>No existen productos en el carro de compra</b></td></tr>';
                    } else {
                        $sql = $con->prepare("SELECT count(id) as count FROM productos WHERE id=? ");
                        $total = 0;
                        foreach($lista_carrito as $producto){
                            $_id = $producto['id'];
                            $nombre = $producto['nombre'];
                            $precio = $producto['precio'];
                            $descuento = $producto['descuento'];
                            $precio_desc = $precio - (($precio * $descuento) / 100);
                            $cantidad = $producto['cantidad'];
                            $subtotal = $cantidad * $precio_desc;
                            $total += $subtotal;
                            $imagen_producto = "img/productos/" . $_id . "/principal.jpg";
                    ?>
                    <tr>
                        <td><img src="<?php echo $imagen_producto; ?>" width="70" height="70"></td>
                        <td><?php echo $nombre; ?></td>
                        <td>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                        </td>
                        </tr>
                    <?php } ?>
                    <!-- Total -->
                    <tr>  
                        <td colspan="2">
                            <p class="h2 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                        </td>
                            </tr>
                        </tbody>

                    <?php }?>
                 </table>
            </div>
        </div>
    </div>
</div>
    
</main>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY;?>"></script>
<script>
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions) {
            // Monto en pesos dominicanos (DOP) que deseas recibir
            var monto_en_dop = <?php echo $total; ?>;
            
            // Tipo de cambio actual DOP a USD (obtenido de una fuente confiable)
            var tipo_de_cambio = 56.95; // Este es un valor ficticio, debes usar uno actualizado

            // Convertir el monto de DOP a USD
            var monto_en_usd = monto_en_dop / tipo_de_cambio;

            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: monto_en_usd.toFixed(2), // Redondear a 2 decimales
                        currency_code: 'USD' // Moneda en USD
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            let url = 'clases/captura.php'
            actions.order.capture().then(function(detalles) {
                console.log(detalles)
                return fetch(url, {
                    method: 'post',
                    headers: {
                        'content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles
                    })
                }).then(function(response) {
                    window.location.href = "completado.php?key=" + detalles['id'];
                })
            });
        },
        onCancel: function(data) {
            alert('Pago Cancelado');
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>

<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
        
</body>
</html>