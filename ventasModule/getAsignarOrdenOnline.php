<?php

$view = $_GET['view'];

if($view == "asignarordenonline")
{   
   
    session_start();
    include_once("formAsignarOrdenOnline.php");
    $objForm = new formAsignarOrdenOnline;
    $objForm -> formAsignarOrdenOnlineShow();
}
else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}
    
?>