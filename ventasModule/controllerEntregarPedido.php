<?php

$view = $_GET['view'];
session_start();




if(isset($_POST["btnentregar"])  or $view == "entregarpedidogg") 
{
   
    include_once("formEntregarPedido.php");
    $objForm = new formEntregarPedido;
    $objForm -> formEntregarPedidoShow();
}





else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}

    
?>