<?php 
include_once("servicios.php");
include_once("model/producto.php");
//print_r(getParametros(5));
  $p=new Producto();
  $params=[];
   $p->create($params);
  
 ?>