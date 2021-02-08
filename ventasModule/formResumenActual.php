<?php
class formResumenActual{
	public function formResumenActualShow(){
		/*include_once "../vistas/head.php";
		include_once "../vistas/body.php";*/
        include_once "controllerResumenVentas.php";
        include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
		?>
		<a href="controllerResumenVentas.php?view=nuevoActual" class="btn btn-success">Agregar Resumen</a><hr><br>
        <?php
            include_once("../model/entityResumenventa.php");
            $objArray = new entityResumenventa();
            $efe=$objArray->listarResumenes();
            
        ?>
		<table class='table'>
			<tr>
				<th>IdResumen</th>
                <th>Fecha de venta</th>
				<th>Zona de venta</th>
				<th>Productos Llevados</th>
				<th>Productos Retornados</th>			
				<th>Productos Perdidos</th>
				<th>Total Ventas</th>
                <th>Observaciones</th>
				
			</tr>
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
		</table>
		<br>
		<form action="controllerResumenVentas.php?view=pdf" method="post">
			<button type="submit">Generar balance de ventas</button>
		</form><br>

		<a href="../ventasModule/getResumenVentas.php?view=editarResVen"><input type='button' class ='btn btn-danger' value='Salir' onClick='history.go(-1);'></a>
		<?php
		include_once("../shared/pie.php");
	}
}

?>