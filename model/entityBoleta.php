<?php 

// select *
// from Clientes C, Productos p
// where c.numClientes= p.numClientes and
// p.idProducto=c.idProducto and c.numClientres="numClientes"
	
	include_once "conexion.php";
	include_once "entityTrabajador.php";
  class entityBoleta extends conexion {
    private $conexion;
    private $trabajador;

    function __construct()
    {
       $this->conexion = Conexion::obtenerConexion();
       $this->trabajador = new entityTrabajador;
    }


    public function obtenerOrden($data){
    		$no_orden = $data["idorden"];
        $sql = "SELECT od.idorden, od.cobrador, od.montototal, od.tipoorden, concat(cl.nombre, ' ', cl.apellido) as nombrecliente FROM orden as od INNER JOIN cliente as cl ON od.idcliente = cl.idcliente AND od.estado = 1 AND od.idorden = $no_orden;";
		var_dump($sql);
        $query = mysqli_query($this->conexion, $sql);
        $rowCount = mysqli_num_rows($query); 
        $datos = array();
        if($row = mysqli_fetch_assoc($query)){
        	$idCobrador = (int) $row["cobrador"];
        	$data_cobrador = json_decode($this->trabajador->leer_trabajador(["idCobrador" => $idCobrador]));
        	$cobrador = null;
        	if($data_cobrador->estado)
        		$cobrador = $data_cobrador->data;

          	$datos = [
          		"idorden" => $row["idorden"],
          		"cobrador" => $cobrador,
          		"montototal" => $row["montototal"],
          		"cliente" => $row["nombrecliente"],
          		"tipo_orden" => $row["tipoorden"],
          		"productos" => json_decode($this->obtenerOrdenDetalleProductos( $row["idorden"]))
          	];
        }

        if(isset($rowCount)) {
        	return json_encode([
        		"estado" => true,
        		"data" => $datos
        	]);
        } else {
        	return json_encode([
        		"estado" => false,
        		"mensaje" => "No se encontró la orden" 
        	]);
        }
    }

    public function obtenerOrdenDetalleProductos($data) {
    	$idorden = (int)$data["idorden"];

    	$sql = "SELECT dto.idproducto, dto.cantidad, product.nombre, product.precio as preciounitario, dto.precio as total FROM detalle_orden as dto INNER JOIN producto as product ON dto.idproducto = product.idproducto  AND dto.idorden = $idorden";
		
		$query = mysqli_query($this->conexion, $sql);
      $rowCount = mysqli_num_rows($query); 
      $datos = array();

      $total = 0;
      while($row = mysqli_fetch_assoc($query)){
				$datos[] = [
					"idproducto" => $row["idproducto"],
					"cantidad" => $row["cantidad"],
					"nombre" => $row["nombre"],
					"preciounitario" => $row["preciounitario"],
					"totalUnidad" => $row["total"]
				];
				$total += (float)$row["total"];
      }

      if($rowCount > 0) {
      	return json_encode([
      		"estado" => true,
      		"data" => $datos,
      		"total" => $total
      	]);
      } else {
      	return json_encode([
      		"estado" => false,
      		"mensaje" => "No se encontró el orden detalle" 
      	]);
      }
    }
  }
 ?>


