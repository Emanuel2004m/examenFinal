<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'rolesController.php');
    $object = new rolesController();

    $idPermisos = $_REQUEST['id'];  
    $object->delete($idPermisos);
    
?>