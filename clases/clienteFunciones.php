<?php

// Función que verifica si alguno de los elementos en un array es nulo o vacío
function esNulo(array $parametros)
{
    foreach ($parametros as $parametro) {
        if (strlen(trim($parametro)) < 1) {
            return true;
        }
    }
    return false;
}

// Función que verifica si una cadena es una dirección de correo electrónico válida
function esCorreo($correo)
{
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

// Función que verifica si dos contraseñas son iguales
function validaPassword($password, $repassword)
{
    if (strcmp($password, $repassword) !== 0) {
        return true;
    }
    return false;
}

// Función que genera un token aleatorio
function generarToken()
{
    return md5(uniqid(mt_rand(), false));
}

// Función que registra un cliente en la base de datos
function registraCliente(array $datos, $con)
{
    $sql = $con->prepare("INSERT INTO clientes (nombres, apellidos, correo, telefono, cedula, activo, fecha_alta) VALUES (?,?,?,?,?, 1,now())");
    if ($sql->execute($datos)) {
        return $con->lastInsertId();
    }
    return 0;
}

// Función que registra un usuario en la base de datos
function registraUsuario(array $datos, $con)
{
    $sql = $con->prepare("INSERT INTO usuarios (usuario, password, token, id_cliente) VALUES (?,?,?,?)");
    if ($sql->execute($datos)) {
        return $con->lastInsertId();
    }
    return 0;
}

// Función que verifica si un usuario ya existe en la base de datos
function usuarioExiste($usuario, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

// Función que verifica si un correo electrónico ya existe en la base de datos
function correoExiste($correo, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE correo LIKE ? LIMIT 1");
    $sql->execute([$correo]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

// Función que verifica si una cédula ya existe en la base de datos
function cedulaExiste($cedula, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE cedula LIKE ? LIMIT 1");
    $sql->execute([$cedula]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

// Función que muestra mensajes de error
function mostrarMensajes(array $errors)
{
    if (count($errors) > 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

// Función que valida un token para activar un usuario
function validaToken($id, $token, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE id = ? AND token LIKE ? LIMIT 1");
    $sql->execute([$id, $token]);
    if ($sql->fetchColumn() > 0) {
        if (activarUsuario($id, $con)) {
            header("Location: template.php?mensaje=<p> ¡Tu cuenta ha sido activada con éxito! Ahora puedes acceder a tu cuenta y disfrutar de nuestros servicios.</p>");
            exit;
        } else {
            header("Location: template.php?mensaje=<p>Se ha producido un error interno al activar tu cuenta. Por favor, inténtalo más tarde o contacta al soporte técnico.</p>");
            exit;
        }
    } else {
        header("Location: template.php?mensaje=<p>El enlace de activación ha caducado. Por favor, solicita uno nuevo o contacta al soporte técnico si necesitas ayuda.</p>");
        exit;
    }
    return $msg;
}

// Función que activa un usuario en la base de datos
function activarUsuario($id, $con)
{
    $sql = $con->prepare("UPDATE usuarios SET activacion = 1, token = '' WHERE id = ? ");
    return $sql->execute([$id]);
}

// Función que realiza el proceso de inicio de sesión
function login($usuario, $password, $con, $proceso)
{
    $sql = $con->prepare("SELECT id, usuario, password, id_cliente FROM usuarios WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        if (esActivo($usuario, $con)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['usuario'];
                $_SESSION["user_cliente"] = $row['id_cliente'];
                $user_id = $_SESSION["user_id"];

                $lista_carrito = array();
                $Shopping_Cart = $con->prepare("SELECT user_id, product_id, units FROM `shopping_cart` WHERE user_id = $user_id ");
                $Shopping_Cart->execute();
                if ($lista_carrito[] = $Shopping_Cart->fetch(PDO::FETCH_ASSOC)) {
                    foreach ($lista_carrito as $producto) {
                        $_SESSION['carrito']['productos'][$producto["product_id"]] = $producto["units"];
                    }
                }

                $wishlist = array();
                $wish_list = $con->prepare("SELECT user_id, id_producto FROM `wish_list` WHERE user_id = $user_id ");
                $wish_list->execute();
                if ($wishlist[] = $wish_list->fetch(PDO::FETCH_ASSOC)) {
                    foreach ($wishlist as $producto) {
                        $_SESSION['wishlist']['products'][$producto["id_producto"]] = $producto["id_producto"];
                    }
                }
                if ($proceso == 'pago') {
                    header("Location: checkout.php");
                } else {
                    header("location: index.php");
                }
                exit;
            }
        } else {
            return 'El usuario no ha sido activado.';
        }
    }
    return 'El usuario y/o contraseña son incorrectos.';
}

// Función que verifica si un usuario está activo
function esActivo($usuario, $con)
{
    $sql = $con->prepare("SELECT activacion FROM usuarios WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if ($row['activacion'] == 1) {
        return true;
    }
    return false;
}

// Función que genera un token para solicitar restablecimiento de contraseña
function solicitaPassword($user_id, $con)
{
    $token = generarToken();
    $sql = $con->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
    if ($sql->execute([$token, $user_id])) {
        return $token;
    }
    return null;
}

// Función que verifica si un token de solicitud de restablecimiento de contraseña es válido
function verificaTokenRequest($user_id, $token, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE id=? AND token_password LIKE ? AND password_request=1 LIMIT 1");
    $sql->execute([$user_id, $token]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

// Función que activa la contraseña después de restablecerla
function activaPassword($user_id, $password, $con)
{
    $sql = $con->prepare("UPDATE usuarios SET password=?, token_password = '', password_request = 0 WHERE id=?");
    if ($sql->execute([$password, $user_id])) {
        return true;
    }
    return false;
}

// Función que maneja la lista de deseos (wishlist)
function listaDeseo()
{
    $datos = file_get_contents('php://input');
    $json = json_decode($datos, true);
    foreach ($json as $producto) {
        $data = $this->model->getListaDeseo($producto['idProducto']);
    }
}
