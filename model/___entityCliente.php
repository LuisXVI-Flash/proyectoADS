<?php
    // include_once "conexion.php";
    // class entityProducto extends conexion
    // {
    //     private $conexion;
    //     private $idcliente;
    //     private $dni;
    //     private $nombre;
    //     private $apellido;
    //     private $email;
    //     private $direccion;
    //     private $referenciavivienda;
    //     private $celular;
    //     private $tipo_cliente;

                       
    //     function __construct()
    //     {
    //        $this->conexion = Conexion::obtenerConexion();
    //     }

    //     public function setIdcliente($idcliente){
    //       $this->idcliente = $idcliente;
    //     }
    //     public function setDni($dni){
    //         $this->dni = $dni;
    //     }
    //     public function setNombre($nombre){
    //         $this->nombre = $nombre;
    //     }
    //     public function setApellido($apellido){
    //         $this->apellido = $apellido;
    //     }
    //     public function setEmail($email){
    //         $this->email = $email;
    //     }
    //     public function setDireccion($direccion){
    //         $this->direccion = $direccion;
    //     }
    //     public function setReferenciaVivienda($referenciavivienda){
    //         $this->referenciavivienda = $referenciavivienda;
    //     }
    //     public function setCelular($celular){
    //         $this->celular = $celular;
    //     }
    //     public function setTipoCliente($tipo_cliente){
    //         $this->tipo_cliente = $tipo_cliente;
    //     } 


    //     public function getIdcliente(){
    //         return $this->idcliente;
    //     }
    //     public function getDni($dni){
    //         return $this->dni;
    //     }
    //     public function getNombre(){
    //         return $this->nombre;
    //     }
    //     public function getApellido(){
    //         return $this->apellido;
    //     }
    //     public function getEmail(){
    //         return $this->email;
    //     }
    //     public function getDireccion(){
    //         return $this->direccion;
    //     }
    //     public function getReferenciaVivienda(){
    //         return $this->referenciavivienda;
    //     }
    //     public function getCelular(){
    //         return $this->celular;
    //     }
    //     public function getTipoCliente(){
    //         return $this->tipo_cliente;
    //     } 

    //     public function registrarCliente($data)
    //     {

    //       $dni = $this->getDni();
    //       $nombre = $this->getNombre();
    //       $apellido = $this->getApellido();
    //       $email = $this->getEmail();
    //       $direccion = $this->getDireccion();
    //       $referenciavivienda = $this->getReferenciaVivienda();
    //       $celular = $this->getCelular();
    //       $tipo_cliente = $this->getTipoCliente();
    //       #dni nombre  apellido  email direccion referenciavivienda  celular tipo_cliente  
    //       $sql = "INSERT INTO trabajador (`dni`, `nombre`, `apellido`,  `email`, `direccion`, `referenciavivienda`, `celular`, `tipo_cliente`) VALUES ( 
    //         $dni, 
    //         '$nombre', 
    //         '$apellido', 
    //         '$email', 
    //         '$direccion', 
    //         '$referenciavivienda', 
    //         '$celular',
    //         '$tipo_cliente'
    //       )";
    //       $conexion = Conexion::obtenerConexion();
    //       $query = mysqli_query($conexion, $sql); 

    //       if($query) {
    //           return json_encode([
    //               "estado" => true,
    //               "mensaje" => "Se creo el usuario cliente al sistema con éxito"
    //           ]);
    //       }
    //       else 
    //       {
    //            return json_encode([
    //               "estado" => false,
    //               "mensaje" => "No se pudo registrar el usuario cliente"
    //           ]);
    //       }
    //     }
    // }
?>