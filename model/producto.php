<?php
include_once("modeloBase.php");
class Producto extends ModeloBase {
  
    public $Nombre;
    public $idTipoProducto;
    public $idCategoriaProducto;
    public $idEstadoProducto;
    public $Precio;
    public $Imagen;
    public $Descripcion;
    public $Stock;	
}
