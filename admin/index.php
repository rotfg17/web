<?php 

/*$password = password_hash('admin', PASSWORD_DEFAULT);
$sql = "INSERT INTO admin (usuario, password, nombre, correo_electronico, activo, fecha_alta)
VALUES ('admin','$password','Administrador', 'robinsonchalasj@gmail.com', '1', NOW())";
$con->query($sql);*/

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require 'config/config.php';
require 'config/database.php';
require 'clases/adminFunciones.php';

// Se crea una instancia de la clase Database para manejar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();

// Sección comentada que inserta un registro de administrador si es necesario.

// Se inicializa un array para almacenar mensajes de error.
$errors = [];

// Si se ha enviado un formulario (POST)...
if (!empty($_POST)) {
    // Se obtienen y se limpian los valores de usuario y contraseña del formulario.
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    // Si alguno de los campos está vacío, se agrega un mensaje de error.
    if (esNulo([$usuario, $password])) {
        $errors[] = "Debe llenar todos los campos";
    }

    // Si no se han acumulado mensajes de error hasta este punto...
    if (count($errors) == 0) {
        // Se intenta iniciar sesión llamando a la función 'login' con los datos proporcionados.
        $errors[] = login($usuario, $password, $con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Ferre Seibo</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar sesión</h3></div>
                                    <div class="card-body">
                                        <form action="index.php" method="post" autocomplete="off">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="usuario" required autofocus />
                                                <label for="usuario">Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" name="password" placeholder="Contraseña" required />
                                                <label for="password">Contraseña</label>
                                            </div>

                                            <?php  mostrarMensajes($errors); ?>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">¿Olvidaste tu contraseña?</a>
                                                <button type="submit" class="btn btn-primary">Entrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
