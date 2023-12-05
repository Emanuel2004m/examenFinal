<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
    include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'clienteController.php');
    $object = new clienteController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PHP</title>
    <?php
    require_once(ROOT_PATH.'header.php');
    ?>
</head>

<body>
    <?php
        require_once(VIEW_PATH.'navbar/navbar.php');
    ?>
    <div class="container">
        <div class="container">
            <h2>Agregando nuevo Cliente</h2>
        </div>
        <form id="formPersona" action="store.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nomCliente" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nomCliente" name="nomCliente" autofocus required>
                <div class="invalid-feedback">ingrese un nombre válido</div>
            </div>
            <div class="mb-3">
                <label for="cni" class="form-label">Cedula identidad</label>
                <input type="text" class="form-control" id="cni" name="cni" required>
                <div class="invalid-feedback">ingrese un cni válido</div>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="direccion" name="direccion" autofocus required>
                <div class="invalid-feedback">ingrese una direccion válido</div>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" autofocus required>
                <div class="invalid-feedback">ingrese un telefono válido</div>
            </div>
          
            <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
        </form>
    </div>
</body>
<?php
    require_once(ROOT_PATH.'footer.php');
    ?>
</html>