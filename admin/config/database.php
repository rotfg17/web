<?php

class Database {
    // Definición de propiedades privadas para la información de la base de datos
    private $hostname = "localhost";
    private $database = "ferreseibo_bd";
    private $username = "root";
    private $password = "Informatico1996!";
    private $charset = "utf8";

    // Método para establecer la conexión con la base de datos
    function conectar()
    {
        try {
            // Configura la cadena de conexión utilizando los valores de las propiedades
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;

            // Define opciones de configuración para la conexión PDO
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            // Crea una nueva instancia de PDO para establecer la conexión
            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            // Maneja cualquier excepción de PDO que ocurra durante la conexión
            echo 'Error conexión: ' . $e->getMessage();
            exit;
        }
    }
}

?>

