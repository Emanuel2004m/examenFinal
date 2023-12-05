<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'mascotaController.php');
    $object = new mascotaController();
    $idMascota = $_GET['id'];
    $mascota = $object->search($idMascota);
    $tipos = $object->combolisttipo();
    $razas = $object->combolistraza();
    $clientes = $object->combolistcliente();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
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
                <label for="idMascota" class="form-label">idMascota Est.</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$mascota[0]?>" type="text" class="form-control" id="idMascota" name="idMascota" readonly>
            </div>
            <div class="mb-3">
                <label for="nomMascota" class="form-label">nomMascota</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$mascota[1]?>" type="text" class="form-control" id="nomMascota" name="nomMascota" autofocus required>
                 <div class="invalid-feedback">ingrese un nombre válido!</div>
            </div>
            <div class="mb-3">
                <label for="servicio" class="form-label">servicio</label>
                <input value="<?=$mascota[2]?>" type="text" class="form-control" id="servicio" name="servicio" required>
                 <div class="invalid-feedback">ingrese un servicio válido!</div>          
            </div>
            <div class="mb-3">
                <label for="idTipo" class="form-label">Tipo Mascota</label>
                <select class="form-control" name="idTipo" id="idTipo" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($tipos as $tipo) { 
                        if ($mascota[3]==$tipo['idTipo']) { ?>
                            <option selected="selected" value="<?=$tipo['idTipo']?>"><?=$tipo['descripcion']?></option> 
                        <?php } else { ?>
                            <option value="<?=$tipo['idTipo']?>"><?=$tipo['descripcion']?></option> 
                    <?php } 
                        }?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idRaza" class="form-label">Raza Mascota</label>
                <select class="form-control" name="idRaza" id="idRaza" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($razas as $raza) { 
                        if ($mascota[3]==$raza['idRaza']) { ?>
                            <option selected="selected" value="<?=$raza['idRaza']?>"><?=$raza['descripcion']?></option> 
                        <?php } else { ?>
                            <option value="<?=$raza['idRaza']?>"><?=$raza['descripcion']?></option> 
                    <?php } 
                        }?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idCliente" class="form-label">Cliente</label>
                <select class="form-control" name="idCliente" id="idCliente" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($clientes as $cliente) { 
                        if ($mascota[3]==$cliente['idCliente']) { ?>
                            <option selected="selected" value="<?=$cliente['idCliente']?>"><?=$cliente['nomCliente']?></option> 
                        <?php } else { ?>
                            <option value="<?=$cliente['idCliente']?>"><?=$cliente['nomCliente']?></option> 
                    <?php } 
                        }?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
    </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>