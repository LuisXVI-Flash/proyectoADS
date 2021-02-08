<?php
    include_once "conexion.php";
    class entityResumenventa extends conexion{
        private $idResumenVenta;
        private $fecharesumen;
        private $zonaVenta;
        private $prodLlevados;
        private $prodRetornados;
        private $prodPerdidos;
        private $totalVentas;
        private $observaciones;

        public function getIdresumenVenta(){
            return $this -> idResumenVenta;
        }
        public function setIdresumenVenta($id){
            $this->idResumenVenta = $id;
        }

        public function getFecharesumen(){
            return $this -> fecharesumen;
        }
        public function setFecharesumen($fecha){
            $this->fecharesumen = $fecha;
        }

        public function getZonaventa(){
            return $this -> zonaVenta;
        }
        public function setZonaventa($zona){
            $this->zonaVenta = $zona;
        }

        public function getProductosllevados(){
            return $this -> prodLlevados;
        }
        public function setProductosllevados($p_ll){
            $this->prodLlevados = $p_ll;
        }

        public function getProductosRetornados(){
            return $this -> prodRetornados;
        }
        public function setProductosRetornados($p_rr){
            $this->prodRetornados = $p_rr;
        }

        public function getProductosPerdidos(){
            return $this -> prodPerdidos;
        }
        public function setProductosPerdidos($p_pp){
            $this->prodPerdidos = $p_pp;
        }

        public function getTotalVentas(){
            return $this -> totalVentas;
        }
        public function setTotalVentas($tt){
            $this->totalVentas = $tt;
        }

        public function getObservaciones(){
            return $this -> observaciones;
        }
        public function setObservaciones($obs){
            $this->observaciones = $obs;
        }


        public function agregarDatos($d,$z,$l,$r,$p,$t,$o){
            $con = Conexion::obtenerConexion();

            $sql = "INSERT INTO resumenventa VALUES ('','$d','$z',$l,$r,$p,$t,'$o')";
            
            $resultado = mysqli_query($con,$sql);
            
    
            return $resultado;            
        }

        public function listarResumenes(){
            $con = Conexion::obtenerConexion();
            $mesActual=date("d");
            $sql = "SELECT * FROM resumenventa where MONTH(fecharesumen)=$mesActual";
            $resultado = mysqli_query($con,$sql);
            $datos = array();
            while($row = mysqli_fetch_array($resultado)){
                $resumen = new entityResumenventa();

                $resumen->setIdresumenVenta($row[0]);
                $resumen->setFecharesumen($row[1]);
                $resumen->setZonaventa($row[2]);
                $resumen->setProductosllevados($row[3]);
                $resumen->setProductosRetornados($row[4]);
                $resumen->setProductosPerdidos($row[5]);
                $resumen->setTotalVentas($row[6]);
                $resumen->setObservaciones($row[7]);

                array_push($datos,$resumen);
            }
            return $datos;
        }

        public function listarbalance(){
            $con = Conexion::obtenerConexion();
            $mesActual=date("m");
            $sql = "SELECT sum(cantprodllevados), sum(cantprodretornados), sum(cantprodperdidos), sum(totalventas) FROM `resumenventa` WHERE MONTH(fecharesumen) = $mesActual";
            $resultado = mysqli_query($con,$sql);
            
            return mysqli_fetch_assoc($resultado);
        }
    }
    
?>