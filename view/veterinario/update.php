<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'veterinarioController.php');
    $object = new veterinarioController();

    $idVeterinario= $_REQUEST['id'];
    $nomVeterinario= $_REQUEST['nomVeterinario'];
    $cni= $_REQUEST['cni'];
    $telefono= $_REQUEST['telefono'];
    $idEspecialidad= $_REQUEST['idEspecialidad'];
    
    $registro = $object->update($idVeterinario,$nomVeterinario,$cni,$telefono,$idEspecialidad);

    header('location: index.php');
?>