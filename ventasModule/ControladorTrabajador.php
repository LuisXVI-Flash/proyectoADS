<?php 

require_once __DIR__."/../Model/Trabajador.php";

class ControladorTrabajador{

    private $trabajador = null;

    public function __construct()
    {
        $this->trabajador = new Trabajador();
    }

    public function obtenerTrabajadores()
    {
        return $this->trabajador->obtenerTrabajadores();
    }


    public function buscarTrabajador($idtrabajador)
    {
        return $this->trabajador->buscarTrabajador($idtrabajador);
    }

}








?>