<?php 
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
      <source srcset="build/img/destacada3.webp" type="image/webp">
      <source srcset="build/img/destacada3.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de Contacto</h2>
    <form action="" class="formulario">
      <fieldset>
        <legend>Informacion personal</legend>
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Tu nombre..." id="nombre"></fielset>
        <label for="email">e-mail</label>
        <input type="email" placeholder="tu-correo@correo.com" id="email"></fielset>
        <label for="telefono">Teléfono</label>
        <input type="tel" placeholder="Tu Telefono..." id="telefono"></fielset>
        <label for="mensaje">Mensaje:</label>
        <textarea name="" id="mensaje"></textarea>
      </fieldset>
      <fieldset>
        <legend>informacion sobre la propiedad</legend>
        <label for="">Vende o Compra:</label>
        <select name="" id="opciones">
          <option value="" disabled selected>-- Seleccione --</option>
          <option value="Compra">Compra</option>
          <option value="Vende">Vende</option>
        </select>
        <label for="presupuesto">Precio o Presupuesto</label>
        <input type="number" placeholder="¿Cual es tu presupuesto...?" id="presupuesto">
      </fieldset>
      <fieldset>
        <legend>Contacto</legend>
        <p>Como desea ser contactado:</p>
        <div class="forma-contacto">
          <label for="contactar-telefono">Teléfono</label>
          <input name="contacto" type="radio" value="telefono" id="contactar-telefono"><label for="">
          <label for="contactar-email">E-mail</label>
          <input name="contacto" type="radio" value="email" id="contactar-email"><label for="">
        </div>
        <p>Si eligio teléfono elija la hora y fecha</p>
        <label for="fecha">Fecha: </label>
        <input type="date" id="fecha">
        <label for="hora">Hora: </label>
        <input type="time" id="hora" min="09:00" max="18:00">
      </fieldset>
      <input type="submit" value="Enviar" class="boton-verde">
    </form>
  </main>

  <?php 
    incluirTemplate('footer');
  ?>
  