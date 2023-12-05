<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'veterinarioController.php');
    $object = new veterinarioController();

    $idVeterinario = $_REQUEST['id'];
    $object->delete($idVeterinario);
?>