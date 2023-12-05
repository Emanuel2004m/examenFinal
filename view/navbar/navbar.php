<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00054c;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">KINDOG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=PROJECT_PATH?>view/cliente/">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">VETERINARIO</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/veterinario/">INFORMACION</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/especialidad/">ESPECIALIDAD</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CLIENTE</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/cliente/">Informacion</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/cliente/create.php">Agregar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">MASCOTA</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/mascota/">Informacion</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/raza/">Raza</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/tipoMascota/">Tipo Mascota</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CONSULTA</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/consulta/">LISTAR</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/consulta/create.php">AGREGAR</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FORMAS DE PAGO</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/formaPago/">INFORMACION</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/formaPago/create.php">AGREGAR</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FACTURA</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/factura/">LISTADO FACTURAS</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/factura/create.php">AGREGAR FACTURAS</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SESION</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/user/">USUARIOS</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/usuario/logout.php">CERRAR SESIÓN</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>