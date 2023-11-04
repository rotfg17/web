<?php

function esNulo(array $parametros)
{
    foreach ($parametros as $parametros) {
        if (strlen(trim($parametros)) < 1) {
            return true;
        }
    }
    return false;
}

function esCorreo($correo)
{
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function validaPassword($password, $repassword)
{
    if (strcmp($password, $repassword) !== 0) {
        return true;
    }
    return false;
}


function generarToken()
{
    return md5(uniqid(mt_rand(), false));
}

function registraCliente(array $datos, $con)
{
    $sql = $con->prepare("INSERT INTO clientes (nombres, apellidos, correo, telefono, cedula, estatus, fecha_alta) VALUES (?,?,?,?,?, 1,now())");
    if ($sql->execute($datos)) {
        return $con->lastInsertId();
    }
    return 0;
}

function registraUsuario(array $datos, $con)
{
    $sql = $con->prepare("INSERT INTO usuarios (usuario, password, token, id_cliente) VALUES (?,?,?,?)");
    if ($sql->execute($datos)) {
        return $con->lastInsertId();
    }
    return 0;
}


function usuarioExiste($usuario, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function correoExiste($correo, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE correo LIKE ? LIMIT 1");
    $sql->execute([$correo]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function cedulaExiste($cedula, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE cedula LIKE ? LIMIT 1");
    $sql->execute([$cedula]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function mostrarMensajes(array $errors)
{
    if (count($errors) > 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        foreach ($errors as $errors) {
            echo '<li>' . $errors . '</li>';
        }
        echo '<ul>';
        echo ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}


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

function activarUsuario($id, $con)
{
    $sql = $con->prepare("UPDATE usuarios SET activacion = 1, token = '' WHERE id = ? ");
    return $sql->execute([$id]);
}

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

function solicitaPassword($user_id, $con)
{

    $token = generarToken();

    $sql = $con->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
    if ($sql->execute([$token, $user_id])) {
        return $token;
    }
    return null;
}

function verificaTokenRequest($user_id, $token, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE id=? AND token_password LIKE ? AND
     password_request=1 LIMIT 1");
    $sql->execute([$user_id, $token]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function activaPassword($user_id, $password, $con)
{
    $sql = $con->prepare("UPDATE usuarios SET password=?, token_password = '', password_request = 0
    WHERE id=?");
    if ($sql->execute([$password, $user_id])) {
        return true;
    }
    return false;
}

function listaDeseo()
{
    $datos = file_get_contents('php://input');
    $json = json_decode($datos, true);
    foreach ($json as $producto) {
        $data = $this->model->getListaDeseo($producto['idProducto']);
    }
}
