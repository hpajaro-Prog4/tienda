<?php 
include_once("servicios.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comprando.co</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid ">
  <div class="col-lg-3 logo">
              <!-- <%= image_tag("logo.png", :class => "logo") %>  -->
              Comprando.co           
  </div>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent ">
   <ul class="navbar-nav ">      
      <li class="nav-item">
          <a class="nav-link ml-0" href="#"><i class="fa fa-home"></i> Inicio</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link ml-1 pl-0" href="#"><i class="fa fa-shopping-cart"></i> Ver Carrito (00)</a>
      </li>
      <li class="nav-item ml-3">
         <a href="#" class="nav-link">Productos</a>
     </li>
      <li class="nav-item ml-3">
         <a href="#" class="nav-link">Registrese</a>
     </li>
    </ul>
      <div class="nav-item dropdown ml-esp">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-building"></i> Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Productos</a>
          <a class="dropdown-item" href="#">Clientes</a>
           <a class="dropdown-item" href="#">Facturas</a>          
        </div>
      </li>

  </div>
  <div class="nav-item dropdown ml-esp">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> hpajaro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fa fa-cogs fa-fw"></i> Ver Perfil</a>
          <a class="dropdown-item" href="#"><i class="fa fa-lock fa-fw"></i> Cambiar Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out-alt fa-fw"></i> Salir</a>
        </div>
      </li>

  </div>
</nav>
<div class="container">
	
