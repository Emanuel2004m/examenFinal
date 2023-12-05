<?php
session_start();
if (!isset($_SESSION["usuario"])) {
   header('location: ../usuario/login.php');
}
include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
require_once(MODEL_PATH.'clienteModel.php');
$object = new clienteModel();
$rows = $object->listar();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
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
            <div class="mb-3">
                <h2>Listado de Cliente</h2>
            </div>
            <div class="mb-3">
                <a href="./create.php" class="btn btn-primary">Agregar</a>
            </div>
            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
                <table id="myTabla" class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col" class="text-white">Id</th>
                            <th scope="col" class="text-white">Nombre</th>
                            <th scope="col" class="text-white">Cni</th>
                            <th scope="col" class="text-white">Direccion</th>
                            <th scope="col" class="text-white">Telefono</th>
                            <th scope="col" class="text-white">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <td><?= $row['idCliente'] ?></td>
                                <td><?= $row['nomCliente'] ?></td>
                                <td><?= $row['cni'] ?></td>
                                <td><?= $row['direccion'] ?></td>
                                <td><?= $row['telefono'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['idCliente'] ?>" class="btn btn-warning">Editar</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?= $row['idCliente'] ?>">Eliminar</a>

                                    <!-- modal para ver y del-->
                                    <?php
                                    include('viewModal.php');
                                    include('deleteModal.php');
                                    ?>
                                </td>
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
            <h2 style="font-size: 3.00rem;">Listado de Clientes</h2>
        </div>
        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
            <table class="table table-striped mb-0" style="font-size: 2.00rem;">
                <thead style="background-color: #002d72;">
                    <tr>
                        <th scope="col" colspan="1" class="text-white">Id</th>
                        <th scope="col" colspan="3" class="text-white">Nombre</th>
                        <th scope="col" colspan="3" class="text-white">Cni</th>
                        <th scope="col" colspan="3" class="text-white">Direccion</th>
                        <th scope="col" colspan="3" class="text-white">Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td colspan="1"><?= $row['idCliente'] ?></td>
                            <td colspan="3"><?= $row['nomCliente'] ?></td>
                            <td colspan="3"><?= $row['cni'] ?></td>
                            <td colspan="3"><?= $row['dirreccion'] ?></td>
                            <td colspan="3"><?= $row['telefono'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- fin area de impresion -->
</body>
<?php
    require_once(ROOT_PATH.'footer.php');
    
    ?>
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
</html>