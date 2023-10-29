<?php

require_once 'config/database.php';
$db = new Database();
$con = $db->conectar();


$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE id_categoria=12 and activo=1 ");
$sql->execute();
$resultado = $sql->fetcHAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" sizes="128x128"  href="img/favicon.ico">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/css.css">

        <title>Ferre Seibo - Pintura</title>
    </head>
<body>
    <div class="sidebar">
        <div class="hdn-head">
            <a href="#" ><h2>Hola, Inicia sesión</h2></a>
        </div>
        <div class="hdn-content">
            <h3>Todas las categorías</h3>
            <ul>
                <div>
                    <a href="herraminetas.html"><li>Herramientas</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                  <a href="herreria.html"> <li>Herreria</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                    <a href="jardineria.html"><li>Jardinería</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                   <a href="quimicos.html"><li>Químico</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                   <a href="madera.html"><li>Madera</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                   <a href="refrigeracion.html"><li>Refrigeración</li></a> <i class="fa-solid fa-angle-right"></i>
                </div>

                <div>
                    <a href="pintura.html"><li>Pintura</li></a><i class="fa-solid fa-angle-right"></i>
                </div>

                <div>
                 <a href="pinturasking.html"><li>Pinturas King</li></a><i class="fa-solid fa-angle-right"></i>
                </div>

                <div>
                   <a href="ebanisteria.html"><li>Ebanisteria</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                  <a href="plomeria.html"><li>Plomería</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                   <a href="cerrajeria.html"><li>Cerrajería</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                  <a href="accesoriosbano.html"><li>Accesorios de Baño</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                
                <div>
                   <a href="construccion.html"> <li>Construcción Ligera</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                    <a href="agregados.html"><li>Agregados</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                  <a href="accesoriospintura.html"><li>Accesorios de Pintura</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                   <a href="productosgenerales.html"><li>Productos Generales</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
                <div>
                  <a href="electricidad.html"><li>Electricidad</li></a><i class="fa-solid fa-angle-right"></i>
                </div>
            </ul>
        </div>
    </div>
    <i class="fa-solid fa-xmark"></i>
    <div class="triangle"></div>
        <div class="hdn-sign">
            <div class="hdn-table">
                <div>
                <h3>
                    Tu Lista
                </h3>
                <ul>
                    <li>Crear una lista</li>
                </ul>
            </div>
            <div class="hdn-line"></div>
            <div>
                <h3>Tu cuenta</h3>
                <ul>
                    <li>Iniciar sesión</li>
                    <li>Mi perfil</li>
                    <li>Mis pedidos</li>
                   <a href="acercade.html"><li>Nuestra tienda</li></a> 
                    <a href="https://wa.me/c/18095523071" target="_blank"><li>Contáctanos</li></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="black"></div>
   <header>
    <div class="first">
        <div class="flex logo">
       <a href="index.html"><img src="img/Logo.png"></a> 
        </div>
        <div class="flex input">
            <input type="text" placeholder="Buscar">
            <i class="fas fa-search"></i>
        </div>
    <div class="flex right">
       <div class="sign">
        <span>Hola, Inicia sesión</span>
            <div class="flex ac">
                <span>Mi cuenta y pedidos</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
       </div>
       <div class="flex cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="ca">Carrito</span>
                <p>0</p>
            </div>
        </div>
    </div>
    <div class="second">
        <div class="second-1">
            <div>
                <i class="fas fa-bars"></i>
                <p class="menu-icon">Menú</p>
                <span>Todas las categorías</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
        <div class="second-2">
            <ul>
                <i class="fa-solid fa-headset"></i>
              <li>Servicio al cliente</li>
              <i class="fa-solid fa-book-open"></i>
              <a href="blog.html"><li>Blogs</li></a>
              <i class="fa-solid fa-phone"></i>
              <li>Contacto</li>
            </ul>
        </div>
    </div>
   </header>  

   <div class="banner-especial -1r">
   <a href="http://www.pinturastropical.com.do/site/?page_id=165" target="_blank"><img class="img-responsive vdk" src="img/PINTURA.png" alt="Pintura" width="100%" height="auto" ></a> 
    </div>
   <section class="product02"> 
    <div class="container-products" id="product-container">
    <?php foreach($resultado as $row) {?>
        <div class="product-card">
        
            <div class="card-product">
                <div class="container-img">
                <?php 

            $id = $row['id'];
            $imagen = "img/pinturas/" .$id. "/principal.png";

            if (!file_exists($imagen)) {
                $imagen = "img/no-photo.jpg";
            }
            
            ?>
            <a href="acople.html"> <img src="<?php echo $imagen; ?>"></a>
                  
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                        <span><i class="fa-solid fa-code-compare"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <p class="price">$ <?php echo number_format($row['precio'], 2, '.',','); ?></p> 
                   <a href="acople.html"><h3><?php echo $row['nombre']; ?></h3> </a> 
                    <span class="add-cart"><a href="#">Agregar al carro</a></span>
                   
                </div> 
                
            </div>
        </div>
        <?php }?>
</section>
   <section class="paginacion">
    <ul>
        <li><a href="pintura.php" class="active">1</a></li>
        <li><a href="pinturapag2.php">2</a></li>
        <li><a href="pinturapag3.php">3</a></li>
        <li><a href="pinturapag4.html">4</a></li>
        <li><a href="pinturapag5.html">5</a></li>
    </ul>
</section>

   <script src="js/script.js"></script>

<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>