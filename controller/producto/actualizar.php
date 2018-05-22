<?php 
include_once("../../model/producto.php");
  $p=new Producto();
  $id=$_GET['id'];
  $params=$_POST;
  $p->update($params,$id);
  header("location:../../index.php?pag=2");
