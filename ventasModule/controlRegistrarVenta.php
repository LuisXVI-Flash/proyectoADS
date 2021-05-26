<?php 
require_once __DIR__."/formRegistarVenta.php";
require_once __DIR__."/../Model/Producto.php";
require_once __DIR__."/formregistrarcliente.php";

class controlRegistrarVenta {

    public function listarProductos() {

        include_once("../ventasModule/formRegistarVenta.php");
        $objProducto = new Producto();
        $productos = $objProducto->obtenerProductos();
        $formRegistrarVenta = new formRegistrarVenta();
        $formRegistrarVenta->formRegistrarVentaShow($productos);
    }

    public function agregarProducto($idProducto,$nombreProducto,$cantidadProducto,$precioProducto) {

        $productos = array("idProducto" => $idProducto , "nombre" => $nombreProducto, "cantidad" => $cantidadProducto, "precio"=> $precioProducto);
        $objProducto = new Producto();
        $productos = $objProducto->obtenerProductos();
        $fila = $objProducto->consultarStock($idProducto, $cantidadProducto);
        $formRegistrarVenta = new formRegistrarVenta();
        $formRegistrarVenta->formRegistrarVentaShow($productos,$fila);
    }

    public function eliminarProducto($filaProducto) {

        array_splice($_SESSION['productos_seleccionados'], $filaProducto-1,1);
        $this->listarProductos();
    }

    public function cancelar() {
        unset($_SESSION["productos_seleccionados"]);
        $this->listarProductos();
    }

    public function buscarPorDNI($dni) {

        if($dni!=""){
            require_once __DIR__."/../Model/Cliente.php";
            $objCliente = new Cliente();
            $respuesta = $objCliente->buscarCliente($dni);
            $vistaReistrarCliente = new formRegistrarCliente();
            if(isset($respuesta["rowCount"])){
                $cliente = $respuesta["cliente"];
                $vistaReistrarCliente->formRegistrarClienteShow($dni,$cliente);
                $_SESSION["cliente"]=$cliente;
            }else{
                $vistaReistrarCliente->formRegistrarClienteShow($dni,null,"el DNI : $dni no fue encontrado");
            }
        }
    }

    public function grabarCliente($dni,$nombre,$apellido,$email,$direccion,$celular,$tipo_cliente) {
        
        if($dni!=""){
            require_once __DIR__."/../Model/Cliente.php";
            $objCliente = new Cliente();
            $respuesta = $objCliente->buscarCliente($dni);
            if(!$respuesta["rowCount"]){
                
                $cliente = [
                    "dni" => $dni,
                    "nombre"=>$nombre,
                    "apellido"=>$apellido,
                    "email"=>$email,
                    "direccion"=>$direccion,
                    "referenciavivienda"=>"referencia vivienda",
                    "celular"=>(int)$celular,
                    "tipo_cliente"=>$tipo_cliente];

                if($nombre=="" or $apellido=="" or $email=="" or $direccion=="" or $celular==""){
                    $vistaReistrarCliente = new formRegistrarCliente();
                    $vistaReistrarCliente->formRegistrarClienteShow($dni,null,"Complete todos los campos para continuar");
                    return;
                } else {
                    $objCliente->insertarCliente($cliente);

                    $respuesta = $objCliente->buscarCliente($dni);
                    $cliente = $respuesta["cliente"];
                    $_SESSION["cliente"]=$cliente;
                }
            }
            require_once __DIR__ . "/formRegistroOrden.php";
            require_once __DIR__ . "/../Model/Trabajador.php";

            $vistaOrden = new formRegistroOrden();
            $objTrabajador = new Trabajador();
            $trabajadores = $objTrabajador->obtenerTrabajadores();
            $vistaOrden->formRegistroOrdenShow($trabajadores,$tipo_cliente);
        } else{
            $vistaReistrarCliente = new formRegistrarCliente();
            $vistaReistrarCliente->formRegistrarClienteShow($dni,null,"Ingrese el DNI");
            
        }
    }

    public function creditoOContado($dni,$tipoOrden) {
        require_once __DIR__."/../Model/Cliente.php";
        $objCliente = new Cliente();
        $cliente = $objCliente->buscarCliente($dni)["cliente"];
        $_SESSION["cliente"]=$cliente;
        

        require_once __DIR__ . "/formRegistroOrden.php";
        require_once __DIR__ . "/../Model/Trabajador.php";
        $vistaOrden = new formRegistroOrden();
        $objTrabajador = new Trabajador();
        $trabajadores = $objTrabajador->obtenerTrabajadores();
        $vistaOrden->formRegistroOrdenShow($trabajadores,$tipoOrden);
    }

    public function guardarOrden($vendedor,$trabajador,$fecha,$diavisita,$cuota,$cantidadcuota,$montoTotal,$estado,$tipoorden) {
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
        $objDetalleOrden->insertarDetallesOrden($idMax[0]["idorden"], $_SESSION['productos_seleccionados']);


        //session_destroy();
        include_once("../shared/vistaprueba.php");
        $objvista=new vistaprueba;
        $vista=$objvista->vistapruebashow();
        // luego de insertar la orden deverá redireccionar al siguiente caso de uso
    }
}