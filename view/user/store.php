<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'userController.php');
    $object = new userController();

    $alias = $_REQUEST['alias'];
    $clave = $_REQUEST['clave'];
    
    $registro = $object->insert($alias, $clave);

?>