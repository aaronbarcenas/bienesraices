<?php 
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>
    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="build/img/nosotros.webp" type="image/webp">
          <source srcset="build/img/nosotros.jpg" type="image/jpeg">
          <img loading="lazy" src="buil/img/nosotros.jpg" alt="Imagen Nosotros">
        </picture>
      </div>
      <div class="texto-nosotros">
        <blockquote>25 años de experiencia</blockquote>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam voluptate maiores aperiam minima vel! Qui accusamus totam molestiae tenetur at, quia nemo nam architecto ad accusantium fuga ratione minima suscipit ullam recusandae nihil voluptates voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, totam placeat neque quod magni commodi ipsa a hic? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, quas?</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam doloribus quisquam officiis. Maxime vitae excepturi, illo veritatis voluptatum aliquam laborum adipisci repellat! Ut! Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
    </div>
  </main>

  <section class="contenedor seccion">
    <h1>Más sobre Nosotros</h1>

    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe eveniet ad. Praesentium unde quas officiis.</p>
      </div>
      <div class="icono">
        <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
        <h3>Precio</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe eveniet ad. Praesentium unde quas officiis.</p>
      </div>
      <div class="icono">
        <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
        <h3>A Tiempo</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quibusdam nihil saepe eveniet ad. Praesentium unde quas officiis.</p>
      </div>
    </div>

  </section>

  <?php 
    incluirTemplate('footer');
  ?>
  