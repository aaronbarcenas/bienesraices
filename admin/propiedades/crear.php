
<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth){
  header('Location: /');
}

  // Base de Datos
  require '../../includes/config/database.php';
  $db = conectarDB();

  // Consulta a la BD para obtener los vendedores...
  $consulta = 'SELECT * FROM vendedores';
  $resultado = mysqli_query($db, $consulta);

  if(!$db) {
    echo "Error no se pudo conectar";
  } else {
    echo "Si se pudo conectar";
  };
  
  // Arreglo con mensaje de errores...
  $errores = [];

  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitaciones = '';
  $wc = '';
  $estacionamiento = '';
  $vendedores_id = '';


  // Ejecuta el codigo del POST despues de que se valide el formulario...
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    // Este echo sirve para ver mas detalles de la subida de archivos
    // echo '<pre>';
    // var_dump($_FILES);
    // echo '</pre>';

    $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string( $db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
    $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedor'] );
    $creado = date('Y/m/d');

    // Asignar files hacia una variable...
    $imagen = $_FILES['imagen'];

    if(!$titulo) {
      $errores[] = 'Titulo vacio, debes añadir un titulo a la propiedad...';
    }

    if(!$precio||$precio < 1) {
      $errores[] = 'Precio vacio o menor a 1 debes añadir un precio razonable...';
    }

    if(strlen($descripcion) < 50) {
      $errores[] = 'La descripcion es obligatoria y debe tener al menos 50 caracteres...';
    }

    if(!$habitaciones||$habitaciones < 0) {
      $errores[] = 'El numero de habitaciones es obligatorio...';
    }

    if(!$wc||$wc < 0) {
      $errores[] = 'El numero de Baños es obligatorio...';
    }

    if(!$estacionamiento||$estacionamiento < 0) {
      $errores[] = 'El numero de lugares para estacionar es obligatorio...';
    }

    if(!$vendedores_id) {
      $errores[] = 'Elige un vendedor...';
    }

    if(!$imagen['name'] || $imagen['error'] ) {
      $errores[] = 'La Imagen es obligatoria...';
    }

    // Validar por tamaño ( 100kb maximo )
    $medida = 1000 * 2000;

    if($imagen['size'] > $medida ) {
      $errores[] = 'La Imagen es muy pesada...';
    }

    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';

    // Revisar que el array de errores este vacio para poder ejecutar el envio a la base de datos
    if(empty($errores)){

      /** SUBIDA DE ARCHIVOS **/

      // Crear carpeta...
      $carpetaImagenes = '../../imagenes/';

      if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
      }
      // Generar un nombre unico
      $nombreImagen = md5( uniqid( rand(), true )) . '.jpg';

      // Subir imagen
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

      // Insertar en la base de datos
      $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id ) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id' ) ";

      $resultado = mysqli_query($db, $query);

      // echo $query;

      if($resultado){
        //echo "Insertado Correctamente";
        // Redireccionar al usuario para evitar que se dupliquen las entradas...
        header('Location: /admin?resultado=1');
      }
    }
  }
  
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Crear</h1>

    <a class="boton boton-verde" href="/admin/">Volver</a>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <ul><li><?php echo $error; ?></li></ul>
      </div>
    <?php endforeach; ?>

    <form 
      action="" 
      class="formulario" 
      method="POST" 
      action="/admin/propiedades/crear.php"
      enctype="multipart/form-data"
    >
      <fieldset>
        <legend>Información General</legend>

        <label for="titulo">Titulo:</label>
        <input 
          type="text" 
          id="titulo" 
          name="titulo" 
          placeholder="Titulo de la Propiedad..." 
          value="<?php echo $titulo; ?>">

        <label for="precio">Precio:</label>
        <input 
          type="number" 
          id="precio" 
          name="precio" 
          placeholder="Precio de la Propiedad..." 
          value="<?php echo $precio; ?>">

        <label for="imagen">Imagen:</label>
        <input 
          type="file" 
          id="imagen" 
          name="imagen" 
          accept="image/jpg, image/png">

        <label for="precio">Descripción:</label>
        <textarea 
          id="descripcion" 
          name="descripcion">
          <?php echo $descripcion; ?>
        </textarea>
      </fieldset>

      <fieldset>
        <legend>Información de la Propiedad</legend>

        <label for="habitaciones">Habitaciones:</label>
        <input 
          type="number" 
          id="habitaciones" 
          name="habitaciones" 
          placeholder="Número de Habitaciones de la propiedad" 
          value="<?php echo $habitaciones; ?>">

        <label for="wc">Baños:</label>
        <input 
          type="number" 
          id="wc" 
          name="wc" 
          placeholder="Número de Baños de la propiedad" 
          value="<?php echo $wc; ?>">

        <label for="estacionemiento">Estacionemiento:</label>
        <input 
          type="number" 
          id="estacionemiento" 
          name="estacionamiento" 
          placeholder="Número lugares para estacionar de la propiedad" 
          value="<?php echo $estacionamiento; ?>">

      </fieldset>

      <fieldset>
        <legend>Vendedor</legend> 
        <select name="vendedor" id="">
          <option value="" selected disabled>-- Seleccione un Vendedor --</option>
          <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
            <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
          <?php endwhile; ?>
        </select>
      </fieldset>

      <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

  </main>

  <?php 
    incluirTemplate('footer');
  ?>
  