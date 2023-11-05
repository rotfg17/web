<?php

// Se requiere el archivo de configuración (config.php).

require '../php/config.php';

// Se destruye la sesión actual, lo que cierra la sesión del usuario.

session_destroy();

// Se redirige al usuario a la página "index.php" después de destruir la sesión.

header("location: index.php");
