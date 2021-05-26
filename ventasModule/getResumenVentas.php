<?php


if(isset($_POST['btnResumen'])){
    session_start();
    include_once("formResumenVentas.php");
    $objForm = new formResumenVentas;
    $objForm -> formResumenVentasShow();
}else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}
    
?>