<?php
require 'php/config.php';
require_once 'clases/Mailer.php';

// Establecer una variable de sesión para indicar que se ha enviado el mensaje
$_SESSION['mensaje_enviado'] = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Crear una instancia de la clase Database (o como hayas llamado tu clase)
    $db = new Database();
    // Conectar a la base de datos usando PDO
    $con = $db->conectar();

    // Verificar la conexión
    if ($con === false) {
        die("Error de conexión: " . $db->error());
    }

    try {
        // Utilizar una sentencia preparada para evitar la inyección SQL
        $stmt = $con->prepare("INSERT INTO info_contacto (nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)");
        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        // Ejecutar la sentencia preparada
        if ($stmt->execute()) {
            // Enviar correo al cliente
            $asuntoCliente = "Gracias por ponerte en contacto con nosotros";
            $estilosCliente = "
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
            $cuerpoCliente = '<html>';
            $cuerpoCliente .= '<head>';
            $cuerpoCliente .= '<style>' . $estilosCliente . '</style>';
            $cuerpoCliente .= '</head>';
            $cuerpoCliente .= '<body>';
            $cuerpoCliente .= '<div class="container">';
            $cuerpoCliente .= '<div class="thank-you"><h3>&iexcl;Gracias por ponerte en contacto con nosotros!</h3></div>';
            $cuerpoCliente .= '<img src="https://scontent.fhex5-2.fna.fbcdn.net/v/t39.30808-6/271809553_4677616398954273_3880868244671468411_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGcu-H9-1F0Yevsf-lfSfefkxQrHuKvu9OTFCse4q-70_Aljmpboy_0CQwx4gtn5otpzDPIsz2KG8TI9enfLcvv&_nc_ohc=yNbF8OBDMfYAX_DSKIZ&_nc_ht=scontent.fhex5-2.fna&oh=00_AfCMgc7U0UCc8hiPbac-fVJaYofACDRyPwScbVo3psd8Vw&oe=65553195" width="100" height="auto">';
            $cuerpoCliente .= '<p>&iexcl;Hola ' . $nombre . '!</b></p>';
            $cuerpoCliente .= '<p>Gracias por ponerte en contacto con nosotros. Hemos recibido tu mensaje y nos pondremos en contacto contigo lo antes posible.</p>';
            $cuerpoCliente .= '<div class="fw-bolder"><p><b>La informacion de tu mensaje es:</b></p></div>';
            $cuerpoCliente .= '<div class="fw-bolder"><p> ' . $mensaje . '</p></div>';
            $cuerpoCliente .= '<div class="support-info"><p>Saludos,<br>El equipo de Ferre Seibo</p></div>';
            $cuerpoCliente .= '</div>';
            $cuerpoCliente .= '</body>';
            $cuerpoCliente .= '</html>';

            $mailer = new Mailer();
            $mailer->enviarCorreo($email, $asuntoCliente, $cuerpoCliente);

            header("Location: info_contacto.php");
        } else {
            echo "Error al enviar el mensaje: " . $stmt->errorInfo()[2];
        }
        // Cerrar la sentencia
        $stmt->closeCursor();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        $con = null;
    }
    
} else {
    header("Location: index.php");
}
?>

