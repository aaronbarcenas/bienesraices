<?php 
  require 'includes/funciones.php';
  incluirTemplate('header');
?>


<main class="contenedor seccion">
  <h2>Casas y Departamentos en Venta</h2>

  <?php
    $limite = 10;
    include 'includes/templates/anuncios.php';
  ?>
  
</main> <!-- Anuncios Fin-->


  <?php 
    incluirTemplate('footer');
  ?>
  