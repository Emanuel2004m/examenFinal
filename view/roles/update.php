<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    
    require_once(CONTROLLER_PATH.'rolesController.php');
    $object = new rolesController();

    $idRol = $_REQUEST['id'];
    $descripcion = $_REQUEST['descripcion'];
    
    $object->update($idRol,$descripcion);

?>