<?php
require 'php/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];

$sql =  $con->prepare("SELECT id, nombres, apellidos, correo, telefono, cedula FROM clientes WHERE id = ? LIMIT 1");
$sql->execute([$id]);
$perfil = $sql->fetch(PDO::FETCH_ASSOC);

$sql =  $con->prepare("SELECT id, usuario FROM usuarios WHERE id = ? LIMIT 1");
$sql->execute([$id]);
$user = $sql->fetch(PDO::FETCH_ASSOC);

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

<section class="container br">
    <form class="row g-3" action="actualiza_perfil.php" method="post" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $perfil['id']; ?>">
        <div class="col-md-6">
            <label for="nombres">Nombre</label>
            <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $perfil['nombres']; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $perfil['apellidos']; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $perfil['correo']; ?>" autocomplete="off" required>
        </div>

        <div class="col-md-6">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $perfil['telefono']; ?>" autocomplete="off">
        </div>

        <div class="col-md-6">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo $perfil['cedula']; ?>" autocomplete="off">
        </div>

        <div class="col-md-6">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $user['usuario']; ?>" autocomplete="off">
        </div>

        <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>
