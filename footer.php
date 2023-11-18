<footer class="footer">
    <div class="contenido contenido-footer">
        <div class="menu-footer">
            <div class="contact-footer">
                <p class="title-footer">Información de Contacto</p>
                <ul>
                    <li>Dirección: C/Sánchez, esquina Mella en los Hoyitos, 
                        Santa Cruz de El Seibo, República Dominicana.
                    </li>
                    <li>Teléfono:809-552-3071 / 809-552-3071</li>
                    <li>Correo Electronico: contabilidadferreseibo@gmail.com</li>
                </ul>
                <div class="social-icons">
                    <span  class="facebook"><a href="https://www.facebook.com/people/Ferre-Seibo/100063674135186/" target="_blank"><i class="fa-brands fa-facebook-f"></i></span></a>
                    <span class="instagram"><a href="https://instagram.com/ferreseibo?igshid=YjFneGh2MGNmMTVx" target="_blank"><i class="fa-brands fa-instagram"></i></span></a>
                </div>
            </div>

            <div class="information">
                <p class="title-footer">Información</p>
                <ul>
                    <li><a href="acercade.php">Acerca de Nosotros</a></li>
                    <li><a href="politica.php">Politicas de Privacidad</a></li>
                    <li><a href="terminosycondiciones.php">Términos y condiciones</a></li>
                    <li><a href="contactanos.php">Contactános</a></li>
                </ul>
            </div>
            <div class="mi-cuenta">
                <p class="title-footer">Mi cuenta</p>
                
                    <ul>
                        <li><a href="cuenta.php">Mi cuenta</a></li>
                        <li><a href="compras.php">Mis pedidos</a></li>
                        <li><a href="wishlist.php">Lista de deseos</a></li>
                        
                    </ul>
            </div>
            <div class="newsletter">
                <p class="title-footer">Boletín Informativo</p>
                <div class="contenido asa">
                    <p>
                        Suscribete a nuestros boletines ahora y mantente al
                        día con nuevas colecciones y ofertas exclusivas.
                    </p>
                    <form action="clases/procesar_suscripcion.php" method="post">
                    <div class="alert alert-danger bg-transparent" role="alert">
                    <?php
                    // Mostrar mensaje de error si existe
                    if (isset($_SESSION['error_message'])) {
                        echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
                        unset($_SESSION['error_message']); 
                    }
                    ?>
                    </div>
                    <input type="email" id="correo" name="correo" placeholder="Ingresa el correo aquí..." required autocomplete="off">
                    <button type="submit" valor="Suscríbete">Suscríbete</button>
                    </form>
                </div>
            </div>
        </div>

     <div class="copyright">
        <p>
            Desarrollado por Robinson Chalas y Noel Roja &copy; 2023
        </p>
     </div>   
    </div>

<script src="js/deseo.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script>
    const base_url ="js/listadeseo.js";
</script>

</footer>