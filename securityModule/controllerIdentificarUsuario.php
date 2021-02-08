<?php
    //controllerIdentificarUsuario
    
    class controllerIdentificarUsuario{
        public function verificarUsuario($login,$password){
            
            include_once("../model/entityTrabajador.php");
            $objUser = new entityTrabajador;
            $respuesta = $objUser -> validarUsuario($login,$password);
            
            if($respuesta==0){
                include_once("../shared/formMensajeSistema.php");
                $objMensaje = new formMensajeSistema;
                $objMensaje -> formMensajeSistemaShow("No existe usuario con esos datos o esta deshabilitado","../index.php");
            }else{
                include_once("../model/entityCargo.php");
                $objDetalle = new entityCargo;
                $resultado = $objDetalle -> obtenerPrivilegios($login);
                if($resultado == 1){
                    
                    include_once("formBienvenida.php");
                    $objBienvenida = new formBienvenida;
                    $objBienvenida -> formBienvenidaShow();
                }else{
                    include_once("../shared/formMensajeSistema.php");
                    $objMensaje = new formMensajeSistema;
                    $objMensaje -> formMensajeSistemaShow("El usuario actual no cuenta con cargo","../index.php"); 
                }
                
            }
        }
    }
?>