<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
require_once(CONTROLLER_PATH.'clienteController.php');
$object = new clienteController();
$idCliente = $_GET['id'];
$cliente = $object->search($idCliente);
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
            <h2>Editando registro</h2>
        </div>
        <form id="formPersona" action="update.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID Cliente</label>
                <input value="<?=$cliente[0]?>" type="text" class="form-control" id="id" name="id" readonly>
            </div>
            <div class="mb-3">
                <label for="nomCliente" class="form-label">Nombre</label>
                <input value="<?=$cliente[1]?>"type="text" class="form-control" id="nomCliente" name="nomCliente" autofocus required>
            </div>
            <div class="mb-3">
                <label for="cni" class="form-label">cni</label>
                <input value="<?=$cliente[2]?>" type="text" class="form-control" id="cni" name="cni"required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <input value="<?=$cliente[3]?>" type="text" class="form-control" id="direccion" name="direccion"required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input value="<?=$cliente[4]?>" type="text" class="form-control" id="telefono" name="telefono"required>
            </div>
           
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
<?php
    require_once(ROOT_PATH.'footer.php');
    ?>

</html>