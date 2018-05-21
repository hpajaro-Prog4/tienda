<?php
session_start();
include_once("../model/carrito.php");
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$cant = $_POST['cant'];
	$precio = $_POST['precio'];
	$car = new Carrito($id,$nombre,$cant,$precio);
    $car=serialize($car);   
	if (isset($_SESSION['carrito'])){
	   $carrito = $_SESSION['carrito'];		 
	}else{
	      $carrito=array();	      
	}
	array_push($carrito, $car);
	$_SESSION['ncar']=count($carrito);
	$_SESSION['carrito']=$carrito;
		
    header("location:http://localhost/tienda");
