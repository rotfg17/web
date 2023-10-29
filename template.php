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

    <style>
        .alert {
            padding: 15px;
            background-color: #f39708;
            color: #000;
            text-align: center;
            font-size: 20px ;
        }
    </style>
</head>
<body>
    
<?php include 'menu.php'; ?> 
  
<main>
    <div class="container br">
    <?php
    // Verifica si hay un mensaje en la URL
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        // Muestra un div con estilo de alerta
        echo '<div class="alert">' . $mensaje . '</div>';
    }
    ?>
    </div>    
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
