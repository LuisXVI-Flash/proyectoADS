<?php 

require_once __DIR__."/../Model/Producto.php";

class ControladorProducto{

    private $producto = null;

    public function __construct()
    {
        $this->producto = new Producto();
    }

    public function obtenerProductos()
    {
        return $this->producto->obtenerProductos();
    }


    public function consultarStock($idproducto,$cantidadMax){
        return $this->producto->consultarStock($idproducto,$cantidadMax);
    }
}








?>