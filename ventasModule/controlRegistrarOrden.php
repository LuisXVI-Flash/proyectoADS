<?php
if (isset($_POST["guardarOrden"])) {
    session_start();
    $vendedor = 1; // luis tienes que cambiar esto
    $trabajador     = (isset($_POST['trabajador'])) ? $_POST['trabajador'] : '';
    $fecha      = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
    $diavisita   = (isset($_POST['diavisita'])) ? $_POST['diavisita'] : '';
    $cuota          = (isset($_POST['cuota'])) ? $_POST['cuota'] : '';
    $cantidadcuota    = (isset($_POST['cantidadcuota'])) ? $_POST['cantidadcuota'] : '';
    $montoTotal = (isset($_POST['total'])) ? $_POST['total'] : '';
    $estado = 1;
    $tipoorden = (isset($_POST['tipoOrden'])) ? "contado" : "credito";

    require_once __DIR__."/../Model/Orden.php";
    require_once __DIR__."/../Model/Cliente.php";
    require_once __DIR__."/../Model/DetalleOrden.php";
    $objCliente = new Cliente();
    $rowCount = $objCliente->buscarCliente($_SESSION["cliente"]["dni"])["rowCount"];
    if(!$rowCount){

        $objCliente->insertarClienteCredito(
            ["dni"=>(int)$_SESSION["cliente"]["dni"],
            "nombre"=>$_SESSION["cliente"]["nombre"],
            "apellido"=>$_SESSION["cliente"]["apellido"],
            "email"=>$_SESSION["cliente"]["email"],
            "direccion"=>$_SESSION["cliente"]["direccion"],
            "referenciavivienda"=>$_SESSION["cliente"]["referenciavivienda"],
            "celular"=>(int)$_SESSION["cliente"]["celular"],
            "tipo_cliente"=>$_SESSION["cliente"]["tipo_cliente"]]);

    }
    $idcliente = $objCliente->buscarCliente($_SESSION["cliente"]["dni"])["cliente"]["idcliente"];
    $objOrden = new Orden();
    $r = $objOrden->insertarOrdenCredito(
        [
            "vendedor"=>(int)$vendedor,
            "cobrador"=>(int)$trabajador,
            "fechaventa"=>$fecha,
            "diavisita"=>$diavisita,
            "pagosemanal"=>(int)$cuota,
            "cantidadcuotas"=>(int)$cantidadcuota,
            "montototal"=>(int)$montoTotal,
            "estado"=>$estado,
            "tipoorden"=>$tipoorden,
            "idcliente"=>(int)$idcliente
        ]
    );

    
    $idMax =$objOrden->obtenerIdmax();
    //echo "./ " .$idMax[0]["idorden"];
    
    $objDetalleOrden = new DetalleOrden;
    var_dump($_SESSION['productos_seleccionados']);
    $objDetalleOrden->insertarDetallesOrden($idMax[0]["idorden"], $_SESSION['productos_seleccionados']);


    //session_destroy();
    include_once("../shared/vistaprueba.php");
    $objvista=new vistaprueba;
    $vista=$objvista->vistapruebashow();
    // luego de insertar la orden deverá redireccionar al siguiente caso de uso
} else {
    require_once __DIR__ . "/formRegistroOrden.php";
    require_once __DIR__ . "/../Model/Trabajador.php";

    $tipoOrden = $_GET['tipoOrden'];
    $vistaOrden = new formRegistroOrden();
    $objTrabajador = new Trabajador();
    $trabajadores = $objTrabajador->obtenerTrabajadores();
    $vistaOrden->formRegistroOrdenShow($trabajadores,$tipoOrden);
}
?>