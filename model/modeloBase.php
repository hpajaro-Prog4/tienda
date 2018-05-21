<?php
$ruta_abs= $_SERVER['DOCUMENT_ROOT'] ."/tienda/";
include_once($ruta_abs."servicios.php");
abstract class ModeloBase{
	  
   public function listar(){
        global $db;
      	$tabla = $this->plural(get_class($this));
      	//echo "tabla=".$tabla ."<br/>";
      	$sql="SELECT * FROM " . $tabla;
      //	echo "Sql=".$sql. "<br/>";
		$stm = $db->prepare($sql);
		$stm->execute();
  		return $stm->fetchAll(PDO::FETCH_ASSOC);
   }

  private function plural($tira){
      $tira=strtolower($tira);
      $vocales=["a","e","o"];
	  $car=substr($tira,-1);
	  if (in_array($car,$vocales)){
	    return $tira . "s";
	  }else{
	    return $tira . "es";
	  }

   }

   public function  find($id){
   	    global $db;
        $tabla = $this->plural(get_class($this));
        $llave="id" . get_class($this); 
      	$sql="SELECT * FROM " . $tabla . " WHERE " . $llave . " = " . $id ;
      	echo $sql;
        $stm = $db->prepare($sql);
        $stm->execute();
  		return $stm->fetchAll(PDO::FETCH_ASSOC);
   }

  public function create($params){
      global $db;
      $tabla = $this->plural(get_class($this));
      
      $ref=new ReflectionClass($this);
      $campos=$ref->getProperties();
      
      $ncampos=count($campos);
      $scampos=$this->campos($campos);
      $values=" values(". str_repeat("?,",$ncampos);
      $values=substr_replace($values,")",-1);
      
      $xparams=$this->params($campos,$params);
      $sql="INSERT INTO $tabla ". $scampos. $values ;
      print_r($sql);
      print_r($xparams);
      //$stm = $db->prepare($sql);
      //$stm->execute($params);       
  }

  private function campos($campos){
    
    $res="(";
    $val="values(";
    foreach($campos as $c){
      $res=$res.$c->name.",";
    
     }
    return substr_replace($res,")",-1);
  }

  private function params($campos,$params){
      $res=[];
      foreach ($campos as $c){
      $res[$c]=$params[$c];
      }
     return $res;
  }

}