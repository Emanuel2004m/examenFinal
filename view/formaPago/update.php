<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    
    require_once(CONTROLLER_PATH.'formaPagoController.php');
    $object = new formaPagoController();

    $idFormaPago = $_REQUEST['id'];
    $descripcion = $_REQUEST['descripcion'];
    
    $object->update($idFormaPago,$descripcion);

?>