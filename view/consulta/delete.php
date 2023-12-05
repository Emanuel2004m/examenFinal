<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'consultaController.php');
    $object = new consultaController();

    $idConsultas = $_REQUEST['id'];  
    $object->delete($idConsultas);
    
?>