<?php
require 'php/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();


$errors = [];

if(!empty($_POST)){

    
    $correo = trim($_POST['correo']);
    

    if(esNulo([$correo])){
        $errors[]="Todos los campos son obligatorios";
    }

    if(!esCorreo($correo)){
        $errors[] = "El correo no es valido.";
    }

    if(count($errors) == 0){
        if(correoExiste($correo, $con)){
            $sql = $con->prepare("SELECT usuarios.id, clientes.nombres FROM usuarios INNER JOIN clientes ON 
            usuarios.id_cliente=clientes.id WHERE clientes.correo LIKE ? LIMIT 1");
            $sql->execute([$correo]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $user_id = $row['id'];
            $nombres = $row['nombres'];

           $token = solicitaPassword($user_id, $con);
            
            if ($token !== null){
                require_once 'clases/Mailer.php';
                $mailer = new Mailer();
                $url = SITE_URL . '/reset_password.php?id='. $user_id . '&token='. $token;
                // URL de la imagen del logo de la empresa
                $logoURL = "https://scontent.fhex5-2.fna.fbcdn.net/v/t39.30808-6/271809553_4677616398954273_3880868244671468411_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGcu-H9-1F0Yevsf-lfSfefkxQrHuKvu9OTFCse4q-70_Aljmpboy_0CQwx4gtn5otpzDPIsz2KG8TI9enfLcvv&_nc_ohc=6zdZ1mn0N9UAX_4fXIY&_nc_ht=scontent.fhex5-2.fna&oh=00_AfBAx-EnZF_veRsub34z-yQt1oos3Dpb6lwgtgg3BhoXFQ&oe=653B7C55";
                $asunto ="Recuperar password - Ferreteria FerreSeibo";
                            
                
                // Construir el cuerpo del correo
                $cuerpo = "<html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            background-color: #fff;
                            padding: 20px;
                            max-width: 600px;
                            margin: 0 auto;
                        }
                        .header {
                            display: flex;
                            align-items: center;
                        }
                        .logo {
                            max-width: 100px;
                            margin-right: 20px;
                        }
                        h1 {
                            color: #333;
                        }
                        p {
                            color: #555;
                        }
                        a {
                            color: #007bff;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <img class='logo' src='$logoURL'>
                            <h1>Cambio de contraseña</h1>
                        </div>
                        <p>Estimado $nombres,</p>
                        <p>Has solicitado un cambio de contraseña en nuestro sitio web. Por favor, haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                        <p><a href='$url'>$url</a></p>
                        <p>Si no realizaste esta solicitud, ignora este correo.</p>
                    </div>
                </body>
                </html>";
                // Cabecera para enviar correo HTML
                $cabecera = "MIME-Version: 1.0\r\n";
                $cabecera .= "Content-type: text/html; charset=UTF-8\r\n";
            $cuerpo .="<br>Si no hiciste esta solicitud, por favor ignorar este correo.";

            if ($mailer->enviarCorreo($correo, $asunto, $cuerpo)){
                // Redirige a la plantilla y pasa el mensaje como parámetro
                header("Location: template.php?mensaje=<p><b>Correo enviado</b></p> <br> <p>Hemos enviado un correo electrónico a la dirección $correo para restablecer la contraseña.</p>");
                exit;
            }
            
               
            }
        } else {
            $errors[] = "No existe una cuenta asociada a esta dirección de correo";
        }
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
        <link rel="stylesheet" href="css/css.css">
    <title>Ferre Seibo</title>
</head>
<body>

<?php include 'menu.php'; ?>
  
   <main class="form-login m-auto pt-4">
    <h1>Recuperar contraseña</h1>
    
    <?php mostrarMensajes($errors); ?>

    <form action="recupera.php" method="post" class="row g-3" autocomplete="off">

    <div class="form-floating">
        <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo electrónico" required>
        <label for="correo">Correo electrónico</label>
    </div>

    <div class="d-grid gap-3 col-12">
        <button type="submit" class="btn btn-primary">Solicitar</button>
    </div>

    <hr>

    <div class="col-12">
    <p class="nota">¿No tienes cuenta? <a href="registro.php" class="link">Registrate aquí</a></p>
    </div>

    </form>
</main>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
