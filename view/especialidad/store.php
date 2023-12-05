<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');

    require_once(CONTROLLER_PATH.'especialidadController.php');
    $object = new especialidadController();

    $descripcion = $_REQUEST['descripcion'];
    
    $registro = $object->insert($descripcion);

?>