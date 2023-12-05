<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'razaController.php');
    $object = new razaController();

    $idRaza = $_REQUEST['id'];  
    $object->delete($idRaza);
    
?>