<?php 
session_start();
include_once("../../servicios.php");
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);
$sql="SELECT * FROM  usuarios  WHERE usuario='" . $usuario."' AND password='" . $password ."'"; 
//echo $sql; 
$stm = $db->prepare($sql);
$stm->execute();
$reg=$stm->fetchAll(PDO::FETCH_ASSOC);

if (count($reg)){
    $_SESSION['usuario']=$usuario;
    $_SESSION['idRol'] = $reg['idRol'];
}
   header("location: ../../index.php");
