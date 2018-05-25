<?php 
    session_start(); 
    require_once("servicios.php"); 
    $rutas = array("view/producto/index", "view/carrito/mostrar","view/producto/listar",
                    "view/producto/create","view/producto/update","view/login/index");
    if(isset($_GET['pag'])){                  
       $pag =$_GET['pag'];       
    }else{           
        $pag = 0;           
    } 
  
    if (isset($_SESSION["ncar"])){
          $ncar= $_SESSION["ncar"];
    }else{ 
      	$ncar=0;
    }

    if (isset($_SESSION["usuario"])){
    	$usuario=$_SESSION["usuario"];
    }else{ 
      $usuario="";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comprando.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2 logo pl-1">
              Comprando.co           
  			</div>
	  		<div class="col-md-10">
				<nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid ">  
	  			<div class="collapse navbar-collapse" id="navbarSupportedContent ">
				   <ul class="navbar-nav">      
				      <li class="nav-item">
				          <a class="nav-link ml-0" href="index.php"><i class="fa fa-home"></i> Inicio</a>
				      </li>
				       
				      <li class="nav-item">
				        <a class="nav-link ml-1 pl-0" href="index.php?pag=1"><i class="fa fa-shopping-cart"></i> Ver Carrito (<?php echo $ncar;?>)</a>
				      </li>
				      <li class="nav-item ml-3">
				         <a href="index.php" class="nav-link">Productos</a>
				     </li>
				      <li class="nav-item ml-3">
				         <a href="#" class="nav-link">Registrese</a>
				     </li>
				        <li class="nav-item ml-3">
				         <a href="index.php?pag=5" class="nav-link">Login</a>
				     </li>
				    </ul>
				 <?php  

				   if (isset($_SESSION["idRol"])){   // if 1
				     if ($_SESSION["idRol"] == 26){   // if 2 implementando autorizacion

                  ?>
			      <div class="nav-item dropdown ml-esp">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <i class="fa fa-building"></i> Admin
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="index.php?pag=2">Productos</a>
			          <a class="dropdown-item" href="#">Clientes</a>
			           <a class="dropdown-item" href="#">Facturas</a>    
			           <a class="dropdown-item" href="#">Usuarios </a>
			           <a class="dropdown-item" href="#">Parametros </a>
			         </div>
			      </li>
				  </div>
             <?php  }} ?>

              	  <div class="nav-item dropdown ml-esp" <?php echo ($usuario =='')?"style='display:none;'" :""; ?>>
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <i class="fa fa-user"></i> <?php echo $usuario; ?>
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#"><i class="fa fa-cogs fa-fw"></i> Ver Perfil</a>
				          <a class="dropdown-item" href="#"><i class="fa fa-lock fa-fw"></i> Cambiar Password</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="controller/login/cerrarSesion.php"><i class="fa fa-sign-out-alt fa-fw"></i> Salir</a>
				        </div>
				      </li>

					  	</div>
					</nav>
			
				</div>          

		</div>

		<div class="row">
			<div class="col">
				<?php include_once($rutas[$pag] . ".php");?>
			</div>
		</div>
	</div>
	</div><!-- cierra el container del header  -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/aplic.js"></script>
</body>
</html>