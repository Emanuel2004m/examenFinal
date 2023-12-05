<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyectoVeterinaria/routes.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <?php include_once(ROOT_PATH . 'header.php') ?>
  <link rel="stylesheet" href="/proyectoVeterinaria/assets/css/login.css">
</head>

<body>
  <div id="login-button">
    <img src="../../assets/images/login-w-icon.png">
    </img>
  </div>
  <div id="container">
    <h1>LOGIN</h1>
    <span class="close-btn">
      <img src="../../assets/images/circle_close_delete_-128.png"></img>
    </span>

    <form>
      <input id="usuario" placeholder="Usuario">
      <input type="password" name="pass" id="clave" placeholder="Contraseña" autocorrect="off" spellcheck="false">
      <a id="btn-access" href="#">ACCEDER</a>
    </form>
  </div>

  <!-- Forgotten Password Container -->
  <div id="forgotten-container">
    <h1>Forgotten</h1>
    <span class="close-btn">
      <img src="../../assets/images/circle_close_delete_-128.png"></img>
    </span>

    <form>
      <input type="email" name="email" placeholder="E-mail">
      <a href="#" class="orange-btn">Get new password</a>
    </form>
  </div>
  </div>
  </section>
</body>
<?php include_once(ROOT_PATH . 'footer.php') ?>

</html>