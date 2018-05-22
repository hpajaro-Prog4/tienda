<?php 
include_once("../../model/producto.php");
  $p=new Producto();
  $id=$_GET['id'];
  $p->delete($id);
  header("location:../../index.php?pag=2");