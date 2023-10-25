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
        <title>Ferre Seibo - Política de Privacidad</title>
    </head>
<body>
    
    <?php  include 'menu.php'; ?>

   <div class="terminos-container">
    <h1 class="title">
        Acerca de nosotros como Ferretería Ferre Seibo
    </h1>
    <div class="content">
        <p></p>
        <h3>Historia de Ferre Seibo</h3>
        <p>La historia de la ferretería Ferre Seibo nació con la visión, la amistad y la determinación de la idea de dos amigos de la infancia, Carlos Manuel Melo y Yinni Rafael Sánchez Ventura, quienes en un momento compartieron el deseo de convertirse socios en algún momento. Cada uno de ellos tiene diferentes antecedentes comerciales (Carlos Melo se dedicaba a la ganadería y Yinni Sánchez es un empresario), Ambos comparten una relación muy cercana que le permite explorar oportunidades juntos. </p>
        <p>Después de haber logrado cierta estabilidad económica, Carlos Melo y Yinni Sánchez decidieron crear una empresa. Desde un principio pensaron en una tienda de tecnología, pero la idea no se concretó. Posteriormente discutieron entre una empresa comercial y una ferretería. Luego de analizar el mercado en la localidad de El Seibo, se dieron cuenta de que había suficientes comerciales, por lo que se presentó una gran oportunidad cuando estuvieron a punto de tomar la decisión, se dieron cuenta de un terreno estaba siendo vendido en un lugar idóneo y decidieron comprarlo.</p>
        <p>Luego de dos o tres años se presentó otra gran oportunidad, cuando la ferretería, ubicada en lo que hoy es Ferre Seibo, cerró por problemas económicos. Carlos Melo y Yinni Sánchez tomaron la audaz decisión de comprar todas las mercancías de esta ferretería casi en bancarrota y alquilar las antiguas instalaciones.</p>
        <p>Gracias a esta decisión, convirtieron la adversidad en oportunidad y comenzaron con el proceso de reconstrucción y preparación de tres meses para abrir su propio negocio, el terreno ya comprado decidieron utilizarlo como almacén y fábrica de blocks. Finalmente, el 4 de diciembre de 2017, Ferre Seibo abrió sus puertas al público. Con el lema "La ferretería del pueblo", la ferretería se ha convertido en parte integral de la comunidad, ofreciendo una amplia gama de productos y servicios para satisfacer las necesidades de sus clientes.</p>
        
        <h3>Misión</h3>
        <p>Ser una empresa confiable y satisfacer con las necesidades de nuestra comunidad en suministros de construcción, materiales para el hogar y herramientas en general. Comprometiéndonos en ofrecer productos de la mejor calidad y con expertos calificados para brindar un mejor servicio a nuestros clientes.</p>
        
        <h3>Visión</h3>
        <p>Ser la empresa más importante y reconocida en la industria de ferreterías, destacando por nuestros productos de alta calidad, mejores precios y excelente servicio al cliente. Nos esforzamos por expandir nuestros catálogos de productos en línea y física, buscando establecer buenas relaciones con nuestros clientes y convertirnos en socios confiables y aportar valor a cada uno de sus proyectos.</p>
        
        <h3>Valores</h3>
        <p>Gracias a estos valores somos la empresa de hoy en día, los cuales nos ayudan a ser socios confiables y valiosos para nuestra comunidad de Ferre Seibo:</p>
        <strong>Calidad</strong>
        <p>Comprometidos en productos y servicios de alta calidad para satisfacer con las necesidades de nuestra comunidad.</p>
        <strong>Integridad</strong>
        <p>Enfocados en brindar nuestro servicio de manera transparente y con honestidad en la interacción con nuestros clientes.</p>
        <strong>Pasión</strong>
        <p>Servir a nuestra comunidad con las mejores intenciones y buscar día tras día la mejora de nuestros productos, aspirando a ser mejores cada día.</p>
        <strong>Servicio al cliente</strong>
        <p>Poniendo a nuestros clientes como prioridad en el centro de todo lo que hacemos, trabajando para brindar un servicio excepcional. </p>
        <strong>Innovación</strong>
        <p>Buscando alentar a nuestro equipo de manera creativa e innovadora para ayudar a nuestros clientes a lograr sus objetivos.</p>

        </div>
</div>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>