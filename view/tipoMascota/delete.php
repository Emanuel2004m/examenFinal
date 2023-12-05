<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'tipoMascotaController.php');
    $object = new tipoMascotaController();

    $idEspecialidad = $_REQUEST['id'];  
    $object->delete($idTipo);
    
?>