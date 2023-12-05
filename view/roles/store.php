<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'rolesController.php');
    $object = new rolesController();

    $descripcion = $_REQUEST['descripcion'];
    
    $registro = $object->insert($descripcion);

?>