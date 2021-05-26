<?php 

    require_once __DIR__."/Conexion.php";


    class Producto{

        public function obtenerProductos(){
            $c = new Conexion();
            $stm = $c->query("SELECT * FROM producto");
            while ( $row = mysqli_fetch_array($stm) ){
                $r[] = $row;
            }
            return $r;
        }

        public function consultarStock($idproducto,$cantidadMax)
        {
            $c = new Conexion();
            $stm = $c->query("SELECT if(stock>0 AND stock >= $cantidadMax, TRUE,FALSE) as verificarStock,stock,nombre,precio FROM producto WHERE idproducto = $idproducto ");
            if ( $row = mysqli_fetch_array($stm) ){
                $r = $row;
            }
            return $r;
            
        }
        public function agregarProducto($n,$p,$s,$d){
            $c = Conexion::obtenerConexion();
            $sql = "INSERT into producto(nombre,precio,stock,descripcion) values('".$n."','".$p."','".$s."','".$d."')";
            $resultado = mysqli_query($c,$sql);
            return $resultado;

        }

        public function obtenerUno($id){
            $conexion = Conexion::obtenerConexion();
            $id=$_GET['id'];
            $sql="select * from producto where idproducto='".$id."'";
            $resultado=mysqli_query($conexion, $sql);
            return $resultado;
        }

        public function actualizarProducto($id,$n,$p,$s,$d){
            $conexion = Conexion::obtenerConexion();
            $sql2="update producto set nombre='".$n."', precio='".$p."', stock='".$s."', descripcion='".$d."' where idproducto='".$id."'";
		    $resultado = mysqli_query($conexion,$sql2);
        }
        public function eliminarProducto($id){
            $conexion = Conexion::obtenerConexion();
            $sql="delete from producto where idproducto='".$id."'";
            mysqli_query($conexion,$sql);
        }
    
    }
?>