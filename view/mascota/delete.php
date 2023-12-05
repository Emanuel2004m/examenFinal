<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'mascotaController.php');
    $object = new mascotaController();

    $idMascota = $_REQUEST['id'];  
    $object->delete($idMascota);
    
?>