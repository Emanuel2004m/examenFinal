<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
    if (!isset($_SESSION["usuario"])) {
       header('location: ../usuario/login.php');
    }
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'consultaController.php');
    $object = new consultaController();
    $idConsultas = $_GET['id'];
    $consultas = $object->search($idConsultas);
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
    require_once(ROOT_PATH.'header.php');
    ?>
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
                <label for="idConsultas" class="form-label">idConsultas Est.</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$consultas[0]?>" type="text" class="form-control" id="idConsultas" name="idConsultas" readonly>
            </div>
            <div class="mb-3">
                <label for="fechaConsulta" class="form-label">Fecha</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input type="text" class="form-control" id="fechaConsulta" name="fechaConsulta" value="<?= date('Y/m/d') ?>" value="<?=$consultas[1]?>"  readonly>
                <div class="invalid-feedback">ingrese fechaConsulta válida!</div>
            </div>
            <div class="mb-3">
                <label for="diagnostico" class="form-label">diagnostico</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$consultas[2]?>" type="text" class="form-control" id="diagnostico" name="diagnostico" autofocus required>
                 <div class="invalid-feedback">ingrese un nombre válido!</div>
            </div>
            <div class="mb-3">
                <label for="tratamiento" class="form-label">tratamiento</label>
                <input value="<?=$consultas[3]?>" type="text" class="form-control" id="tratamiento" name="tratamiento" required>
                 <div class="invalid-feedback">ingrese un tratamiento válido!</div>          
            </div>
            <div class="mb-3">
                <label for="importe" class="form-label">importe</label>
                <input value="<?=$consultas[4]?>" type="text" class="form-control" id="importe" name="importe" required>
                 <div class="invalid-feedback">ingrese un importe válido!</div>          
            </div>
            <div class="mb-3">
                <label for="idVeterinario" class="form-label">Tipo Mascota</label>
                <select class="form-control" name="idVeterinario" id="idVeterinario" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($veterinarios as $veterinario) { 
                        if ($consultas[5]==$veterinario['idVeterinario']) { ?>
                            <option selected="selected" value="<?=$veterinario['idVeterinario']?>"><?=$veterinario['nomVeterinario']?></option> 
                        <?php } else { ?>
                            <option value="<?=$veterinario['idVeterinario']?>"><?=$veterinario['nomVeterinario']?></option> 
                    <?php } 
                        }?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idMascota" class="form-label">Raza Mascota</label>
                <select class="form-control" name="idMascota" id="idMascota" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($mascotas as $mascota) { 
                        if ($consultas[6]==$mascota['idMascota']) { ?>
                            <option selected="selected" value="<?=$mascota['idMascota']?>"><?=$mascota['nomMascota']?></option> 
                        <?php } else { ?>
                            <option value="<?=$mascota['idMascota']?>"><?=$mascota['nomMascota']?></option> 
                    <?php } 
                        }?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idUsuario" class="form-label">Cliente</label>
                <select class="form-control" name="idUsuario" id="idUsuario" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($usuarios as $usuario) { 
                        if ($consultas[7]==$usuario['idUsuario']) { ?>
                            <option selected="selected" value="<?=$usuario['idUsuario']?>"><?=$usuario['alias']?></option> 
                        <?php } else { ?>
                            <option value="<?=$usuario['idUsuario']?>"><?=$usuario['alias']?></option> 
                    <?php } 
                        }?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
    </div>
</body>
<?php
    require_once(ROOT_PATH.'footer.php');
    ?>
</html>