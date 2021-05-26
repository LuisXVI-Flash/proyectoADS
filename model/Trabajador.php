<?php 

    require_once __DIR__."/Conexion.php";


    class Trabajador{

        public function obtenerTrabajadores(){
            $c = new Conexion();
            $stm = $c->query("SELECT *,cr.nombre as nombre_cargo FROM trabajador tr , cargo cr WHERE tr.idcargo = cr.idcargo");
            while ( $row = mysqli_fetch_array($stm) ){
                $r[] = $row;
            }
            return $r;
        }
        public function buscarTrabajador($idtrabajador){
            $c = new Conexion();
            $stm = $c->query("SELECT * FROM trabajador WHERE idtrabajador = $idtrabajador ");
            while ( $row = mysqli_fetch_array($stm) ){
                $r[] = $row;
            }
            return ["rowCount"=>1,"trabajador"=>$r];
        }

    
    }

?>