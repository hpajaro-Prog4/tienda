<?php 
   $tipos=getParametros(1);
   $categorias=getParametros(2);
   $estados=getParametros(3);
?>
<div class="container">
	<h4>Nuevo Producto</h4>
	<hr>
 <form action="controller/producto/crear.php" method="post" class="mt-3">     
		  <div class="form-group row">
		    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="nombre" name="nombre" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="descripcion" name="Descripcion">
		    </div>
		  </div>
		<div class="form-group row">
			<label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
			 <div class="col-sm-4">
		     <select class="form-control" id="tipo" name="tipo" >
		       echo "<option selected>Elija Tipo</option>
		       <?php 
		        foreach ($tipos as $t){
			       echo "<option value=".$t['idValorParametro'].">".$t['valor']."</option>";	    
		        }
			   ?>
  			</select>
  	       </div>
        </div>
        <div class="form-group row">
			<label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
			 <div class="col-sm-4">
		     <select class="form-control" id="categoria" name="categoria" >
		       echo "<option selected>Elija Categoría</option>
		       <?php 
		        foreach ($categorias as $c){
			       echo "<option value=".$c['idValorParametro'].">".$c['valor']."</option>";	    
		        }
			   ?>
  			</select>
  	       </div>
        </div>
         <div class="form-group row">
		    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
		    <div class="col-sm-4">
		      <input type="number" class="form-control" name="precio" id="precio" step=0.1 >
		    </div>
		  </div>
	     <div class="form-group row">
	    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
	    <div class="col-sm-4">
	      <input type="number" class="form-control" name="stock" id="stock"  >
	    </div>
	  </div>
	  <div class="form-group row">
		    <label for="imagen" class="col-sm-2 col-form-label">Imágen</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="imagen" name="imagen" >
		    </div>
		  </div>
	 	 <div class="form-group row ml-1">
	 	 	<button type="submit" class="btn btn-success btn-sm">Guardar</button>
	 	 	<a href="index.php?pag=2" class="btn btn-info btn-sm ml-2">Regresar</a>
	 	 </div> 
 </form>
 </div>

