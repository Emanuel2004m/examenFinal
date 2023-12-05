<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'userController.php');
    $object = new userController();
    $idUsuario = $_GET['id'];
    $alias = $object->search($idUsuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(ROOT_PATH . 'header.php') ?>
    <title>Form PHP</title>
</head>
<body>
    <?php
        require_once(VIEW_PATH.'/navbar/navbar.php');
    ?>
    <div class="container">
        <div class="mb-3">
            <h2>Editando registro</h2>
        </div>
        <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="id" class="form-label">ID Est.</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$alias[0]?>" type="text" class="form-control" id="id" name="id" readonly>
            </div>
            <div class="mb-3">
                <label for="alias" class="form-label">alias</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$alias[1]?>" type="text" class="form-control" id="alias" name="alias" autofocus required>
                 <div class="invalid-feedback">ingrese un alias válido!</div>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">clave</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$alias[2]?>" type="password" class="form-control" id="clave" name="clave" autofocus required>
                 <div class="invalid-feedback">ingrese un clave válido!</div>
            </div>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
    </div>
</body>
<?php include_once (ROOT_PATH . 'footer.php')  ?>
</html>