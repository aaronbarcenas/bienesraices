
<?php
  require '../includes/funciones.php';
  $auth = estaAutenticado();

  if(!$auth){
    header('Location: /');
  }

  // 1.- Importar conexion...
  require '../includes/config/database.php';
  $db = conectarDB();

  // 2.- Escribir Query...
  $query = 'SELECT * FROM propiedades';

  // 3.- Consultar la BD...
  $resultadoConsulta = mysqli_query($db, $query);


  // Muestra mensaje condicional despues de crear una propiedad
  $resultado = $_GET['resultado'] ?? null;

  // Código para boton eliminar...

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id) {
      // Elimina el archivo del servidor....
      $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
      $resultado = mysqli_query($db, $query);
      $propiedad = mysqli_fetch_assoc($resultado);
      unlink('../imagenes' . $propiedad['imagen']);

      // Eliminar la propiedad de la base de datos...
      $query = "DELETE FROM propiedades WHERE id = ${id}";
      $resultado = mysqli_query($db, $query);

      if($resultado) {
        header('location: /admin?resultado=3');
      }
    }
  }
  
  // Incluye un Template...
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Administrador de bienes Raices</h1>

    <?php if( intval( $resultado ) === 1 ): ?>
      <p class="alerta exito">Anuncio creado correctamente</p>
    <?php elseif( intval( $resultado ) === 2): ?>
      <p class="alerta modificar">Anuncio actualizado correctamente</p>
    <?php elseif( intval( $resultado ) === 3): ?>
      <p class="alerta eliminar">Anuncio eliminado correctamente</p>
    <?php endif; ?>  

    <a class="boton boton-verde" href="/admin/propiedades/crear.php">Nueva Propiedad</a>

    <table class="propiedades">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody> <!-- 4.- Mostrar los resultados --> 
        <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
        <tr> 
          <td> <?php echo $propiedad['id']; ?> </td>
          <td> <?php echo $propiedad['titulo']; ?> </td>
          <td> <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen propiedad"> </td>
          <td>$ <?php echo number_format($propiedad['precio']); ?> </td>
          <td>
            <form action="" method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>
            <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" 
               class="boton-amarillo-block"> Actualizar
            </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>

    </table>
  </main>

  <?php 
    incluirTemplate('footer');

    // 5.- Cerrar la conexion (opcional)...
    mysqli_close($db);
  ?>
  