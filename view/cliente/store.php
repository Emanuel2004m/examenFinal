<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'clienteController.php');
    $object = new clienteController();

    $nomCliente= $_REQUEST['nomCliente'];
    $cni= $_REQUEST['cni'];
    $direccion= $_REQUEST['direccion'];
    $telefono= $_REQUEST['telefono'];
    
    $registro = $object->insert($nomCliente,$cni,$direccion,$telefono);

    header('location: index.php')
?>