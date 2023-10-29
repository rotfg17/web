<?php


/**
 * Funciones de utilidad
 * Autor: Robinson Chalas
 * 
 * 
 */
function esNulo(array $parametros)
{
    foreach($parametros as $parametros){
        if(strlen(trim($parametros)) < 1){
            return true;
        }
    }
    return false;
}

function esCorreo($correo)
{
   if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
    return true;
   }
   return false;
}




function usuarioExiste($usuario, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if($sql->fetchColumn() > 0){
        return true;
    }
    return false;
}

function correoExiste($correo, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE correo LIKE ? LIMIT 1");
    $sql->execute([$correo]);
    if($sql->fetchColumn() > 0){
        return true;
    }
    return false;
}

function cedulaExiste($cedula, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE cedula LIKE ? LIMIT 1");
    $sql->execute([$cedula]);
    if($sql->fetchColumn() > 0){
        return true;
    }
    return false;
}

function mostrarMensajes(array $errors)
{
    if(count($errors) > 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        foreach($errors as $errors){
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
    if($sql->fetchColumn() > 0){
       if( activarUsuario($id, $con)){
        $msg = "Cuenta activada.";
       } else {
        $msg = 'Error al activar cuenta.';
       }
    } else {
        $msg= 'El link no es válido o ya ha sido utilizado';
    }
    return $msg;
}

function activarUsuario($id, $con){
    $sql = $con->prepare("UPDATE usuarios SET activacion = 1, token = '' WHERE id = ? ");
    return $sql->execute([$id]);
}

function login($usuario, $password, $con)
{
    $sql = $con->prepare("SELECT id, usuario, password, nombre FROM admin WHERE usuario LIKE ?
    AND activo = 1 LIMIT 1");
    $sql->execute([$usuario]);
    if ($row = $sql->fetch(PDO::FETCH_ASSOC)){
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['nombre'];
                $_SESSION['user_type'] = 'admin';
                header("Location: inicio.php");
                exit;
            }

    }
     return 'El usuario y/o contraseña son incorrectos.';
}


function solicitaPassword($user_id, $con){

    $token = generarToken();

    $sql = $con->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
    if($sql->execute([$token, $user_id])){
        return $token;
    }
    return null;
}

function verificaTokenRequest($user_id, $token, $con){
    $sql = $con->prepare("SELECT id FROM usuarios WHERE id=? AND token_password LIKE ? AND
     password_request=1 LIMIT 1");
     $sql->execute([$user_id, $token]);
     if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function activaPassword($user_id, $password, $con){
    $sql = $con->prepare("UPDATE usuarios SET password=?, token_password = '', password_request = 0
    WHERE id=?");
    if($sql->execute([$password, $user_id])){
        return true;
    } 
    return false;
}

