<?php
    // include_once "conexion.php";
    // class entityProducto extends conexion
    // {
    //     private $conexion;
    //     private $idproducto;
    //     private $nombre;
    //     private $stock;
    //     private $precio;
    //     private $descripcion;
    //     private $imagen;

    //     function __construct(argument)
    //     {
    //        $this->conexion = Conexion::obtenerConexion();
    //     }

    //     public function setIdproducto($idproducto){
    //         $this->idproducto = $idproducto;
    //     }
    //     public function setNombre($nombre){
    //         $this->nombre = $nombre;
    //     }
    //     public function setStock($stock){
    //         $this->stock = $stock;
    //     }
    //     public function setPrecio($precio){
    //         $this->precio = $precio;
    //     }
    //     public function setDescripcion($descripcion){
    //         $this->descripcion = $descripcion;
    //     }
    //     public function setImagen($imagen){
    //         $this->imagen = $imagen;
    //     }


    //     public function getIdproducto(){
    //         return $this->idproducto;
    //     }
    //     public function getNombre(){
    //         return $this->nombre;
    //     }
    //     public function getStock(){
    //         return $this->stock;
    //     }
    //     public function getPrecio(){
    //         return $this->precio;
    //     }
    //     public function getDescripcion(){
    //         return $this->descripcion;
    //     }
    //     public function getImagen(){
    //         return $this->imagen;
    //     }

    //     public function obtener_productos(){
    //         $consulta = "SELECT ";
    //         $query = mysqli_query($this->conexion, "SELECT * from producto", MYSQLI_USE_RESULT);
    //         while ($row = mysqli_fetch_assoc($query)) {
    //             $entityProducto = new entityProducto;
    //             $entityProducto->setIdproducto($row["idproducto"]);
    //             $entityProducto->setNombre($row["nombre"]);
    //             $entityProducto->setStock($row["stock"]);
    //             $entityProducto->setPrecio($row["precio"]);
    //             $entityProducto->setDescripcion($row["descripcion"]);
    //             $entityProducto->setImagen($row["imagen"]);
    //         }
    //         mysqli_free_result($query);
    //         $this->conexion->close();
    //     }


    //     public function actualizar_producto_cantidad($data)
    //     {
    //       foreach ($data as  $value) {
    //         $sql = "UPDATE producto SET ";
    //         if(isset($value["stock"])) {
    //           $sql .= "stock = '{$value["stock"]}'";
    //         }

    //         $sql .= " WHERE idproducto = $idproducto;";
    //         $query = mysqli_query($this->conexion, $sql); 
    //         $row .= mysqli_num_rows($query); 
    //       }

    //       // $conexion = Conexion::obtenerConexion();
    //       $this->conexion->close();
    //       if($query && $row > 0) {
    //         return json_encode([
    //             "estado" => true,
    //             "mensaje" => "Se han actualizado la cantidad"
    //           ]);
    //         }
    //       else
    //       {
    //         return json_encode([
    //           "estado" => false,
    //           "mensaje" => "No se pudo actualizar la cantidad.",
    //           'error' => mysqli_error($conexion)
    //         ]);
    //       }
    //     }
    // }
?>