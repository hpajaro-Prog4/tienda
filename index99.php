<?php
//backend
include_once("servicios.php");
$queryResult = $db->query("SELECT * FROM personas");
?>
<!DOCTYPE html>
<!-- FrontEnd -->
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tienda Love Shopping</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body class="contenedor">

<table class="table table-bordered">
<tr>
  <th> Nombres </th>
  <th> Apellidos </th>
  <th> Correo </th>
   <th> Direccion </th>
   <th> Tipo Persona</th>
 </tr>

 <?php
 while($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['nombres'] . '</td>';
            echo '<td>' . $row['apellidos'] . '</td>';
            echo '<td>' . $row['correo'] . '</td>';
            echo '<td>' . $row['direccion'] . '</td>';  
            echo '<td>' . getValorParametro($row["idTipoPersona"],$db). '</td>';        
            echo '</tr>';
        }

?>
</table>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>