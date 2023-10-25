<?php 

require 'php/config.php';


$db = new Database();
$con = $db->conectar();

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

        <title>Ferre Seibo - Agregados</title>
    </head>
<body>
   
    <?php  include 'menu.php'; ?>  
        
   <div class="banner-especial -1r">
    <img class="img-responsive vdk" src="img/Enterate.png" alt="Contactanos" width="100%" height="auto" >
    </div>
    <h1 class="title-color title-xs">BLOG</h1>


       <div class="content">
        <div class="sec section1">
            <div class="content-base right">
              <div class="content-base-right">
                <h2>
                  <a href="tipostarugos.html">Tipos de tarugos: ¿Cómo elegir el ideal?</a>
                </h2>
                <p>En Ferre Seibo descubre los diversos tipos de tarugos para tus proyectos de construcción. Conoce sus tipos, usos y cómo elegir el adecuado. ¡Entra aquí!</p>
              </div>
              <div class="content-base-left">
                <div class="content-base-wrapImage">
                  <a href="tipostarugos.html">
                    <div class="img-bg" style="background-image: url('img/tarugos.png');background-position: inherit;"></div>
                    <img src="img/tarugos.png" alt="clases-de-tarugos">
                  </a>
                </div>
              </div>
            </div>
            <div class="content-base left">
              <div class="content-base-left">
                <div class="content-base-wrapImage">
                  <a href="tiposcerraduras.html">
                    <div class="img-bg" style="background-image: url('img/cerradura.png');background-position: inherit;"></div>
                    <img src="img/cerradura.png" alt="Tipos de cerraduras">
                  </a>
                </div>
              </div>
              <div class="content-base-right">
                <h2>
                  <a href="tiposcerraduras.html">Tipos de cerraduras: ¿Cómo elegir la ideal?</a>
                </h2>
                <p>En Ferre Seibo descubre los diferentes tipos de cerraduras disponibles para brindar seguridad a tu hogar y encuentra tu opción ideal. ¡Entra aquí!</p>
              </div>
            </div>
            </div>

            <div class="sec section1">
                <div class="content-base right">
                  <div class="content-base-right">
                    <h2>
                      <a href="interruptores.html">Tipos de interruptores: Características, usos y más</a>
                    </h2>
                    <p>En Ferre Seibo explora los diferentes tipos de interruptores y sus características para que selecciones el más adecuado para tus necesidades. ¡Entra aquí!</p>
                  </div>
                  <div class="content-base-left">
                    <div class="content-base-wrapImage">
                      <a href="interruptores.html">
                        <div class="img-bg" style="background-image: url('img/interruptores.png');background-position: inherit;"></div>
                        <img src="img/interruptores.png" alt="clases-de-tarugos">
                      </a>
                    </div>
                  </div>
                </div>

            <div class="content-base left">
                <div class="content-base-left">
                  <div class="content-base-wrapImage">
                    <a href="tipospvc.html">
                      <div class="img-bg" style="background-image: url('img/pvc.jpg');background-position: inherit;"></div>
                      <img src="img/pvc.jpg" alt="Tipos de cerraduras">
                    </a>
                  </div>
                </div>
                <div class="content-base-right">
                  <h2>
                    <a href="tipospvc.html">Tipos de tubos de PVC: La Guía definitiva</a>
                  </h2>
                  <p>En Ferre Seibo te enseñamos los diferentes tipos de tubos de PVC existentes. Exploraremos sus usos, ventajas y características y más. ¡Descúbrelos!</p>
                </div>
              </div>
              </div>

              <div class="sec section1">
                <div class="content-base right">
                  <div class="content-base-right">
                    <h2>
                      <a href="tipostaladros.html">Tipos de taladros: La Guía definitiva</a>
                    </h2>
                    <p>En Ferre Seibo te explicamos diferentes tipos de taladros y características para que obtengas la perforación adecuada para tus necesidades. ¡Entra ya</p>
                  </div>
                  <div class="content-base-left">
                    <div class="content-base-wrapImage">
                      <a href="tipostaladros.html">
                        <div class="img-bg" style="background-image: url('img/taladros.png');background-position: inherit;"></div>
                        <img src="img/taladros.png" alt="tipos de taladros">
                      </a>
                    </div>
                  </div>
                </div>

              
        </div>
        
        

              
        <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>