<?php
// Inicio de la sección de código PHP.

// Se incluye el archivo 'config.php' ubicado en la carpeta 'php'.
require 'php/config.php';

// Se incluye el archivo 'clienteFunciones.php' ubicado en la carpeta 'clases'.
require 'clases/clienteFunciones.php';

// Se intenta obtener el valor de 'user_id' y 'token' desde la solicitud GET o POST.
$user_id = $_GET['id'] ?? $_POST['user_id'] ?? ''; 
$token = $_GET['token'] ?? $_POST['token'] ?? '';

// Si alguno de los valores es vacío, se redirige a la página de inicio.
if ($user_id == '' || $token == '') {
    header("Location: index.php");
    exit;
}

// Se crea una nueva instancia de la clase 'Database' para gestionar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();

// Se crea un array llamado $errors para almacenar mensajes de error.
$errors = [];

// Se verifica si el token y el 'user_id' proporcionados son válidos.
if (!verificaTokenRequest($user_id, $token, $con)) {
    echo "No se pudo verificar la información";
    exit;
}

// Si se ha enviado el formulario (POST), se procede a validar y procesar la solicitud.
if (!empty($_POST)) {
    // Se obtienen los valores de los campos del formulario y se eliminan espacios en blanco adicionales.
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']); 

    // Se valida si alguno de los campos del formulario está vacío y se agrega un mensaje de error si es así.
    if (esNulo([$user_id, $token, $password, $repassword])) {
        $errors[] = "Todos los campos son obligatorios";
    }

    // Se valida si las contraseñas coinciden y se agrega un mensaje de error si no coinciden.
    if (validaPassword($password, $repassword)) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    // Si no hay mensajes de error en el array, se procede a actualizar la contraseña en la base de datos.
    if (count($errors) == 0) {
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        // Se intenta activar la nueva contraseña en la base de datos.
        if (activaPassword($user_id, $pass_hash, $con)) {
            echo "Contraseña modificada. <b><a href='login.php'>Iniciar sesión</a>";
            exit;
        } else {
            $errors[] = "No se pudo cambiar la contraseña. Inténtalo nuevamente.";
        }
    }
}

// Fin de la sección de código PHP.
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
    <h1>Cambiar contraseña</h1>
    
    <?php mostrarMensajes($errors); ?>

    <form action="reset_password.php" method="post" class="row g-3" autocomplete="off">

    <input type="hidden" name="user_id" id="user_id" value="<?= $user_id; ?>"/>
    <input type="hidden" name="token" id="token" value="<?= $token; ?>"/>

    <div class="form-floating">
        <input class="form-control" type="password" name="password" id="password" placeholder="Nueva contraseña" required>
        <label for="password">Nueva contraseña</label>
    </div>

    <div class="form-floating">
        <input class="form-control" type="password" name="repassword" id="repassword" placeholder="Confirmar contraseña" required>
        <label for="repassword">Confirmar contraseña</label>
    </div>

    <div class="d-grid gap-3 col-12">
        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
    </div>

    <hr>

    <div class="col-12">
    <a href="login.php" class="link">Iniciar sesión</a></p>
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
