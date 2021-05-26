<?php
class formResumenActual{
	public function formResumenActualShow($efe){
		/*include_once "../vistas/head.php";
		include_once "../vistas/body.php";*/
        include_once "controllerResumenVentas.php";
        include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
		?>
	<div class="col-lg-9"> 
  		<br>
		  <div class="container">
		  <div class="justify-content-md-center">

		<form action="controllerResumenVentas.php" method="post">
			<button type="submit" name="agregarR" class="btn btn-primary">Agregar Resumen</button>
		</form> 
        
		<form action="controllerResumenVentas.php" method="post">
			<br><button type="submit" name="generarPDF" class="btn btn-primary">Generar balance de ventas</button>
		</form><br>

		<form action="controllerResumenVentas.php" method="post">
			<input type='submit' class ='btn btn-secondary' name="Regresar" value='Salir' >
		</form>

		
		
	</div>
		<table class="table">
		<thead>
			<tr>
				<th  scope="col">IdResumen</th>
                <th  scope="col">Fecha de venta</th>
				<th  scope="col">Zona de venta</th>
				<th  scope="col">Productos Llevados</th>
				<th  scope="col">Productos Retornados</th>			
				<th  scope="col">Productos Perdidos</th>
				<th  scope="col">Total Ventas</th>
                <th  scope="col">Observaciones</th>
				
			</tr>
			</thead>
			<tbody>
		<?php foreach ($efe as $efe) { ?>			
			<tr>
				<td><?php echo $efe->getIdresumenVenta(); ?></td>
				<td><?php echo $efe->getFecharesumen(); ?></td>
				<td><?php echo $efe->getZonaventa(); ?></td>
				<td><?php echo $efe->getProductosllevados(); ?></td>
				<td><?php echo $efe->getProductosRetornados(); ?></td>
                <td><?php echo $efe->getProductosPerdidos(); ?></td>
                <td><?php echo $efe->getTotalVentas(); ?></td>
                <td><?php echo $efe->getObservaciones(); ?></td>
				
			<tr>					
			<?php } ?>
			</tbody>
		</table>
		<br>
	</div></div>
		<?php
		
		include_once("../shared/pie.php");
	}
}

?>