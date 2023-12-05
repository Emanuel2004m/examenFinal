<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'veterinarioController.php');
    $object = new veterinarioController();

    $nomVeterinario= $_REQUEST['nomVeterinario'];
    $cni= $_REQUEST['cni'];
    $telefono= $_REQUEST['telefono'];
    $idEspecialidad= $_REQUEST['idEspecialidad'];
    
    $registro = $object->insert($nomVeterinario, $cni,$telefono,$idEspecialidad);
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>