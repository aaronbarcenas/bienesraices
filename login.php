<?php 

  require 'includes/config/database.php';
  $db = conectarDB();

  $errores = [];

  // Autenticar el usuario

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
      $errores[] = "El email es obligatorio o no es valido...";
    }

    if(!$password){
      $errores[] = "El password es obligatorio...";
    }

    if(empty($errores)) {
      
      // Revisar si el usuario existe...
      $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
      $resultado = mysqli_query($db, $query);

      var_dump($resultado);

      if( $resultado->num_rows ){
        // Revisar si el password es correcto...
        $usuario = mysqli_fetch_assoc($resultado);
        $auth = password_verify($password, $usuario['password']);
        
        if($auth) {
          // El usuario esta autenticado...
          session_start();

          // Llenar el arreglo de la sesion...
          $_SESSION['usuario'] = $usuario['email'];
          $_SESSION['login'] = true;

          header('Location: /admin');

        } else {
          $errores[] = 'El password es incorrecto...';
        }

      } else {
        $errores[] = "El usuario no existe...";
      }
    }
  }

  // Incluye el header
  require 'includes/funciones.php';
  incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Iniciar Sesión</h1>

  <?php foreach($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>

  <form method="POST" action="" class="formulario">
    <fieldset>
      <legend>Email y Password</legend>

      <label for="email">E-mail</label>
      <input type="email" name="email" placeholder="Tu Email..." id="email" required>

      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Tu Password" id="password" required>

    </fieldset>

    <input class="boton boton-verde" type="submit" value="Iniciar Sesión" >
  </form>

</main>

<?php 
  incluirTemplate('footer');
?>
