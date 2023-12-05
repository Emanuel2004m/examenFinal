<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header('location: ../usuario/login.php');
    }

    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'userController.php');
    $object = new userController();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(ROOT_PATH . 'header.php') ?>
    <title>USUARIOS</title>
</head>
<body>
    <?php
        require_once(VIEW_PATH.'navbar/navbar.php');
    ?>
    <div class="container">
        <div class="mb-3">
            <h2>Agregando nuevo registro</h2>
        </div>
        <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="alias" class="form-label">alias</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input type="text" class="form-control" id="alias" name="alias" autofocus required>
                 <div class="invalid-feedback">ingrese un dato válido!</div>
            </div>                      
            <div class="mb-3">
                <label for="clave" class="form-label">clave</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input type="password" class="form-control" id="clave" name="clave" autofocus required>
                 <div class="invalid-feedback">ingrese un dato válido!</div>
            </div>                      
            <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
            </form>
    </div>
</body>
<?php include_once (ROOT_PATH . 'footer.php')  ?>

</html>