<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
     include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
     require_once(CONTROLLER_PATH.'consultaController.php');
     $object = new consultaController();
     $rows = $object->select();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    
    <?php
    require_once(ROOT_PATH.'header.php');
    ?>
</head>
<body>
<?php
        require_once(VIEW_PATH.'navbar/navbar.php');
?>
<section class="intro">
    <div class="container">
        <div class="mb-3"></div>
        <div class="mb-3">
            <a href="create.php" class="btn btn-primary">Agregar</a>
        </div>
        <div class="table-responsive table-scroll" 
        data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
        <table id="myTabla" class="table table-striped mb-0">
            <thead style="background-color: #002d72;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FECHA CONSULTA</th>
                    <th scope="col">DIAGNOSTICO</th>
                    <th scope="col">TRATAMIENTO</th>
                    <th scope="col">IMPORTE</th>
                    <th scope="col">VETERINARIO</th>
                    <th scope="col">MASCOTA</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ((array) $rows as $row) { ?>
                <tr>
                    <td><?=$row['idConsultas']?></td>
                    <td><?=$row['fechaConsulta']?></td>
                    <td><?=$row['diagnostico']?></td>
                    <td><?=$row['tratamiento']?></td>
                    <td><?=$row['importe']?></td>
                    <td><?=$row['nomVeterinario']?></td>
                    <td><?=$row['nomMascota']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>  
    </div>  
</section>
        <!-- div area de impresion -->
            <div class="container" id="ventana" style="display:none;">
                <div class="mb-3">
                    <h2 style="font-size: 3.00rem;">Listado de Estudiantes</h2>
                </div>
                <div class="table-responsive table-scroll" 
                data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
                <table class="table table-striped mb-0" style="font-size: 2.00rem;">
                    <thead>
                        <tr>
                            <th colspan="1" scope="col">ID</th>
                            <th colspan="3" scope="col">NOMBRE</th>
                            <th colspan="3" scope="col">APELLIDO</th>
                            <th colspan="3" scope="col">ciudad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td colspan="1"><?=$row['idEstudiante']?></td>
                            <td colspan="3"><?=$row['nombre']?></td>
                            <td colspan="3"><?=$row['apellido']?></td>
                            <td colspan="3"><?=$row['ciudad']?></td>     
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>   
        <!-- fin area de impresion -->
</body>
<?php include_once (ROOT_PATH . 'footer.php')  ?>
<script>
    $(document).ready( function () {
        //$('#myTabla').DataTable();
        var table = new DataTable('#myTabla', {
            language: {
                url: '../../assets/js/es-ES.json',
            },
            'paging': true,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'Todos']
            ] 
        });
    } );    
</script>
<?php
    require_once(ROOT_PATH.'footer.php');
    ?>
</html>