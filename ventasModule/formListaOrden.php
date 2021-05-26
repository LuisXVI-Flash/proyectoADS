<?php
class formListaOrden
{
	public function formListaOrdenesShow($respuesta,$idinforme)
	{
		include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>
		

		<div class="col-lg-9">
			<br>
			<div class="card text-dark bg-light mb-3" style="width: 55rem;">
			<h1 align="center"> Informe <?php echo $idinforme?> </h1>
			<?php $total = 0; ?>
			<form method="post" action="getValidarBotonInforme.php?idinforme=<?php echo $idinforme?>">
				<div align="center">
					<table style="width:400px" border="2" class="table">
						<thead>
							<tr>
								<td>Orden</td>
								<td>Monto</td>
							</tr>
						</thead>


						<?php

						$a = count($respuesta);
						for ($i = 0; $i < $a; $i++) {
						?>
							<tr>

								<td>Orden #<?php echo $respuesta[$i]['0'] ?></td>
								<td><?php echo $respuesta[$i]['1'] ?></td>
								<?php $total = $total + $respuesta[$i]['1']; ?>
							<?php
						}
							?>

							</tr>
					</table>
					<h2> Suma de Boletas: <?php echo $total; ?></h2>
					
					<br></br>
					<button type="submit" class="btn btn-danger" id="btnAtras" name="btnAtras">Atrás</button>
					
					<button type="submit" class="btn btn-success" id="btnInformeAceptado" name="btnInformeAceptado">Informe Aceptado</button>
					
					<button type="submit" class="btn btn-warning" id="btnInformeObservado" name="btnInformeObservado">Informe Observado</button>
				</div>

			</form>
			</div>
			
		</div>

<?php
	}
}
?>