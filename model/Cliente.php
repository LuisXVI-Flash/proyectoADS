<?php 

    require_once "Conexion.php";

    class Cliente {

        public function buscarCliente($dni){
            $c = new Conexion();
            $dni = mysqli_escape_string($c->get(),$dni);
            $stm = $c->query("SELECT * FROM cliente WHERE dni = $dni ");
            if ( $row = mysqli_fetch_array($stm) ){
                return ["rowCount"=>1,"cliente"=>$row];
            }
        }
        public function insertarClienteCredito($cliente){
            $c = new Conexion();
            $stm = $c->query("INSERT INTO cliente VALUES('',$cliente[dni],'$cliente[nombre]','$cliente[apellido]','$cliente[email]','$cliente[direccion]','$cliente[referenciavivienda]','$cliente[celular]','$cliente[tipo_cliente]')");
            
            echo "INSERT INTO cliente VALUES('',$cliente[dni],'$cliente[nombre]','$cliente[apellido]','$cliente[email]','$cliente[direccion]','$cliente[referenciavivienda]','$cliente[celular]','$cliente[tipo_cliente]')";
        }

        public function insertarCliente($cliente){
            $c = new Conexion();
            $stm = $c->query("INSERT INTO cliente (`dni`,`nombre`,`apellido`,`email`,`direccion`,`referenciavivienda`,`celular`,`tipo_cliente`) VALUES($cliente[dni],'$cliente[nombre]','$cliente[apellido]','$cliente[email]','$cliente[direccion]','$cliente[referenciavivienda]','$cliente[celular]','$cliente[tipo_cliente]')");
        }
    }

?>