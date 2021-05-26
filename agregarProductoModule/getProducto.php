<?php
//getUsuario.php
//session_start();

if(isset($_POST['btnProductos'])){
        include_once("../model/producto.php");
        $producto = new producto;
        $array=$producto->obtenerProductos();
        include_once("../agregarProductoModule/formProducto.php");
        $objForm=new formProducto;
        $objForm->formProductoShow($array);
    
}else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}

?>