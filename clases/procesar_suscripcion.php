<?php
require '../php/config.php';
require_once 'Mailer.php';
require 'clienteFunciones.php';

session_start();

// Establecer una variable de sesión para indicar que se ha enviado el mensaje
$_SESSION['mensaje_enviado'] = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];

    $db = new Database();
    $con = $db->conectar();

    // Verificar si el correo ya existe
    $stmt = $con->prepare("SELECT id FROM newsletter WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $existeCorreo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existeCorreo) {
        // Establecer mensaje de error en la variable de sesión
        $_SESSION['error_message'] = 'El correo ya está registrado.';
        $stmt->closeCursor(); // Cerrar la conexión
        header('Location: ../index.php');
        exit;
    }

    // Liberar la conexión después de la verificación
    $stmt->closeCursor();

    // Guardar el correo en la base de datos
    $stmtInsert = $con->prepare("INSERT INTO newsletter (correo) VALUES (:correo)");
    $stmtInsert->bindParam(':correo', $correo);
    $stmtInsert->execute();

    // Enviar correo de confirmación
    $asunto = "Confirmacion de Suscripcion al boletin informativo";
            // Estilos en línea para el cuerpo del correo
            $estilos = "
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 0;
            }
        
            h3 {
                color: #3498db;
                margin-bottom: 10px;
            }
        
            p {
                margin-bottom: 8px;
            }
        
            img {
                max-width: 100%;
                height: auto;
                display: block;
                margin: 0 auto;
            }
        
            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        
            .thank-you {
                text-align: center;
                margin-bottom: 20px;
            }
        
            .order-details {
                margin-bottom: 20px;
            }
        
            .support-info {
                margin-top: 20px;
            }
            ";
            // Cuerpo del correo con estilos en línea
            $cuerpo = '<html>';
            $cuerpo .= '<head>';
            $cuerpo .= '<style>' . $estilos . '</style>';
            $cuerpo .= '</head>';
            $cuerpo .= '<body>';
            $cuerpo .= '<div class="container">';
            $cuerpo .= '<div class="thank-you"><h3>&iexcl;Gracias por suscribirte!</h3></div>';
            $cuerpo .= '<img src="https://scontent.fhex5-2.fna.fbcdn.net/v/t39.30808-6/271809553_4677616398954273_3880868244671468411_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGcu-H9-1F0Yevsf-lfSfefkxQrHuKvu9OTFCse4q-70_Aljmpboy_0CQwx4gtn5otpzDPIsz2KG8TI9enfLcvv&_nc_ohc=yNbF8OBDMfYAX_DSKIZ&_nc_ht=scontent.fhex5-2.fna&oh=00_AfCMgc7U0UCc8hiPbac-fVJaYofACDRyPwScbVo3psd8Vw&oe=65553195" width="100" height="auto">';
            $cuerpo .= '<p>&iexcl;Hola!</b></p>';
            $cuerpo .= '<p>Gracias por suscribirte a nuestro boletín informativo. Estamos emocionados de tenerte a bordo. Aquí hay algunos detalles sobre tu suscripción:</p>';
            $cuerpo .= '<div class="fw-bolder"><p>Correo Electrónico: <b>' . $correo . ' </b></p></div>';
            $cuerpo .= '<div class="fw-bolder"><p>A partir de ahora, recibirás las últimos blogs, actualizaciones y ofertas especiales directamente en tu bandeja de entrada.</p></div>';
            $cuerpo .= '<div class="support-info"><p>Saludos,<br>El equipo de Ferre Seibo</p></div>';
            $cuerpo .= '</div>';
            $cuerpo .= '</body>';
            $cuerpo .= '</html>';

    $mailer = new Mailer();
    $mailer->enviarCorreo($correo, $asunto, $cuerpo);

    // Redirigir con mensaje de éxito
    header('Location: ../confirmacion.php');
    exit;
}
?>
