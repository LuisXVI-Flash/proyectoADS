<?php
require_once __DIR__."/formRegistarVenta.php";
require_once __DIR__."/../Model/Producto.php";
require_once __DIR__."/formregistrarcliente.php";
require_once __DIR__."/controlRegistrarVenta.php";
$control = new controlRegistrarVenta;
$view1 = "";
if(!isset($_SESSION)) {
    session_start();
}else if(isset($_GET["view1"])) {
    $view1=$_GET["view1"];
}else if(isset($_POST['btnRegistrar'])){
    $control->listarProductos();

} else if(isset($_POST["agregar"])){
    $idProducto = $_POST["idProducto"];
    $nombreProducto = $_POST['nombreProducto'];
    $cantidadProducto = $_POST["cantidadProducto"];
    $precioProducto = $_POST['precio'];

    $control->agregarProducto($idProducto,$nombreProducto,$cantidadProducto,$precioProducto);

} else if(isset($_POST["eliminar"])) {

    $filaProducto = $_POST['filaProducto'];
    $control->eliminarProducto($filaProducto);
    
} else if(isset($_POST["cancelar"])){

    $control->cancelar();
    
} else if(isset($_POST['siguiente01']) /*or $view1 == "siguiente01"*/){
    
    $vistaReistrarCliente = new formRegistrarCliente();
    $vistaReistrarCliente->formRegistrarClienteShow();

} else if(isset($_POST["buscar"])){
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    $control->buscarPorDNI($dni);
}
else if(isset($_POST["grabar"])){
    // cliente no encontrado y graba
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $celular = isset($_POST["celular"]) ? $_POST["celular"] : "";
    $tipo_cliente = $_POST['grabar'];

    $control->grabarCliente($dni,$nombre,$apellido,$email,$direccion,$celular,$tipo_cliente);

} else if(isset($_POST["credito"]) || isset($_POST["contado"])){
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
    if(isset($_POST["credito"])) {
        $tipoOrden = "credito";
    } else {
        $tipoOrden = "contado";
    }

    $control->creditoOContado($dni,$tipoOrden);
} else if (isset($_POST["guardarOrden"])) {
    $vendedor = 1; // luis tienes que cambiar esto
    $trabajador     = (isset($_POST['trabajador'])) ? $_POST['trabajador'] : '';
    $fecha      = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
    $diavisita   = (isset($_POST['diavisita'])) ? $_POST['diavisita'] : '';
    $cuota          = (isset($_POST['cuota'])) ? $_POST['cuota'] : '';
    $cantidadcuota    = (isset($_POST['cantidadcuota'])) ? $_POST['cantidadcuota'] : '';
    $montoTotal = (isset($_POST['total'])) ? $_POST['total'] : '';
    $estado = 1;
    $tipoorden = (isset($_POST['tipoOrden'])) ? "contado" : "credito";

    $control->guardarOrden($vendedor,$trabajador,$fecha,$diavisita,$cuota,$cantidadcuota,$montoTotal,$estado,$tipoorden);
} else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizadoxdxdxdxd","../index.php");
}
