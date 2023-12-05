<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    
    require_once(CONTROLLER_PATH.'especialidadController.php');
    $object = new especialidadController();

    $idEspecialidad = $_REQUEST['id'];
    $descripcion = $_REQUEST['descripcion'];
    
    $object->update($idEspecialidad,$descripcion);

?>