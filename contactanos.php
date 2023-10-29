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

        <title>Ferre Seibo - Construccion Ligera</title>
    </head>
<body>
   
    <?php  include 'menu.php'; ?>
    
        <div class="banner-especial -1r">
        <img class="img-responsive vdk" src="img/contactanos1.png" alt="Contactanos" width="100%" height="auto" >
        <p class="banner-especial__txt">Puedes contactarnos a través de nuestros canales de venta y de atención.
            <br>
            Nuestros agentes te atenderán con gusto.</p>
    </div>

    <div class="section">
        <h3 class="section_title">
            Nuestros canales de venta
        </h3>
        <div class="section_wrapp">
            <a href="https://www.ferreseibo.com" target="_blank" class="section_wrapp_item">
                <i class="icons-web"></i>
                <div class="section_wrapp_item_mv">
                    <p class="section_wrapp_item_title">
                        Compra por nuestra web
                    </p>
                    <p class="section_wrapp_item_text underline">
                        www.ferreseibo.com
                    </p>
                </div>
            </a>

            <a href="https://wa.me/c/18095523071" target="_blank" class="section_wrapp_item">
                <i class="icons-whatsapp"></i>
                <div class="section_wrapp_item_mv">
                    <p class="section_wrapp_item_title">
                        Compra por WhatsApp
                    </p>
                    <p class="section_wrapp_item_text underline">
                        (809) 552-3071
                    </p>
                </div>
            </a>
            <a href="tel:8095523071" target="_blank" class="section_wrapp_item">
                <i class="icons-shop"></i>
                <div class="section_wrapp_item_mv">
                    <p class="section_wrapp_item_title">
                        Compra por teléfono
                    </p>
                    <p class="section_wrapp_item_text">
                        Lunes a sábado de 7:00 a 6:00
                        <br>
                        Domingo de 7:30 a 12:00
                        <br>
                        <b>(809) 552-3071</b>
                    </p>
                </div>
            </a>
        </div>
    </div>


    <div class="section">
        <h3 class="section_title">Nuestros canales de atención</h3>
        <div class="section_wrapp">
            <a href="https://www.facebook.com/profile.php?id=100063674135186" target="_blank" class="section_wrapp_item">
                <i class="icons-messenger"></i>
                <div class="section_wrapp_item_mv">
                    <p class="section_wrapp_item_title">Chatea con nosotros</p>
                    <p class="section_wrapp_item_text underline">Facebook messenger todo el día, <br>todos los días del año</p>
                </div>
            </a>
            <a href="mailto:digitacion.ferreseibo@gmail.com" target="_blank" class="section_wrapp_item">
                <i class="icons-correo"></i>
                <div class="section_wrapp_item_mv">
                    <p class="section_wrapp_item_title">Escríbenos</p>
                    <p class="section_wrapp_item_text">A nuestro correo electrónico <b>digitacion.ferreseibo@gmail.com</b></p>
                </div>
            </a>
            <a href="tel:8095523071" target="_blank" class="section_wrapp_item">
                <i class="icons-phone"></i>
                <div class="section_wrapp_item_mv">
                    <p class="section_wrapp_item_title">Llámanos</p>
                    <p class="section_wrapp_item_text">Lunes a sábado de 7:00 a 6:00
                        <br>
                        Domingo de 7:30 a 12:00
                        <br>
                        <b>(809) 552-3071</b></p>
                </div>
            </a>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>