<?php
require 'php/config.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];

$usuario = $_POST['usuario'];

$sql = $con->prepare("UPDATE clientes SET nombres = ?, apellidos = ?, correo = ?, telefono = ?, cedula = ? WHERE id = ?");
$sql->execute([$nombres, $apellidos, $correo, $telefono, $cedula, $id]);

$sql = $con->prepare("UPDATE usuarios SET usuario = ? WHERE id = ?");
$sql->execute([$usuario, $id]);

header("Location: perfil.php");


?>


