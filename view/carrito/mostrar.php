<?php 
//session_start();
include_once("model/carrito.php");
if (isset($_SESSION['carrito'])){
     $carrito = $_SESSION['carrito'];   
?> 
      <table class="table">
	       <tr>
	           <th scope="col">Id</th>
		       <th scope="col">Nombre</th>
		       <th scope="col">Cant</th>
		       <th scope="col">Precio</th>
		       <th scope="col">  </th>
	       </tr>
<?php	      
	        $i=0;
	      foreach  ($carrito as $car) {
              $obj=unserialize($car);
			echo '<tr>';
			       echo '<td>'. $obj->id . '</td>';
			       echo '<td>'. $obj->nombre . '</td>';
			       echo '<td>'. $obj->cant . '</td>';
			       echo '<td>'. $obj->precio . '</td>';
			       echo "<td><a href='controller/eliminarProdCar.php?in=$i'><i class='fa fa-times-circle'></i></a> </td>";
		    echo '</tr>';
		    $i++;
	      }
     echo '</table>';
}else{
    echo "<h4> Carrito está vació </h4>";

}

?>