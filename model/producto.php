<?php
include_once("modeloBase.php");
class Producto extends ModeloBase {
  
    public $Nombre;
    public $idTipoProducto;
    public $idCategoriaProducto;
    public $idEstadoProducto;
    public $Precio;
    public $imagen;
    public $Descripcion;
    public $stock;	
}
