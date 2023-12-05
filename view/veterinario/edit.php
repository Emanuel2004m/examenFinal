<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
require_once(CONTROLLER_PATH.'veterinarioController.php');
$object = new veterinarioController();
$idVeterinario = $_GET['id'];
$veterinarios = $object->search($idVeterinario);
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
            <h2>Editando registro de Veterinario</h2>
        </div>
        <form id="formPersona" action="update.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID Veterinario</label>
                <input value="<?=$veterinarios[0]?>" type="text" class="form-control" id="id" name="id" readonly>
            </div>
            <div class="mb-3">
                <label for="nomVeterinario" class="form-label">Nombre</label>
                <input value="<?=$veterinarios[1]?>"type="text" class="form-control" id="nomVeterinario" name="nomVeterinario" autofocus required>
            </div>
            <div class="mb-3">
                <label for="cni" class="form-label">Cedula de Identidad</label>
                <input value="<?=$veterinarios[2]?>" type="text" class="form-control" id="cni" name="cni"required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input value="<?=$veterinarios[3]?>" type="text" class="form-control" id="telefono" name="telefono"required>
            </div>
            <div class="mb-3">
                <label for="idEspecialidad" class="form-label">Codigo Especialidad</label>
                <select class="form-control" name="idEspecialidad" id="idEspecialidad">
                    <option value="0">No especificado</option>
                    <?php foreach($especialidades as $especialidad) { 
                        if($veterinarios[4]==$especialidad['idEspecialidad']){ ?>
                        <option selected="selected" value="<?=$especialidad['idEspecialidad']?>"><?=$especialidad['descripcion']?></option>
                        <?php } else {?>
                        <option value="<?=$especialidad['idEspecialidad']?>"><?=$especialidad['descripcion']?></option>
                    <?php }
                         }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
<?php
    require_once(ROOT_PATH.'footer.php');
    ?>

</html>