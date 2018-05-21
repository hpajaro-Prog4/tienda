<div class="contenedor">
<?php
   global $db;
   $filas = $db->query("SELECT * FROM productos");
   while($reg = $filas->fetch(PDO::FETCH_ASSOC)) {
?>
		<div class="card p-1 ancho m-3">
		  <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
		  <div class="text-center"> <img src="imagenes/<?php echo $reg["Imagen"] ?>"></div>		 
		  <div class="card-body p-1">
		    <h6 class="card-title"><?php echo $reg["Nombre"] ?></h6>
		    <p class="card-text t2"><?php echo $reg["Descripcion"] ?></p>
		  </div>
		  <ul class="list-group list-group-flush p-1">
		    <li class="list-group-item"><span class="font-weight-bold text-primary">PRECIO:</span><?php echo $reg["Precio"] ?></li>
		    <li class="list-group-item">
		       <p class="card-text t2 m-0 p-0">Stock :<?php echo $reg["Stock"] ?>
               <p class="card-text t2 m-0 p-0">Tipo :<?php echo getValorParametro($reg["idTipoProducto"]) ?></p>
		       <p class="card-text t2 m-0 p-0">Categoría :<?php echo getValorParametro($reg["idCategoriaProducto"]) ?></p>
		   </li>

		  </ul>
		  <div class="card-body p-1 text-center">
		  	<form action="controller/agregarCarrito.php" method="POST">
		  		Cant : <input type="number" name="cant" value="1" Style="height:28px;width:40px;">
		  		<input type="hidden" name="id" value="<?php echo $reg['idProducto'];?>">
		  		<input type="hidden" name="nombre" value="<?php echo $reg['Nombre'];?>">
		  		<input type="hidden" name="precio" value=<?php echo $reg['Precio'];?>">			 
		        <button type="submit" class="btn btn-primary btn-sm">
				  <i class="fa fa-plus"></i> Carrito
		 	    </button>	
		    </form>
		  </div>
		</div>

	<?php 

	}
?>
</div>
