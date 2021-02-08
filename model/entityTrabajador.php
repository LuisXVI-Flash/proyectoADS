<?php
    include_once("conexion.php");
    class entityTrabajador extends conexion {
        
        public function validarUsuario($login,$password){
            $conexion = Conexion::obtenerConexion();
            $consulta = "SELECT usuario FROM trabajador where usuario = '$login' AND pasword= '$password' AND estado = 1";
            $resultado = mysqli_query($conexion,$consulta);
            $aciertos = mysqli_num_rows($resultado);
            if($aciertos==1)
                return(1);
            else
                return(0);
        }

        # ***
        public function verificar_usuario_dni ($data)
        {
          $dni = $data['dni'];

          $sql = "SELECT dni FROM trabajador WHERE dni = {$dni} AND estado = 1";
          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql);
          $rowCount = mysqli_num_rows($query);

          if($rowCount) {
            $row = mysqli_fetch_assoc($query);
             mysqli_free_result($query); 
             mysqli_close($conexion);
            return json_encode([
              "estado" => true,
              "dni" => $row["dni"]
            ]);
          }
          else 
          {
            mysqli_free_result($query);
            mysqli_close($conexion); 
            return json_encode([
              "estado" => false,
              "mensaje" => "No se encontro el DNI: {$dni} usuario."
            ]);
          }
        }

        # ***
        public function registrarTrabajador($data) 
        {

          $nombre = $data['nombre'];
          $apellido =$data['apellido'];
          $dni =$data['dni'];
          $celular =$data['celular'];
          $idcargo =$data['idcargo'];
          $usuario =$data['usuario'];
          $pasword =$data['pasword'];

          $sql = "INSERT INTO trabajador (`nombre`, `apellido`, `dni`, `celular`, `idcargo`, `usuario`, `pasword`) VALUES ( 
            '$nombre', 
            '$apellido', 
            $dni, 
            '$celular', 
            $idcargo, 
            '$usuario', 
            '$pasword'
          )";
          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql); 

          if($query) {
              return json_encode([
                  "estado" => true,
                  "mensaje" => "Se creo usuario nuevo al sistema con éxito"
              ]);
          }
          else 
          {
               return json_encode([
                  "estado" => false,
                  "mensaje" => "No se pudo registrar el usuario"
              ]);
          }
        }

        public function actualizar_trabajador($data)
        {
          $dni = $data['dni']; 
          $pasword = $data['pasword'];

          $sql = "UPDATE trabajador SET ";
          if(isset($pasword)) {
            $sql .= "pasword = '{$pasword}'";
          }

          $sql .= " WHERE dni = $dni;";

          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql); 
          if($query) {
            return json_encode([
                "estado" => true,
                "mensaje" => "Se ha cambiado la contraseña con éxito."
              ]);
            }
          else
          {
            return json_encode([
              "estado" => false,
              "mensaje" => "No se pudo actualizar la contraseña.",
              'error' => mysqli_error($conexion)
            ]);
          }
        }

        public function leer_trabajador($data) {
          $idCobrador = $data["idCobrador"];
          $sql = "SELECT concat(tr.nombre, ' ', tr.apellido) as nombrecobrador FROM trabajador as tr WHERE tr.idtrabajador = $idCobrador";
          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql);
          $cobrador = null;
          $rowCount = mysqli_num_rows($query); 
          if($row = mysqli_fetch_assoc($query)) {
            $cobrador = $row["nombrecobrador"];
          }

          if($rowCount > 0) {
            return json_encode([
              "estado" => true,
              "data" => [
                "id" => $idCobrador,
                "nombre" => $cobrador
              ]
            ]);
          } else {
            return json_encode([
              "estado" => false,
              "mensaje" => "No se encontró el usuario trabajador" 
            ]);
          }



        }

    }
?>