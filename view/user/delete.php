<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'userController.php');
    $object = new userController();

    $idUsuario = $_REQUEST['id'];  
    $object->delete($idUsuario);
    
?>