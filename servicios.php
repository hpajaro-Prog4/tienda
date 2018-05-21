<?php
class Conexion {
  //implementacion del patron singlenton para conexiones a BD
  private static $instancia = null;
  private $conn;  
  private $host = 'localhost';
  private $user = 'root';
  private $pass = 'Algundia1';
  private $db = 'tienda1';
   
  // Constructor privado
  private function __construct()
  {
  	try {
		    $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $e) {
		    echo $e->getMessage();
		}  
  }
  
  public static function getInstancia()
  {
    if(!self::$instancia)    {
      self::$instancia = new Conexion();
    }
   
    return self::$instancia;
  }
  
  public function getConexion() {
    return $this->conn;
  }
}		

$dbi=Conexion::getInstancia();   // dame una instancia conexion
global $db;     // para acceder desde las clases/funciones a la conexión
$db = $dbi->getConexion();

function getValorParametro($id){
  global $db;
 $resp = $db->query("SELECT valor FROM valorParametros WHERE idValorParametro=$id");
 $row = $resp->fetch(PDO::FETCH_ASSOC);
 return $row["valor"];
}

function getParametros($id){
  global $db;
  $resp = $db->query("SELECT idValorParametro,valor FROM valorParametros WHERE idParametro=$id and estadoValorPArametro='A' order by orden");
  return  $resp->fetchAll(PDO::FETCH_ASSOC);  
}
