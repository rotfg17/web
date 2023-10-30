<?php

require 'php/config.php';

$db = new Database();
$con = $db->conectar();


$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '')  {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha256', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        // Aquí asumimos que $conexion ya está configurada correctamente.
        
        $sql = $con->prepare("SELECT count(id) as count FROM productos WHERE id=? ");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0){

            $sql = $con->prepare("SELECT nombre, marca, descripcion, precio, descuento, num_referencia FROM productos WHERE id=?  LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $marca = $row['marca'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $num_referencia = $row['num_referencia'];
            $precio_des = $precio - (($precio * $descuento ) / 100);
            $dir_images = 'img/productos/' . $id . '/';
            $imagenes = [];

            $rutaimgJPG = $dir_images . 'principal.jpg';
            $rutaimgJPEG = $dir_images . 'principal.jpg';
            $rutaimgPNG = $dir_images . 'principal.png';
            $rutaimgWebP = $dir_images . 'principal.webp';
            $dir = dir($dir_images);
            
            if (!file_exists($rutaimgJPG) && !file_exists($rutaimgJPEG) && !file_exists($rutaimgPNG) && !file_exists($rutaimgWebP)) {
                $rutaimg = 'img/no-photo.jpg'; // Imagen de respaldo si ninguna de las tres versiones existe
            } else {
                // Aquí puedes decidir cuál de las tres versiones utilizar
                if (file_exists($rutaimgJPG)) {
                    $rutaimg = $rutaimgJPG; // Utilizar la versión JPG si existe
                } elseif (file_exists($rutaimgJPEG)) {
                    $rutaimg = $rutaimgJPEG; // Utilizar la versión PNG si existe
                } elseif (file_exists($rutaimgPNG)) {
                    $rutaimg = $rutaimgPNG; // Utilizar la versión PNG si existe
                } elseif (file_exists($rutaimgWebP)) {
                    $rutaimg = $rutaimgWebP; // Utilizar la versión WebP si existe
                }
            }
            

            while(($archivo = $dir->read()) !=false){
                if($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg')|| strpos($archivo, 'png') || strpos($archivo, 'webp'))){
                    $imagenes[] = $dir_images . $archivo;
                }
            }
            $dir->close();
        }
           
        $sqlCaracter = $con->prepare("SELECT DISTINCT(det.id_caracteristica) AS idCat, cat.caracteristica FROM det_pro_caracter AS det INNER JOIN caracteristicas
         AS cat ON det.id_caracteristica = cat.id  WHERE det.id_producto = ? ");
         $sqlCaracter->execute([$id]);
       
    } else {
        echo 'Error al procesar la petición';
        exit;
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

        <title>Ferre Seibo - Detalles</title>
    </head>
<body>

<?php include 'menu.php'; ?>

   <main>
   <div class="product-container1 mb-6">
    <div class="product01">
        <img src="<?php echo $rutaimg; ?>" alt="Producto 1" class="product_image1">
        <div class="thumbnail-container">
            <img class="thumbnail active" src="<?php echo $rutaimg; ?>" alt="">
            <?php
            foreach ($imagenes as $img) {
                if ($img !== $rutaimg) { // Excluye la imagen principal
                    echo '<img src="' . $img . '" class="thumbnail">';
                }
            }
            ?>
        </div>
    </div>

          
          <div class="container-info-product">
            <div class="titulo">
            <br>
            <span><?php echo  $nombre;?></span>  
            </div>

            <div class="container-details-product">
                <div class="form-group">
                  <p>Referencia | SKU: <?php echo  $num_referencia;?></p>  
                </div>

                <div class="form-group">
                <p>marca | <?php echo  $marca;?></p>
                  </div>

                <div class="form-group">
                <p id="price">  Precio: <span id="price-value"><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></span> (ITBIS Inc.)</p>

                  </div>
            </div>

            <div class="form-group">
                    
                    <?php

                    while($row_cat = $sqlCaracter->fetch(PDO::FETCH_ASSOC)){
                        $idCat = $row_cat['idCat'];
                        echo $row_cat['caracteristica'] . " ";

                        echo "<select class='form-group' id='cat_$idCat'>";

                        $sqlDet = $con->prepare("SELECT id, valor, stock FROM 
                        det_pro_caracter  WHERE id_producto=? AND id_caracteristica=?");
                        $sqlDet->execute([$id, $idCat]);
                        while ($row_det =$sqlDet->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option id='" . $row_det['id'] . "'>" . $row_det['valor'] . "</option>";
                        }

                        echo "</select>";
                    }

                    ?>

                </div>    

            <div class="container-add-cart">
                <div class="container-quantity" >
                    <input
                        type="number"
                        class="input-quantity"
                        placeholder="1"
                        value="1"
                        min="1"
                        id="cantidad"
                        name="Cantidad">
                    <div class="btn-increment-decrement">
                        <i class="fa-solid fa-chevron-up" id="increment"></i>
                        <i class="fa-solid fa-chevron-down" id="decrement"></i>
                    </div>
                </div>
                <button class="btn-cart" type="button">Comprar ahora</button>
                    <button class="btn-add-to-cart" type="button" onclick="addProducto(<?php echo $id; ?>, cantidad.value,
                     '<?php echo $token_tmp; ?>')">Añadir al carrito</button>
                     
            </div>
            

            <div class="container-description">
                <div class="title-description">
                    <h4>Descripción</h4>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="text-description">
                    <p>
                       <?php echo $descripcion;?>
                    </p>
                </div>
            </div>

           <!--<div class="container-additional-information">
                <div class="title-additional-information">
                    <h4>Información adicional</h4>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="text-additional-information hidden">
                </div>
            </div> -->
                <div class="container-social">
					<span>Compartir</span>
					<div class="container-buttons-social">
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-twitter"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
					</div>
                    </div>
                </div>
                    </div>
                </div>
        </main>
        <br><br><br>
        <br><br><br>
        <br><br>

        <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>