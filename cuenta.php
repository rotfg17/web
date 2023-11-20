<?php 
// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require 'php/config.php'; 

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
        <link rel="stylesheet" href="css/css.css">
    <title>Ferre Seibo</title>

    <style>
        .alert {
            padding: 15px;
            background-color: #f39708;
            color: #000;
            text-align: center;
            font-size: 20px ;
        }
    </style>
</head>
<body>
    
<?php include 'menu.php'; ?> 
  
<main>
    <div class="container br">
    <?php
    // Verifica si hay un mensaje en la URL
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        // Muestra un div con estilo de alerta
        echo '<div class="alert">' . $mensaje . '</div>';
    }
    ?>
    </div>    
</main>


<main>
    <div class="container">
        <h1 class="text-center mb-5">Tu cuenta</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            $titulos = ['Tu perfil', 'Tus pedidos', 'Tu lista', 'Servicio al Cliente', 'Título 5', 'Título 6'];
            $descripciones = ['Gestionar tu información personal.', 'Descarga facturas y vuelve a comprar cuando lo desees.', 'Administra y descubre elementos en tu lista de deseos.', 'Si tienes alguna pregunta o comentario, no dudes en ponerte en contacto con nosotros.', 'Descripción 5', 'Descripción 6'];
            $enlaces = ['perfil.php', 'compras.php', 'wishlist.php', 'info.php', 'pagina5.html', 'pagina6.html'];
            $imagenes = ['user.webp', 'checklist.webp', 'clipboard.webp', 'info.webp', 'imagen5.webp', 'imagen6.webp'];

            for ($i = 0; $i < 6; $i++) {
                echo '<div class="col mb-4">
                        <div class="card hover" onmouseover="cambiarColor(this)" onmouseout="restaurarColor(this)" onclick="redirigir(\'' . $enlaces[$i] . '\')">
                            <div class="card-body d-flex">
                                <div class="col-md-3 mb-3">
                                    <img src="img/' . $imagenes[$i] . '" alt="Imagen ' . ($i + 1) . '" class="img-fluid float-left" style="max-width: 60%;" />
                                </div>
                                <div class="flex-column ">
                                    <h3 class="card-title">' . $titulos[$i] . '</h3>
                                    <div><span class="text-muted" style="font-size: 15px;">' . $descripciones[$i] . '</span></div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</main>


<br><br><br><br>
<br><br><br><br>
<br><br><br><br>

<?php include 'footer.php';  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
<script src="js/index.js"></script>   
<script src="js/apps.js"></script>
<script>
    function cambiarColor(elemento) {
    elemento.style.backgroundColor = "#ddd";
}

function restaurarColor(elemento) {
    elemento.style.backgroundColor = "";
}

function redirigir(pagina) {
    window.location.href = pagina;
}

</script>

</body>
</html>
