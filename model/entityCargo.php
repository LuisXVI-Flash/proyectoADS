<?php
    include_once("conexion.php");
    class entityCargo extends conexion{
        public function ECargo(){
            $this -> conectar();
        }
        public function obtenerPrivilegios($login){
            $conexion = Conexion::obtenerConexion();
            $consulta = "SELECT C.idcargo, C.nombre,T.nombre FROM cargo C, trabajador T 
                         WHERE C.idcargo = T.idcargo and T.usuario = '$login'";
            $resultado = mysqli_query($conexion,$consulta);
            $datos = array();
            if($row = mysqli_fetch_array($resultado)){
                $_SESSION['idcargo']=$row[0];
                $_SESSION['nombreCargo']=$row[1];
                $_SESSION['trabajador']=$row[2];
                return 1;
            }else{
                return 0;
            }


        }
    }
?>