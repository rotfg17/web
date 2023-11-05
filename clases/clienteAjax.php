<?php

// Incluye los archivos necesarios
require_once '../php/database.php';
require_once 'clienteFunciones.php';

$datos = [];

// Verifica si se ha enviado una acción por POST
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Crea una instancia de la base de datos
    $db = new Database();
    $con = $db->conectar();

    // Realiza diferentes acciones dependiendo de la acción especificada
    if ($action == 'existeUsuario') {
        // Verifica si el usuario existe en la base de datos
        $datos['ok'] = usuarioExiste($_POST['usuario'], $con);

    } elseif ($action == 'existeCorreo') {
        // Verifica si el correo electrónico existe en la base de datos
        $datos['ok'] = correoExiste($_POST['correo'], $con);

    } elseif ($action == 'existeCedula') {
        // Verifica si la cédula existe en la base de datos
        $datos['ok'] = cedulaExiste($_POST['cedula'], $con); 
    }
}

// Convierte los datos en un formato JSON y los envía de vuelta
echo json_encode($datos);
