<?php 
session_start();
 if(isset($_SESSION["carrito"])){
	 $carrito = $_SESSION["carrito"];
	 $idice=$_GET["in"];
	 
	 unset($carrito[$idice]);
	 $carrito = array_values($carrito);  
     $_SESSION['ncar']=count($carrito); 
     $_SESSION["carrito"]=$carrito;
      //echo "#elementos carrito= ";
    //  echo count($carrito);
     if(count($carrito)== 0){
     	echo "Ok entre por aqui";
     	session_unset();
     }
}
header("location: ../index.php?pag=1");

