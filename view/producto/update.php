<?php 
   include_once("model/producto.php");
   $tipos=getParametros(1);
   $categorias=getParametros(2);
   $estados=getParametros(3);
   
   $id=$_GET['id'];

   $p=new Producto();
   $reg=$p->find($id);

 ?>
<div class="container">
	<h4>Actualizar Producto</h4>
	<hr>
 <form action="controller/producto/actualizar.php?id=<?php echo $id; ?>"" method="post" class="mt-3">     
		  <div class="form-group row">
		    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="nombre" name="Nombre" 
		         value="<?php echo $reg['Nombre']; ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="descripcion" name="Descripcion"
		      value="<?php echo $reg['Descripcion']; ?>" >
		    </div>
		  </div>
		<div class="form-group row">
			<label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
			 <div class="col-sm-4">
		     <select class="form-control" id="tipo" name="idTipoProducto" >
		       echo "<option selected>Elija Tipo</option>
		       <?php 
                 
		        foreach ($tipos as $t){
		        	$op=($reg['idTipoProducto'] == $t['idValorParametro']) ? " selected ":"";
			       echo "<option value='".$t['idValorParametro']."'".$op.">".$t['valor']."</option>";	    
		        }
			   ?>
  			</select>
  	       </div>
        </div>
        <div class="form-group row">
			<label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
			 <div class="col-sm-4">
		     <select class="form-control" id="categoria" name="idCategoriaProducto" >
		       echo "<option selected>Elija Categoría</option>
		       <?php 
		        foreach ($categorias as $t){
		           $op=($reg['idCategoriaProducto'] == $t['idValorParametro']) ? " selected ":"";
			       echo "<option value='".$t['idValorParametro']."'".$op.">".$t['valor']."</option>";	    
		        }
			   ?>
  			</select>
  	       </div>
        </div>
         <div class="form-group row">
		    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
		    <div class="col-sm-4">
		      <input type="number" class="form-control" name="Precio" id="Precio" step=0.1 
		          value="<?php echo $reg['Precio']; ?>">
		    </div>
		  </div>
	     <div class="form-group row">
	    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
	    <div class="col-sm-4">
	      <input type="number" class="form-control" name="Stock" id="Stock" 
	          value="<?php echo $reg['Stock']; ?>" >
	    </div>
	  </div>
	  <div class="form-group row">
		    <label for="imagen" class="col-sm-2 col-form-label">Imágen</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="imagen" name="Imagen"
		           value="<?php echo $reg['Imagen']; ?>">
		    </div>
		  </div>
	  <div class="form-group row">
		<label for="estado" class="col-sm-2 col-form-label">Estado</label>
		 <div class="col-sm-4">
	     <select class="form-control" id="idEstadoProducto" name="idEstadoProducto" >
	       echo "<option selected>Elija Estado</option>
	       <?php 
	        foreach ($estados as $t){
	           $op=($reg['idEstadoProducto'] == $t['idValorParametro']) ? " selected ":"";
		       echo "<option value='".$t['idValorParametro']."'".$op.">".$t['valor']."</option>";	    
	        }
		   ?>
			</select>
	       </div>
    </div>
	 	 <div class="form-group row ml-1">
	 	 	<button type="submit" class="btn btn-success btn-sm">Guardar</button>
	 	 	<a href="controller/producto/eliminar.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm ml-2"
	 	 		onclick="return confirm('Esta seguro de eliminar este producto?')">Eliminar</a>
	 	 	<a href="index.php?pag=2" class="btn btn-info btn-sm ml-2">Regresar</a>
	 	 </div> 
 </form>
 </div>

