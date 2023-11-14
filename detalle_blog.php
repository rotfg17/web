<?php
// ...

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require 'php/config.php'; 

// Se crea una instancia de la clase Database para manejar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();

// Verifica si se proporciona un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $blogId = $_GET['id'];

    // Consulta SQL para obtener la información del blog específico
    $stmt = $con->prepare("SELECT * FROM entradas_blog WHERE id = :id");
    $stmt->bindParam(':id', $blogId);
    $stmt->execute();
    $entrada = $stmt->fetch(PDO::FETCH_ASSOC);

   
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/css.css">

        <title>Ferre Seibo - Agregados</title>
    </head>
<body>
   
    <?php  include 'menu.php'; ?>  
        
<?php 

if ($entrada) {
    // Muestra los detalles del blog
    echo "<main>";
    echo "<div class='content'>";
    echo "<h1>{$entrada['titulo']}</h1>";
    echo "<div class='img-des'>";
    echo "<img class='imgS' src='img/blogs/{$entrada['imagen']}' alt='{$entrada['titulo']}'>";
    echo "<p class='img-des-txt'></p>";
    echo "</div>";
    echo "<p>{$entrada['contenido']}</p>";
    echo "</div>";
    echo "</main>";
} else {
    // Si no se encuentra la entrada, muestra un mensaje o redirige a otra página
    echo "Entrada no encontrada";
} 
} else {
// Si no se proporciona un ID válido, puedes mostrar un mensaje o redirigir a otra página
echo "ID de blog no válido";
}

?>


   
<?php include 'footer.php'; ?>

<script src="js/script.js"></script>
<script src="js/randomize.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
</body>
</html>