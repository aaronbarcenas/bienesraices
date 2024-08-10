<?php
  if(!isset($_SESSION)){
    session_start();
  }

  $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inmobiliaria Oscar</title>
  <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

  <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">

          <a href="/">
            <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">
          </a>
        
        
        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="Icono menu responsive">
        </div>

        <div class="derecha">
          <nav class="navegacion">
            <img class="tache" src="/build/img/X.svg" alt="Icono responsive Cerrar">
            <a href="nosotros.php">Nosotros</a>
            <a href="anuncios.php">Anuncios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.php">Contacto</a>
            <?php if($auth): ?>
              <a href="cerrar-sesion.php">Cerrar Sesión</a>
            <?php else: ?>
            <a href="login.php">Login</a>
            <?php endif; ?>
            <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Icono modo oscuro">
          </nav>
        </div>
        
      </div> <!--.barra -->

      <?php if($inicio) { ?>
        <h1>Venta de Casas y Departamentos de Lujo</h1>
      <?php } ?>
      

    </div>
  </header>