<?php 
require_once "Conexion.php";

class Orden{

    public function insertarOrdenCredito($orden){
        $c = new Conexion();
        
        $query = "INSERT INTO orden (`vendedor`,`cobrador`,`fechaventa`,`diavisita`,`pagosemanal`,`cantidadcuotas`,`montototal`,`estado`,`tipoorden`,`idcliente`) VALUES($orden[vendedor],$orden[cobrador],'$orden[fechaventa]','$orden[diavisita]',$orden[pagosemanal],$orden[cantidadcuotas],$orden[montototal],'$orden[estado]','$orden[tipoorden]',$orden[idcliente] ) ";
    	$c->query($query);
        
    }

    public function obtenerIdmax(){
        $c = new Conexion();
        $query = "SELECT MAX(idorden) AS idorden FROM orden";
        $maxIdOrden = $c->query($query);
        $resultado = mysqli_fetch_all($maxIdOrden,MYSQLI_ASSOC);
        return $resultado;
    }
}


?>