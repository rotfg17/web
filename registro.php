<?php
require 'php/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();


$errors = [];

if(!empty($_POST)){

    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $cedula = trim($_POST['cedula']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']); 

    if(esNulo([$nombres, $apellidos, $correo, $telefono, $cedula, $usuario, $password, $repassword])){
        $errors[]="Todos los campos son obligatorios";
    }

    if(!esCorreo($correo)){
        $errors[] = "El correo no es valido.";
    }

    if(validaPassword($password, $repassword)){
        $errors[] = "Las contraseñas no coinciden.";
    }

    if(usuarioExiste($usuario, $con)){
        $errors[]= "Este usuario $usuario ya existe.";
    }

    if(correoExiste($correo, $con)){
        $errors[]= "Este correo electrónico $correo ya existe.";
    }

    if(cedulaExiste($cedula, $con)){
        $errors[]= "Esta cedula $cedula ya existe.";
    }

    if(count($errors) == 0){


   $id = registraCliente([$nombres, $apellidos, $correo, $telefono, $cedula], $con);


   if ($id > 0){

        require_once 'clases/Mailer.php';
        $mailer = new Mailer();
        $token = generarToken();
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $idUsuario = registraUsuario([$usuario, $pass_hash, $token, $id], $con);
        if($idUsuario > 0){
            $url = SITE_URL . '/activa_cliente.php?id='.$idUsuario .'&token='.$token;
            // http://localhost/website/activa_cliente.php?id=1&token=3b95237c52253088d196259490fac3f7
            $asunto ="Activar cuenta - Ferreteria FerreSeibo";
            $logoURL = "https://scontent.fhex5-2.fna.fbcdn.net/v/t39.30808-6/271809553_4677616398954273_3880868244671468411_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGcu-H9-1F0Yevsf-lfSfefkxQrHuKvu9OTFCse4q-70_Aljmpboy_0CQwx4gtn5otpzDPIsz2KG8TI9enfLcvv&_nc_ohc=6zdZ1mn0N9UAX_4fXIY&_nc_ht=scontent.fhex5-2.fna&oh=00_AfBAx-EnZF_veRsub34z-yQt1oos3Dpb6lwgtgg3BhoXFQ&oe=653B7C55";

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
                         <h1>Activar cuenta</h1>
                     </div>
                     <p>Estimado $nombres,</p>
                     <p>Para continuar con el proceso de registro, es obligatorio dar click
                     en el siguiente enlace <a href='$url'>Activar cuenta</a></p>
                     
                 </div>
             </body>
             </html>";

            if ($mailer->enviarCorreo($correo, $asunto, $cuerpo)){
                // Redirige a la plantilla y pasa el mensaje como parámetro
                header("Location: template.php?mensaje=<p><b>Correo enviado</b></p> <br> <p>Hemos enviado un correo de confirmación a tu dirección de correo electrónico $correo. Por favor, verifica tu bandeja de entrada y sigue las instrucciones para activar tu cuenta.</p>");
                exit;
            }
        } else {
            $errors[] = "Error al registrar usuario"; 
        }
        } else {
            $errors[] = "Error al registrar cliente";
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
  
<main>
    <div class="container br">
            <h1>Datos del cliente</h1>

            <?php mostrarMensajes($errors); ?>

            <form class="row g-3" action="registro.php" method="post" autocomplete="off">
                <div class="col-md-6">
                        <label for="nombres"> <span class="text-danger">* </span> Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control"  requireda>
                </div>

                <div class="col-md-6">
                        <label for="apellidos"> <span class="text-danger">* </span> Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" requireda>
                </div>

                <div class="col-md-6">
                        <label for="correo"> <span class="text-danger">* </span> Correo electrónico</label>
                        <input type="email" name="correo" id="correo" class="form-control" requireda>
                        <span id="validaCorreo" class="text-danger"></span>
                </div>

                <div class="col-md-6">
                        <label for="telefono"> <span class="text-danger">* </span> Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" class="form-control" requireda>
                </div>

                <div class="col-md-6">
                        <label for="cedula"> <span class="text-danger">* </span> Cedula</label>
                        <input type="text" name="cedula" id="cedula" class="form-control" requireda>
                        <span id="validaCedula" class="text-danger"></span>
                </div>

                <div class="col-md-6">
                        <label for="usuario"> <span class="text-danger">* </span> Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" requireda>
                        <span id="validaUsuario" class="text-danger"></span>
                </div>

                <div class="col-md-6">
                        <label for="password"> <span class="text-danger">* </span> Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" requireda>
                </div>

                <div class="col-md-6">
                        <label for="repassword"> <span class="text-danger">* </span> Repetir contraseña</label>
                        <input type="password" name="repassword" id="repassword" class="form-control" requireda>
                </div>

                <i class="nota"><b>Nota:</b> Los campos con asterisco son obligatorios</i>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

            </form>
    </div>    
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>

//Declaracion de variables para validaciones 
let txtUsuario = document.getElementById('usuario')
txtUsuario.addEventListener("blur", function(){
	existeUsuario(txtUsuario.value)
}, false)

let txtCorreo = document.getElementById('correo')
txtCorreo.addEventListener("blur", function(){
	existeCorreo(txtCorreo.value)
}, false)

let txtCedula = document.getElementById('cedula')
txtCedula.addEventListener("blur", function(){
	existeCedula(txtCedula.value)
}, false);

//Validacion en tiempo real de usuario
function existeUsuario(usuario){
    let url = "clases/clienteAjax.php"
    let formData = new FormData()
    formData.append("action", "existeUsuario")
    formData.append("usuario", usuario)

    fetch(url,{
        method: 'POST',
        body: formData
    }).then(response => response.json())
    .then(data =>{
        if (data.ok) {
            document.getElementById('usuario').value = ''
            document.getElementById('validaUsuario').innerHTML = 'Usuario ya existe'
        } else {
            document.getElementById('validaUsuario').innerHTML = ''
        }
    })
}
//Validacion en tiempo real de correo
function existeCorreo(correo){
    let url = "clases/clienteAjax.php"
    let formData = new FormData()
    formData.append("action", "existeCorreo")
    formData.append("correo", correo)

    fetch(url,{
        method: 'POST',
        body: formData
    }).then(response => response.json())
    .then(data =>{
        if (data.ok) {
            document.getElementById('correo').value = ''
            document.getElementById('validaCorreo').innerHTML = 'Correo ya existe'
        } else {
            document.getElementById('validaCorreo').innerHTML = ''
        }
    })
}
//Validacion en tiempo real de cedula
function existeCedula(cedula){
    let url = "clases/clienteAjax.php"
    let formData = new FormData()
    formData.append("action", "existeCedula")
    formData.append("cedula", cedula)

    fetch(url,{
        method: 'POST',
        body: formData
    }).then(response => response.json())
    .then(data =>{
        if (data.ok) {
            document.getElementById('cedula').value = ''
            document.getElementById('validaCedula').innerHTML = 'Cedula ya existe'
        } else {
            document.getElementById('validaCedula').innerHTML = ''
        }
    })
}
</script>

<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
