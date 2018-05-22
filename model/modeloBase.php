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
         $stm = $db->prepare($sql);
        $stm->execute();
        $reg=$stm->fetchAll(PDO::FETCH_ASSOC);
  		return $reg[0];
   }

  public function delete($id){
      global $db;
      $tabla = $this->plural(get_class($this));
       $llave="id" . get_class($this);
      $ref=new ReflectionClass($this);
      $campos=$ref->getProperties();
      $sql="DELETE FROM $tabla WHERE  $llave = $id";
      $stm = $db->prepare($sql);
      $stm->execute();
  }
  public function create($params){
      global $db;
      $tabla = $this->plural(get_class($this));
      
      $ref=new ReflectionClass($this);
      $campos=$ref->getProperties();
      
      $ncampos=count($campos);
      $scampos=$this->campos_input($campos);
      $values=" values(". str_repeat("?,",$ncampos);
      $values=substr_replace($values,")",-1);
      
      $xparams=$this->params($campos,$params);
      $sql="INSERT INTO $tabla ". $scampos. $values ;
      // print_r($sql."<br>");
      // print_r($xparams);
      $stm = $db->prepare($sql);
      $stm->execute($xparams);       
  }

   public function update($params,$id){
      global $db;
      $tabla = $this->plural(get_class($this));
      $llave="id" . get_class($this);

      $ref=new ReflectionClass($this);
      $campos=$ref->getProperties();
      
      $scampos=$this->campos_update($campos,$params);
         
      $xparams=$this->params($campos,$params);
      $sql="UPDATE $tabla SET ". $scampos. " WHERE $llave = $id";
      //print_r($sql);
      //print_r($xparams);
      $stm = $db->prepare($sql);
      $stm->execute($xparams);       
  }

  private function campos_input($campos){
    
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
       array_push($res,$params[$c->name]);
       print_r($c->name.",");
      }
      return $res;
  }
  private function campos_update($campos){
    $res="";
    foreach($campos as $c){
      $res = $res.$c->name." = ?, ";    
     }
      return substr_replace($res," ",-2);
  }
  
}