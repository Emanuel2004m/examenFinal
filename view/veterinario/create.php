<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
    include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'veterinarioController.php');
    $object = new veterinarioController();
    $especialidades = $object->combolist();
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
            <h2>Agregando nuevo registro</h2>
        </div>
        <form id="formPersona" action="store.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nomVeterinario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nomVeterinario" name="nomVeterinario" autofocus required>
                <div class="invalid-feedback">ingrese un nombre válido</div>
            </div>
            <div class="mb-3">
                <label for="cni" class="form-label">Cedula de Identidad</label>
                <input type="text" class="form-control" id="cni" name="cni" required>
                <div class="invalid-feedback">ingrese una Cedula de identidad válido</div>

            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
                <div class="invalid-feedback">ingrese un Telefono válido</div>

            </div>
            <div class="mb-3">
                <label for="idEspecialidad" class="form-label">Codigo Especialidad</label>
                <select class="form-control" name="idEspecialidad" id="idEspecialidad" required>
                    <option selected disasbled value="">No especificado</option>
                    <?php foreach($especialidades as $especialidad) { ?>
                        <option value="<?=$especialidad['idEspecialidad']?>"><?=$especialidad['descripcion']?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">Seleccione un elemento valido!</div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
        </form>
    </div>
</body>
<?php
    require_once(ROOT_PATH.'footer.php');
    ?>
</html>