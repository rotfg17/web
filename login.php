<?php
require 'php/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$proceso = isset($_GET['pago']) ? 'pago' : 'login';


$errors = [];

if(!empty($_POST)){

    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $proceso = $_POST['proceso'] ?? 'login';

    if(esNulo([$usuario, $password])){
        $errors[]="Todos los campos son obligatorios";
    }
    if (count($errors) ==0 ){
    $errors[] = login($usuario, $password, $con, $proceso);
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
    <h1>Iniciar sesión</h1>
    <?php mostrarMensajes($errors); ?>
    
    <form class="row g-3" action="login.php" method="post" autocomplete="off">

    <input type="hidden" name="proceso" value="<?php echo $proceso; ?>">

    <div class="form-floating">
        <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
        <label for="usuario">Usuario</label>
    </div>

    <div class="form-floating">
        <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required>
        <label for="password">Contraseña</label>
    </div>

    <div class="col-12">
        <a href="recupera.php" class="link">¿olvidaste tu contraseña?</a>
    </div>

    <div class="d-grid gap-3 col-12">
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </div>

    <hr>

    <div class="col-12">
    <p class="nota">¿No tienes cuenta? <a href="registro.php" class="link">Registrate aquí</a></p>
    </div>

    </form>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
