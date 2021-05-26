<?php
//$view = $_GET['view'];
if(isset($_POST["btnInforme"])){
    session_start();
    include_once("formListaInforme.php");
    $objForm = new formListaInforme;
    $objForm -> formListaInformeShow();
}else{
    if (isset($_POST["btnBuscar"])) {
        session_start();
    include_once("formListaInforme.php");
    $objForm = new formListaInforme;
    $objForm -> formListaInformeShow();
    include_once("controlVerificarInforme.php");
	$accesoPrincipal = new controlVerificarInforme;
	$accesoPrincipal -> validarBotonVerificarInforme();
    }
    else{
        include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
    }
    
}
?>