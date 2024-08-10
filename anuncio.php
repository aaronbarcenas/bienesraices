<?php 

  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header('Location: /');
  }

  // Importar la Conexion a la BD...
  require 'includes/config/database.php';
  $db = conectarDB();

  // Consulta a la base de datos...
  $query = "SELECT * FROM propiedades WHERE id = ${id}";

  // Obtener los resultados de la BD...
  $resultado = mysqli_query($db, $query);

  if(!$resultado->num_rows){
    header('Location: /');
  }
  
  $propiedad = mysqli_fetch_assoc($resultado);

  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']; ?></h1>

    <!-- <picture>
      <source srcset="build/img/destacada.webp" type="image/webp">
      <source srcset="build/img/destacada.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/destacada." alt="">
    </picture> -->
    <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="">

    <div class="resumen-propiedad">
      <p class="precio">$ <?php echo number_format($propiedad['precio']); ?> MXN</p>
      <ul class="iconos-caracteristicas">
        <li>
          <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
          <p><?php echo $propiedad['wc']; ?></p>
        </li>
        <li>
          <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
          <p><?php echo $propiedad['estacionamiento']; ?></p>
        </li>
        <li>
          <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
          <p><?php echo $propiedad['habitaciones']; ?></p>
        </li>
      </ul>
      <p><?php echo $propiedad['descripcion']; ?></p>
      
    </div>
  </main>

  <?php 
    mysqli_close($db);
    incluirTemplate('footer');
  ?>
