<?php

$view = $_GET['view'];
session_start();




if(isset($_POST["btnasignar"]) or isset($_POST["btnActualizar"])   or $view == "asignarordenonlinegg")

{
   
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