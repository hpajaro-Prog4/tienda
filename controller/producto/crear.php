<?php 
echo  $_SERVER['DOCUMENT_ROOT'];
//include_once("servicios.php");
include_once("../../model/producto.php");
//print_r(getParametros(5));
  $p=new Producto();
  $params=$_POST;
  print_r($params);
  $p->create($params);
