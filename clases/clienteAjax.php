<?php

require_once '../php/database.php';
require_once 'clienteFunciones.php';

$datos = [];

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    $db = new Database();
    $con = $db->conectar();

    if ($action == 'existeUsuario') {
        $datos['ok'] = usuarioExiste($_POST['usuario'], $con);

    } elseif ($action == 'existeCorreo') {
        $datos['ok'] = correoExiste($_POST['correo'], $con);

    } elseif ($action == 'existeCedula') {
        $datos['ok'] = cedulaExiste($_POST['cedula'], $con); 
    }
}


echo json_encode($datos);