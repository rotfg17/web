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

// Verificar si se ha proporcionado un ID válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles de la entrada existente
    $stmt = $con->prepare("SELECT id, titulo, contenido, imagen FROM entradas_blog WHERE id = ? AND activo =1");
    $stmt->execute([$id]);
    $entrada = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si la entrada existe
    if (!$entrada) {
        echo "Entrada no encontrada.";
        exit;
    }
} else {
    echo "ID de entrada no válido.";
    exit;
}

// Procesar la actualización cuando se envíe el formulario de edición
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
        // Mantener la imagen actual si no se selecciona una nueva
        $ruta_imagen = $entrada['imagen'];
    }

    // Actualizar la entrada en la base de datos
    $stmt = $con->prepare("UPDATE entradas_blog SET titulo = :titulo, contenido = :contenido, imagen = :imagen WHERE id = :id");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':imagen', $ruta_imagen);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    header("Location: index.php"); // Redireccionar al dashboard después de la actualización
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
    
    <form action="edita.php?id=<?= $id ?>" method="post" enctype="multipart/form-data"><!--Aqui empieza el formulario-->
        <!---->
    <div class="mb-3"><!--Aqui inicia el input de titulo-->
            <label for="titulo" class="form-label">Titulo</label>
              <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $entrada['titulo']; ?>" required autofocus>
            </div><!--Aqui termina el input de titulo-->

            <div class="mb-3"><!--Aqui inicia el input de contenido-->
              <label for="contenido" class="form-label">Contenido</label>
              <textarea  class="form-control" name="contenido" id="editor"  required autofocus><?php echo $entrada['contenido']; ?> </textarea>
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