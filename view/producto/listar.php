<?php
  include_once("model/producto.php");
  $p= new Producto();
  $productos=$p->listar();

?>
<div class="container">
	<h4>Lista de Productos</h4>
	<a href="index.php?pag=3" class="btn btn-primary btn-sm mb-2">Nuevo</a>
<table class="table table-striped">
  <tr>	
	<th>ID</th>
	<th>Nombre</th>
	<th>Descripcion</th>
	<th>Tipo</th>
	<th>Categoria</th>
	<th>Precio</th>
	<th>Stock</th>
	<th>Imagen</th>
    <th>Estado</th>
  </tr>  
 <?php
   foreach ($productos as $p) {
	 echo '<tr>';	
		echo '<td><a href="index.php?pag=4&id='.$p["idProducto"].'">'. $p["idProducto"] . '</a></td>';
		echo '<td>' . $p["Nombre"] . '</td>';
		echo '<td>' . $p["Descripcion"] . '</td>';
		echo '<td>' . getValorParametro($p["idTipoProducto"]) .'</td>';
		echo '<td>' . getValorParametro($p["idCategoriaProducto"]) .'</td>';
		echo '<td>' . $p["Precio"] . '</td>';
		echo '<td>' . $p["Stock"] . '</td>';
		echo '<td>' . $p["Imagen"] . '</td>';
	    echo '<td>' . getValorParametro($p["idEstadoProducto"]) . '</td>';
    echo '</tr>';
   }

 echo "</table>";
 echo "</div>";
  ?>