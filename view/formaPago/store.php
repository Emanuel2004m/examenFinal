<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'formaPagoController.php');
    $object = new formaPagoController();

    $descripcion = $_REQUEST['descripcion'];
    
    $registro = $object->insert($descripcion);

?>