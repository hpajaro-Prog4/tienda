<?php

class Carrito {
    public $id;
    public $nombre;
    public $precio;
    public $cant;

	public function __construct($id,$nombre,$cant,$precio){
           $this->id=$id;
           $this->nombre=$nombre;
           $this->precio=$precio;
           $this->cant=$cant;
	}
	
}
