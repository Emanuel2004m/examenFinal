<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyectoVeterinaria/routes.php');
require_once(CONTROLLER_PATH . 'consultaController.php');
$object = new consultaController();
$veterinarios = $object->combolistVeterinarios();
$mascotas = $object->combolistMascotas();
$usuarios = $object->combolistUsuarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>

    <?php
    require_once(ROOT_PATH . 'header.php');
    ?>
</head>

<body>
    <?php
    require_once(VIEW_PATH . 'navbar/navbar.php');
    ?>
    <div class="container">
        <div class="mb-3">
            <h2>Agregando nuevo registro</h2>
        </div>
        <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="fechaConsulta" class="form-label">FechaConsulta</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input type="data" class="form-control" id="fechaConsulta" name="fechaConsulta" value="<?= date('Y/m/d') ?>" readonly>
                <div class="invalid-feedback">ingrese fecha válida!</div>
            </div>
            <div class="mb-3">
                <label for="diagnostico" class="form-label">DIAGNOSTICO</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input type="text" class="form-control" id="diagnostico" name="diagnostico" autofocus required>
                <div class="invalid-feedback">ingrese un nombre válido!</div>
            </div>
            <div class="mb-3">
                <label for="tratamiento" class="form-label">TRATAMIENTO</label>
                <input type="text" class="form-control" id="tratamiento" name="tratamiento" required>
                <div class="invalid-feedback">ingrese un tratamiento válido!</div>
            </div>
            <div class="mb-3">
                <label for="importe" class="form-label">IMPORTE</label>
                <input type="text" class="form-control" id="importe" name="importe" required>
                <div class="invalid-feedback">ingrese un importe válido!</div>
            </div>
            <div class="mb-3">
                <label for="idVeterinario" class="form-label">VETERINARIO</label>
                <select class="form-control" name="idVeterinario" id="idVeterinario" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($veterinarios as $veterinario) { ?>
                        <option value="<?= $veterinario['idVeterinario'] ?>"><?= $veterinario['nomVeterinario'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idMascota" class="form-label">MASCOTA</label>
                <select class="form-control" name="idMascota" id="idMascota" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($mascotas as $mascota) { ?>
                        <option value="<?= $mascota['idMascota'] ?>"><?= $mascota['nomMascota'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idUsuario" class="form-label">USUARIO</label>
                <select class="form-control" name="idUsuario" id="idUsuario" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <option value="<?= $usuario['idUsuario'] ?>"><?= $usuario['alias'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
        </form>
    </div>
</body>
<?php
require_once(ROOT_PATH . 'footer.php');
?>

</html>