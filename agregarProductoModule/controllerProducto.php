<?php
    if(isset($_POST['Editar'])){
        $id = $_POST['id'];
        include_once("formEditar.php");
        include_once("../model/Producto.php");
        $objProducto = new producto();
        $producto = $objProducto->obtenerUno($id);
        $formEditar = new formEditar;
        $formEditar->formEditarShow($producto);

    }else if(isset($_POST['Eliminar'])){
        echo "Eliminar";
        $id=$_GET['id'];
        echo " asasasasaa ".$id;
        include_once("../agregarProductoModule/formconfirmacion.php");
        $objConf = new confirmacion;
        $objConf->confirmacionShow($id);

    }else if(isset($_POST['Nuevo'])){
        include_once("formAgregar.php");
        $objAgregar = new formAgregarProducto;
        $objAgregar->formAgregarProductoShow();
    }else if(isset($_POST['Actualizar'])){
        $idp=$_POST['txtid']; 
        $nombre=$_POST['txtnombre']; 
	    $precio=$_POST['txtprecio'];
	    $stock=$_POST['txtstock'];
	    $descripcion=$_POST['txtdescripcion'];
        if(is_numeric($precio)){
            if(is_numeric($stock)){
                if ($nombre!=null||$precio!=null||$stock!=null||$descripcion=null){
                    include_once("../model/Producto.php");
                    $objProducto = new producto;
                    $objProducto->actualizarProducto($idp,$nombre,$precio,$stock,$descripcion);
                    
                    $producto = new producto;
                    $array=$producto->obtenerProductos();
                    include_once("../agregarProductoModule/formProducto.php");
                    $objForm=new formProducto;
                    $objForm->formProductoShow($array);
                }else{
                    echo "Oe blasfemo completa los campos";
                    include_once("../shared/formMensajeSistema.php");
                    $objMessaje = new formMensajeSistema;
                    $objMessaje -> formMensajeSistemaShow1("Complete los campos","../agregarProductoModule/controllerProducto.php","Editar");
                }
            }else{
                echo "Oe blasfemo un stock no es letra";
                include_once("../shared/formMensajeSistema.php");
                $objMessaje = new formMensajeSistema;
                $objMessaje -> formMensajeSistemaShow1("El stock no es un valor letra","../agregarProductoModule/controllerProducto.php","Editar");
            }
        }else{
            echo "Oe blasfemo un precio no es letra";
            include_once("../shared/formMensajeSistema.php");
            $objMessaje = new formMensajeSistema;
            $objMessaje -> formMensajeSistemaShow1("El precio no es un valor letra","../agregarProductoModule/controllerProducto.php","Editar");
        }
    }else if(isset($_POST['Agregar'])){
        $nombre=$_POST['txtnombre'];
	    $precio=$_POST['txtprecio'];
	    $stock=$_POST['txtstock'];
	    $descripcion=$_POST['txtdescripcion'];
        if(is_numeric($precio)){
            if(is_numeric($stock)){
                if ($nombre!=null||$precio!=null||$stock!=null||$descripcion=null){
                    include_once("../model/Producto.php");
                    $objProducto = new producto;
                    $objProducto->agregarProducto($nombre,$precio,$stock,$descripcion);
                    
                    $producto = new producto;
                    $array=$producto->obtenerProductos();
                    include_once("../agregarProductoModule/formProducto.php");
                    $objForm=new formProducto;
                    $objForm->formProductoShow($array);
                }else{
                    echo "Oe blasfemo completa los campos";
                    include_once("../shared/formMensajeSistema.php");
                    $objMessaje = new formMensajeSistema;
                    $objMessaje -> formMensajeSistemaShow1("Complete los campos","../agregarProductoModule/controllerProducto.php","Nuevo");
                }
            }else{
                echo "Oe blasfemo un stock no es letra";
                include_once("../shared/formMensajeSistema.php");
                $objMessaje = new formMensajeSistema;
                $objMessaje -> formMensajeSistemaShow1("El stock no es un valor letra","../agregarProductoModule/controllerProducto.php","Nuevo");
            }
        }else{
            echo "Oe blasfemo un precio no es letra";
            include_once("../shared/formMensajeSistema.php");
            $objMessaje = new formMensajeSistema;
            $objMessaje -> formMensajeSistemaShow1("El precio no es un valor letra","../agregarProductoModule/controllerProducto.php","Nuevo");
        }
    }else if(isset($_POST['Seguro'])){
        include_once("../model/Producto.php");
        $id1=$_GET['id'];
        $objProducto = new producto;
        $objProducto->eliminarProducto($id1);
        $producto = new producto;
        $array=$producto->obtenerProductos();
        include_once("../agregarProductoModule/formProducto.php");
        $objForm=new formProducto;
        $objForm->formProductoShow($array);
    }else if(isset($_POST['No'])){
        include_once("../model/producto.php");
        $producto = new producto;
        $array=$producto->obtenerProductos();
        include_once("../agregarProductoModule/formProducto.php");
        $objForm=new formProducto;
        $objForm->formProductoShow($array);
    }else if(isset($_POST['Regresar'])){
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

