<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    
    require_once(CONTROLLER_PATH.'tipoMascotaController.php');
    $object = new tipoMascotaController();

    $idTipo = $_REQUEST['id'];
    $descripcion = $_REQUEST['descripcion'];
    
    $object->update($idTipo,$descripcion);

?>