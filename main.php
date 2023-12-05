<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
       header('location: ./view/usuario/login.php');
    }

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <?php 
        require_once('./header.php');
    ?>
    
</head>
<body>
    <?php 
        require_once('view/navbar/navbar.php');
        require_once('view/cliente/index.php');
    ?>
</body>
<?php 
        require_once('./footer.php');
    ?>
</html>