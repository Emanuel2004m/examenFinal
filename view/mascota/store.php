<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'mascotaController.php');
    $object = new mascotaController();

    $nomMascota = $_REQUEST['nomMascota'];
    $servicio = $_REQUEST['servicio'];
    $idTipo = $_REQUEST['idTipo'];
    $idRaza = $_REQUEST['idRaza'];
    $idCliente = $_REQUEST['idCliente'];
    
    $registro = $object->insert($nomMascota,$servicio,$idTipo, $idRaza, $idCliente);   
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>