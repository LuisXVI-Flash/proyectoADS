<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php 
require_once __DIR__."/formregistrarcliente.php";
/*if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["op"])){
        switch($_GET["op"]){
            case "contado":
                // TODO le toca a otra persona
                break;
            case "siguiente01":*/
            $view1=$_GET["view1"];
              if(isset($_POST["siguiente01"]) or $view1 == "siguiente01"){
                $vistaReistrarCliente = new formRegistrarCliente();
                $vistaReistrarCliente->formRegistrarClienteShow();}
          /*      break;
        }
        return;
    }
}*/else{
    if(isset($_POST["buscar"])){
        $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
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
    if(isset($_POST["grabar"])){
        $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
        if($dni!=""){
            require_once __DIR__."/../Model/Cliente.php";
            $objCliente = new Cliente();
            $respuesta = $objCliente->buscarCliente($dni);
            if(!$respuesta["rowCount"]){
                // cliente no encontrado y graba
                $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
                $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
                $email = isset($_POST["email"]) ? $_POST["email"] : "";
                $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
                $celular = isset($_POST["celular"]) ? $_POST["celular"] : "";
                $tipo_cliente = $_POST['grabar'];
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
                // $_SESSION["cliente"]=[
                //     "dni"=>(int)$dni,
                //     "nombre"=>$nombre,
                //     "apellido"=>$apellido,
                //     "email"=>$email,
                //     "direccion"=>$direccion,
                //     "referenciavivienda"=>"referencia vivienda",
                //     "celular"=>(int)$celular,
                //     "tipo_cliente"=>$tipo_cliente];
            }
          /*  if(isset($_POST["credito"])) {
                header("Location: controlRegistrarOrden.php?tipoOrden=credito");
            } else {
                header("Location: controlRegistrarOrden.php?tipoOrden=contado");
            }*/

            header("Location: controlRegistrarOrden.php?tipoOrden=".$_POST["grabar"]);  

            return;
        }else{
            $vistaReistrarCliente = new formRegistrarCliente();
            $vistaReistrarCliente->formRegistrarClienteShow($dni,null,"Ingrese el DNI");
            return;
        }
    }else if(isset($_POST["credito"]) || isset($_POST["contado"])){
        $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";
        require_once __DIR__."/../Model/Cliente.php";
        $objCliente = new Cliente();
        $cliente = $objCliente->buscarCliente($dni)["cliente"];
        $_SESSION["cliente"]=$cliente;
        
        if(isset($_POST["credito"])) {
            header("Location: controlRegistrarOrden.php?tipoOrden=credito");
        } else {
            header("Location: controlRegistrarOrden.php?tipoOrden=contado");
        }
        return;
    }
}

?>