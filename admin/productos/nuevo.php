<?php  

// Requiere los archivos necesarios
require '../config/database.php';
require '../config/config.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_type'])){
   header('Location: ../index.php');
   exit;
}

// Verifica si el usuario es de tipo 'admin'
if ($_SESSION['user_type'] != 'admin'){
    header('Location: ../../index.php');
    exit;
 }

$db = new Database();
$con = $db->conectar();

$sql = "SELECT id, nombre FROM categoria WHERE activo = 1";
$resultado = $con->query($sql);
$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../header.php';?>
<style>
    .ck-editor__editable[role="textbox"]{
        min-height: 230px
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<main>
    <div class="container-fluid px-4">
        <h2  class="mt-3">Nuevo producto</h2>
        

        <form action="guarda.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" required autofocus>
            </div>


            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea  class="form-control" name="descripcion" id="editor" required autofocus> </textarea>
            </div>

            <div class="row mb-2">
                <div class="col">
                      <label for="imagen_principal" class="form-label">Imagen principal</label>
                      <input type="file" class="form-control" name="imagen_principal" id="imagen_principal" accept="img/jpeg" required>
                </div>
                <div class="col">
                <label for="otras_imagenes" class="form-label">Otras imagenes</label>
                <input type="file" class="form-control" name="otras_imagenes[]" id="otras_imagenes" accept="img/jpeg" multiple>
                </div>
            </div>

            <div class="row">
            <div class="col mb-3">
              <label for="marca" class="form-label">Marca</label>
              <input type="text" class="form-control" name="marca" id="marca"  autofocus>
            </div>

            <div class="col mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" name="precio" id="precio" required autofocus>
            </div>

            <div class="col mb-3">
              <label for="descuento" class="form-label">Descuento</label>
              <input type="number" class="form-control" name="descuento" id="descuento"  autofocus>
            </div>

            <div class="col mb-3">
              <label for="referencia" class="form-label">Número de referencia</label>
              <input type="text" class="form-control" name="referencia" id="referencia" required autofocus>
            </div>

            <div class="col mb-3">
              <label for="stock" class="form-label">Stock</label>
              <input type="number" class="form-control" name="stock" id="stock" required autofocus>
            </div>
            </div>

            <div class="row">
            <div class="col-4 mb-3">
              <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select " name="categoria" id="categoria" required>
                    <option value="">Seleccionar categoría</option>
                    <?php foreach($categorias as $categoria)  { ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</main>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php require_once '../footer.php';