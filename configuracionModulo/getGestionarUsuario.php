<?php






if(isset($_POST["btngestionarr"]) or isset($_POST["verificar_usuario"] ) or isset($_POST["guardar_usuario"]) or isset($_POST["contrasenia_usuario"]) )

{
   
    
    include_once("../configuracionModulo/formGestionar.php");
}
else{
    include_once("../shared/formMensajeSistema.php");
	(new formMensajeSistema())->accesso_denegado();
	require_once __DIR__."/../model/entityTrabajador.php";

}

    
?>