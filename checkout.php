<?php
// Incluye el archivo de configuración para obtener la configuración y las funciones de la base de datos.
require 'php/config.php';

// Crea una instancia de la clase Database para establecer una conexión a la base de datos.
$db = new Database();
$con = $db->conectar();

// Obtiene la información de los productos del carrito desde la sesión.
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

// Crea un arreglo vacío para almacenar la lista de productos en el carrito.
$lista_carrito = array();

// Verifica si hay productos en el carrito antes de continuar.
if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        // Prepara una consulta SQL para obtener detalles de los productos, incluyendo la cantidad especificada.
        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? ");
        $sql->execute([$clave]);

        // Agrega los resultados de la consulta a la lista de productos en el carrito.
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
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

   <main>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr> 
                        <th></th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr><td colspan="5" class="text-center"><b>No existen productos en el carro de compra</b></td></tr>';
                    } else {
                        $sql = $con->prepare("SELECT count(id) as count FROM productos WHERE id=?");
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
                        <td><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?></td>
                        <td>
                            <input type="number" min="1" max="100" step="1" value="<?php echo $cantidad; ?>"
                            size="10" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                        </td>
                        <td>
                            <a id="eliminar" class="btn btn-warning btn-lg xmark" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">
                            <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ',');  ?></p>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
        </div>
        <?php if($lista_carrito != null){ ?>
        <div class="row">
             <div class="col-12 text-center">
                <?php if(isset($_SESSION['user_cliente'])){?>
                <a href="pago.php" class="btn btn-warning btn-lg btn-outline-warning xmark">Realizar pago</a>
                <?php }else{ ?>
                    <a href="login.php?pago" class="btn btn-warning btn-lg btn-outline-warning xmark">Realizar pago</a>
                    <?php } ?>
             </div>           
        </div>
        <?php } ?>
    </div>
</main>


<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="eliminaModalLabel">Mensaje de alerta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      ¿Deseas eliminar el producto de la lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<br><br><br>
<br><br><br>

<?php include 'footer.php'; ?>

<script> 
let eliminaModal = document.getElementById("eliminaModal")
eliminaModal.addEventListener("show.bs.modal", function(event){
	let button = event.relatedTarget
	let id = button.getAttribute("data-bs-id")
	let buttonElimina = eliminaModal.querySelector(".modal-footer #btn-elimina")
	buttonElimina.value= id
})
function eliminar(){

let botonElimina = document.getElementById("btn-elimina")
let id = botonElimina.value


let url = 'clases/actualizar_carrito.php'
let formData = new FormData()
formData.append('action', 'eliminar')
formData.append('id', id)

fetch(url, {
    method:"POST",
    body:formData,
    mode: 'cors'
}).then(response => response.json())
.then(data => {
    if(data.ok){
        location.reload()
       
    }
})
}

function actualizaCantidad(cantidad, id){
    let url = 'clases/actualizar_carrito.php'
    let formData = new FormData()
    formData.append('action', 'agregar')
	formData.append('id', id)
    formData.append('cantidad', cantidad)

    fetch(url, {
        method:"POST",
        body:formData,
        mode: 'cors'
    }).then(response => response.json())
    .then(data => {
        if(data.ok){

            let divsubtotal = document.getElementById('subtotal_' + id)
            divsubtotal.innerHTML = data.sub

            let total = 0.00
            let list = document.getElementsByName('subtotal[]')

            for(let i = 0; i < list.length; i++){
                total += parseFloat(list[i].innerHTML.replace(/[<?php echo MONEDA ?>,]/g, ''))
            }

            total = new Intl.NumberFormat('en-US',{
                minimumFractionDigits: 2
                
            }).format(total)
            document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total 
        }
    })
}
</script>

 <!-- JavaScript para ocultar/mostrar el contenido -->
 <script>
    // Obtén una referencia a los elementos relevantes
    var categoryToggle = document.getElementById("category-toggle");
    var content = document.querySelector(".hdn-content");

    // Agrega un controlador de eventos para alternar la visibilidad
    categoryToggle.addEventListener("click", function() {
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
</script>

<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
        
</body>
</html>