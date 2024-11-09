<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Mi tienda System</title> 
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="shortcut icon" href="../img/logotipo.png" type="image/x-icon" >

    <!-- Bootstrap core CSS -->
   
    <link href="<?php echo constant('URL') ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo constant('URL') ?>public/css/panel.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo constant('URL') ?>public/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
        
    <header class="navbar sticky-top flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 " href="#"><img src="<?php echo constant('URL') ?>public/img/logoLogin.png" class="animate__animated animate__bounceInLeft" alt="Mi Tienda System" width="150px" height="40px"></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars fa-lg" style="color: #1864fb;"></i>
      </button>
      <div class="d-flex justify-content-between align-items-center w-100">
        <h6> <span style="color: #15181E;">-</span> <a href="#" class="linkPerfil hover-text"><i class="fa-regular fa-circle-user fa-lg"></i> <?php echo $_SESSION['nombre1'] . " " . $_SESSION['apellido1']?></a></h6>
        <h6 class="hoverColor"><a class="nav-link px-3 hover-text" href="<?php echo constant('URL').'Login/logOut' ?>">Cerrar Sesión</a></h6>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row" >
        <nav id="sidebarMenu" class="color col-md-3 col-lg-2 d-md-block sidebar collapse " >
          <div class="position-sticky pt-3" >
            <ul class="nav flex-column">
              <?php
              if($_SESSION['rol'] == "Administrador"){ 
              ?>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1] == 'Dashboard') ? 'active' : 'text-white'; ?>" aria-current="page" href="<?php echo constant('URL') ?>Dashboard/Show">
                  <i class="fa-solid fa-house"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1] == 'Pedidos') ? 'active' : 'text-white'; ?>" href="<?php echo constant('URL')?>Main/pedidos">
                  <i class="fa-solid fa-file"></i>
                  Pedidos
                  <span class="position-relative" style="margin-left: 11px;">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      100
                      <span class="visually-hidden">unread messages</span>
                    </span>
                  </span>
                </a>
              </li>
              <?php
              }
              ?>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1] == 'Producto') ? 'active' : 'text-white'; ?>" href="<?php echo constant('URL')?>Producto/Show">
                  <i class="fa-solid fa-cart-shopping"></i>
                  Productos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1] == 'Categoria') ? 'active' : 'text-white'; ?>" href="<?php echo constant('URL')?>Categoria/Show">
                  <i class="fa-solid fa-layer-group"></i>
                  Categorias
                </a>
              </li>
              <?php
              if($_SESSION['rol'] == "Administrador"){ 
              ?>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1] == 'Empleado' && explode('/', trim($_SERVER['REQUEST_URI'], '/'))[2] == 'Show') ? 'active' : 'text-white'; ?>" href="<?php echo constant('URL')?>Empleado/Show">
                  <i class="fa-solid fa-user-group"></i>
                  Empleados
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1] == 'Reportes') ? 'active' : 'text-white'; ?>" href="<?php echo constant('URL')?>Main/reportes">
                  <i class="fa-solid fa-chart-line"></i>
                  Reportes
                </a>
              </li>
              <?php
              }
              ?>
              <li class="nav-item">
                <a class="nav-link hover-text <?php echo (explode('/', trim($_SERVER['REQUEST_URI'], '/'))[2] == 'ChangePassword') ? 'active' : 'text-white'; ?>" href="<?php echo constant('URL')?>Empleado/ChangePassword">
                  <i class="fa-regular fa-circle-user fa-lg"></i>
                  Cambiar Contraseña
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
