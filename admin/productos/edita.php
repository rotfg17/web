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

$id = $_GET['id'];


$sql = $con->prepare("SELECT id, nombre, marca, descripcion, precio, descuento, stock, num_referencia, id_categoria FROM productos WHERE id = ? LIMIT 1");
$sql->execute([$id]);
$productos = $sql->fetch(PDO::FETCH_ASSOC);

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
        <h2  class="mt-3">Editar producto</h2>
        <!-- Categorías -->

        <form action="actualiza.php" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" value="<?php echo $productos['nombre']; ?>" required autofocus>
            </div>

            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea  class="form-control" name="descripcion" id="editor" value="<?php echo $productos['descripcion']; ?>" required autofocus> </textarea>
            </div>

            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
            <div class="row">
            <div class="col mb-3">
              <label for="marca" class="form-label">Marca</label>
              <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $productos['marca']; ?>" autofocus>
            </div>

            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
            <div class="col mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $productos['precio']; ?>" required autofocus>
            </div>

            <div class="col mb-3">
              <label for="descuento" class="form-label">Descuento</label>
              <input type="number" class="form-control" name="descuento" id="descuento" value="<?php echo $productos['descuento']; ?>" autofocus>
            </div>

            <div class="col mb-3">
              <label for="referencia" class="form-label">Número de referencia</label>
              <input type="text" class="form-control" name="referencia" id="referencia" value="<?php echo $productos['num_referencia']; ?>" required autofocus>
            </div>

            <div class="col mb-3">
              <label for="stock" class="form-label">Stock</label>
              <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $productos['stock']; ?>" required autofocus>
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