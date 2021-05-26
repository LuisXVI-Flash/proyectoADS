<?php
class formMensaje
{
	public function formMensajeShow($mensaje, $link)
	{
		include_once("../securityModule/formBienvenida.php");
		$obj = new formBienvenida();
		$obj->formBienvenidaShow();

?>

		<div class="col-lg-9">
			<br>
			<div class="card text-dark bg-light mb-3" style="width: 55rem;">

				<?php
				if (empty($link)) {



				?>
					<h2>
						<center><?php echo strtoupper($mensaje); ?></center>
					</h2>


					<center>
						<form method="POST" action="../ventasModule/getValidarBotonVerificarInforme.php">
							<button class="btn btn-success btn-center" name="btnInforme" id="btnInforme"> Actualizar</button>
					</center>
					</form>




				<?php
				} else {

				?><p align="center">
					<h2>
						<center><?php echo strtoupper($mensaje); ?></center>
					</h2>
					<?php

					echo $link ?>
					</p><?php
					}
						?>
			</div>
		</div>

<?php
	}
}
?>