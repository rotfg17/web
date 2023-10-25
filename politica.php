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

<?php include 'menu.php'; ?> 

   <div class="terminos-container">
    <h1 class="title">
        Política de Privacidad de Ferretería Ferre Seibo
    </h1>
    <div class="content">
        <p></p>
        <h3>Bienvenidos a Ferre Seibo</h3>
        <p>Ferretería Ferre Seibo ("nosotros", "nuestro" o "Ferretería Ferre Seibo") se compromete a proteger tu privacidad y la seguridad de tus datos personales. Esta Política de Privacidad describe cómo recopilamos, utilizamos y protegemos la información personal que recopilamos a través de nuestro sitio web (el "Sitio").</p>

        
        <h3>Información que Recopilamos</h3>
        <p></p>
        <strong>Información Personal</strong>
        <p>Cuando visitas nuestro Sitio, podemos recopilar información personal que tú proporcionas voluntariamente, como tu nombre, dirección de correo electrónico, número de teléfono y dirección postal cuando te registras en nuestro Sitio, realizas una compra o te comunicas con nosotros a través de formularios de contacto o correos electrónicos.</p>
        <strong>Información de Navegación</strong>
        <p>También recopilamos información no personal que se genera automáticamente mientras navegas por nuestro Sitio. Esto puede incluir información como tu dirección IP, tipo de navegador, sistema operativo, páginas visitadas, y el tiempo que pasas en el Sitio.</p>

        <h3>Uso de la Información</h3>
        <p> Utilizamos la información recopilada para los siguientes propósitos:</p>
        <strong>Procesamiento de Pedidos</strong>
        <p>Para procesar y entregar tus pedidos y para proporcionarte información sobre el estado de tus compras.</p>
        <strong>Atención al Cliente</strong>
        <p>Para responder a tus preguntas, comentarios y solicitudes de atención al cliente.</p>
        <strong>Marketing</strong>
        <p>Para enviarte correos electrónicos promocionales sobre nuestros productos, ofertas especiales y eventos, siempre y cuando hayas dado tu consentimiento previo.</p>
        <strong>Mejora del Sitio</strong>
        <p>Para mejorar la funcionalidad y la experiencia del usuario en nuestro Sitio y realizar análisis estadísticos.</p>
        
        
        <h3>Compartir Información</h3>
        <p>No compartiremos tu información personal con terceros, excepto en los siguientes casos:</p>
        <strong>Proveedores de Servicios</strong>
        <p> Podemos compartir tu información personal con terceros que nos proporcionen servicios, como procesamiento de pagos, envío de productos o servicios de marketing.</p>
        <strong>Cumplimiento Legal</strong>
        <p>Podemos divulgar tu información personal si estamos obligados a hacerlo por ley o en respuesta a una solicitud legal válida.</p>

        <h3>Seguridad de Datos</h3>
        <p>Tomamos medidas para proteger la seguridad de tus datos personales y utilizamos prácticas de seguridad estándar de la industria para garantizar su confidencialidad.</p>

        <h3>Tus Derechos</h3>
        <p>Tienes derechos sobre tus datos personales, que incluyen el acceso, la corrección y la eliminación de tus datos. Puedes ejercer estos derechos enviándonos un correo electrónico a contabilidadferreseibo@gmail.com.</p>
        
        <h3>Cambios en esta Política</h3>
        <p>Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Te notificaremos de los cambios significativos mediante una notificación en nuestro Sitio o por correo electrónico.</p>
        
        <h3>Preguntas y Comentarios</h3>
        <p>Si tienes preguntas o comentarios sobre esta Política de Privacidad, contáctanos a través de contabilidadferreseibo@gmail.com.</p>
        <p>Gracias por confiar en Ferretería Ferre Seibo. Estamos comprometidos en proteger tu privacidad y mantener tu información segura.</p>
    </div>
</div>

<?php include 'footer.php'; ?>

   <script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>