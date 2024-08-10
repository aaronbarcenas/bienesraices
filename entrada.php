<?php 
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion contenido-centrado">
    <h1>Guia para la decoración del Hogar</h1>

    <picture>
      <source srcset="build/img/destacada.webp" type="image/webp">
      <source srcset="build/img/destacada.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/destacada." alt="">
    </picture>

    <p class="informacion-meta">Escrito el: <span>26/07/2024</span> por: <span>Admin</span></p>

    <div class="resumen-propiedad">
      
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam voluptate maiores aperiam minima vel! Qui accusamus totam molestiae tenetur at, quia nemo nam architecto ad accusantium fuga ratione minima suscipit ullam recusandae nihil voluptates voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, totam placeat neque quod magni commodi ipsa a hic? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, quas?</p>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam doloribus quisquam officiis. Maxime vitae excepturi, illo veritatis voluptatum aliquam laborum adipisci repellat! Ut! Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
  </main>

  <?php 
    incluirTemplate('footer');
  ?>
  