<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'consultaController.php');
    $object = new consultaController();

    $fechaConsulta = $_REQUEST['fechaConsulta'];
    $diagnostico = $_REQUEST['diagnostico'];
    $tratamiento = $_REQUEST['tratamiento'];
    $importe = $_REQUEST['importe'];
    $idVeterinario = $_REQUEST['idVeterinario'];
    $idMascota = $_REQUEST['idMascota'];
    $idUsuario = $_REQUEST['idUsuario'];
    
    $registro = $object->insert($fechaConsulta,$diagnostico,$tratamiento,$importe,$idVeterinario,$idMascota,$idUsuario);   
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>