<?php 

// Se requieren los archivos necesarios, incluyendo la configuración y la base de datos.
require '../config/config.php'; 
require '../config/database.php'; 

// Verifica si el usuario está autenticado. Si no lo está, redirige a la página de inicio.
if (!isset($_SESSION['user_type'])){
    header('Location: index.php');
    exit;
}

// Verifica si el usuario es de tipo 'admin'. Si no lo es, redirige a la página de inicio.
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../index.php');
    exit;
}

// Se crea una instancia de la clase Database para manejar la conexión a la base de datos.
$db = new Database();
$con = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];

        // Mover la imagen a una ubicación permanente
        $carpeta_destino = '../../img/blogs/';
        $ruta_imagen = $carpeta_destino . $imagen_nombre;
        move_uploaded_file($imagen_temp, $ruta_imagen);
    } else {
        // Manejar el caso en el que no se seleccionó una imagen
        $ruta_imagen = null; // O establece una ruta predeterminada si lo prefieres
    }

    // Guardar la entrada en la base de datos
    $stmt = $con->prepare("INSERT INTO entradas_blog (titulo, contenido, imagen) VALUES (:titulo, :contenido, :imagen)");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':imagen', $ruta_imagen);

    $stmt->execute();

    header("Location: index.php"); // Redireccionar al dashboard después de la publicación
}
?>


<?php include '../header.php'; ?>
<!--Aqui empieza el estilo para el editor del formulario descripcion--><style> /**/
    .ck-editor__editable[role="textbox"]{
        min-height: 230px
    } 
</style> <!--Aqui termina el estido-->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script><!--Link para que coja el estilo de formulario editor-->
<div class="container-fluid px-4">
<h2  class="mt-3">Nueva Entrada de Blog</h2>
    
    <form action="procesar_entrada.php" method="post" enctype="multipart/form-data" autocomplete="off"><!--Aqui empieza el formulario-->
        <!---->
    <div class="mb-3"><!--Aqui inicia el input de titulo-->
            <label for="titulo" class="form-label">Titulo</label>
              <input type="text" class="form-control" name="titulo" id="titulo" required autofocus>
            </div><!--Aqui termina el input de titulo-->

            <div class="mb-3"><!--Aqui inicia el input de contenido-->
              <label for="contenido" class="form-label">Contenido</label>
              <textarea  class="form-control" name="contenido" id="editor" required autofocus> </textarea>
            </div><!--Aqui termina el input de contenido-->

            <div class="row mb-3"><!--Aqui empieza el div para agregar imagen-->
                <div class="col">
                      <label for="imagen" class="form-label">Imagen</label>
                      <input type="file" class="form-control" name="imagen" id="imagen" accept="img/jpeg">
                </div><!--Aqui termina el el div del file para agregar imagen-->
</div>
    

        <input type="submit" value="Publicar Entrada"><!---->
    </form><!--Aqui termina el formulario-->
    </div>

    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php include '../footer.php'; ?>