<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
       header('location: ../usuario/login.php');
    }

    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'mascotaController.php');
    $object = new mascotaController();
    $tipos = $object->combolisttipo();
    $razas = $object->combolistraza();
    $clientes = $object->combolistcliente();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Form PHP</title>
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
                <label for="nomMascota" class="form-label">MASCOTA</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input type="text" class="form-control" id="nomMascota" name="nomMascota" autofocus required>
                 <div class="invalid-feedback">ingrese un nombre válido!</div>
            </div>
            <div class="mb-3">
                <label for="servicio" class="form-label">SERVICIO</label>
                <input type="text" class="form-control" id="servicio" name="servicio" required>
                <div class="invalid-feedback">ingrese un servicio válido!</div>
            </div>
            <div class="mb-3">
                <label for="idTipo" class="form-label">TIPO MASCOTA</label>
                <select class="form-control" name="idTipo" id="idTipo" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($tipos as $tipo) { ?>
                       <option value="<?=$tipo['idTipo']?>"><?=$tipo['descripcion']?></option> 
                    <?php } ?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idRaza" class="form-label">RAZA</label>
                <select class="form-control" name="idRaza" id="idRaza" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($razas as $raza) { ?>
                       <option value="<?=$raza['idRaza']?>"><?=$raza['descripcion']?></option> 
                    <?php } ?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <div class="mb-3">
                <label for="idCliente" class="form-label">CLIENTE</label>
                <select class="form-control" name="idCliente" id="idCliente" required>
                    <option selected disabled value="">No especificado</option>
                    <?php foreach ($clientes as $cliente) { ?>
                       <option value="<?=$cliente['idCliente']?>"><?=$cliente['nomCliente']?></option> 
                    <?php } ?>
                </select>
                <div class="invalid-feedback">seleccione un elemento válido!</div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
            </form>
    </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>

</html>