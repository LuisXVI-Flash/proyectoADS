<?php 
	if(!isset($_SESSION)) {
        session_start();
    }
			include_once("../securityModule/formBienvenida.php");
			$obj = new formBienvenida();
			$obj->formBienvenidaShow();
	class vistaprueba{

		public function vistapruebashow(){
		
			?>
			
			<div class="col-lg-9"> 
        	<br><div  class="card text-dark bg-light mb-3" style="width: 30rem;">
			<br><h4 class="text-center">La venta ha sido registrada</h4><br>
			<form action="../VentasModule/getRegistrarVenta.php" method="POST">
			<div class="d-grid gap-2 d-md-flex justify-content-md-center">
			<a href="../ventasModule/boletaElectronica.php" class="btn btn-primary">Imprimir boleta</a>
			<input type="submit" name="cancelar" value="Volver al inicio" class="btn btn-secondary"><br>
			</div><br>
			</form>
			
		</div>
<?php
		}
	}
 ?>