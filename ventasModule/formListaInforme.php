<?php

class formListaInforme
{

	public function formListaInformeShow()
	{

		include_once("../securityModule/formBienvenida.php");
		$obj = new formBienvenida();
		$obj->formBienvenidaShow();
?>



		<div class="col-lg-9">
			<br>
			<div class="card text-dark bg-light mb-3" style="width: 55rem;">

				<h1 align="center"> Informes </h1>
				<!--<form method="post" action="getValidarBotonVer.php">-->

				<div align="center">
					
						<form method="POST" action="getValidarBotonVerificarInforme.php?view=1">
							<input name="fecha" type="date" min="2015-02-20">
							<input type="submit" value="Buscar" name="btnBuscar">
						</form>
					
					<br></br>
					<?php
					if (isset($_POST['btnBuscar'])) {
						if ($_POST['fecha'] == NULL) {
					?>
							<h3>
								Ingrese una fecha Valida
							</h3>
						<?php
						} else {
						?>
							<h3>
								Informes de Fecha :
								<?php
								echo $_POST['fecha'];
								$idfecha = $_POST['fecha'];
								?>
							</h3>



							<table style="width:400px" border="2" class="table">
								<thead>
									<tr>
										<td>Informe</td>
										<td>Estado</td>
										<td>Boton</td>
									</tr>
									<?php
									include_once('../model/conexion.php');

									$resultado = mysqli_query($instancia, "SELECT DISTINCT i.idinforme, i.estado FROM informe i, orden o, detalleinforme d WHERE o.idorden = d.idorden AND d.idinforme=i.idinforme AND o.fechaventa = '$idfecha'");
									?>
								</thead>
								<tbody>
									<?php
									while ($consulta = mysqli_fetch_array($resultado)) {
										$idinfor = $consulta['idinforme'];
										$estado = $consulta['estado'];
									?>
										<tr>
											<form action="getValidarBotonVer.php?idinforme=<?php echo $idinfor ?>" method="POST">
												<td scope="row"><?php echo $idinfor ?></td>
												<?php

												switch ($estado) {
													case '0':
														$state = "Observado";
														break;
													case '1':
														$state = "Aceptado";
														break;
													case '2':
														$state = "Vacio";
														break;
												}
												?>
												<td><?php echo $state ?></td>

												<td>
													<input type="submit" class="btn btn-primary" value="Ver" name="btnVerLista" id="btnVerLista">
												</td>



												<!--<td>
												<a class="btn btn-primary" href="getValidarBotonVer.php?idinforme=<?php echo $idinfor ?>" id="btnVerLista" name="btnVerLista">Ver</a>
												</td>-->


											</form>
										</tr>
									<?php
									}
									?>
								</tbody>





							</table>
							<div class="d-grid gap-2 col-2 mx-auto">
								<?php
								//echo "<input size='' type='button' class ='btn btn-danger btn-lg' value='Salir' onClick='history.go(-1);'>";
								?>

							</div>
					<?php

						}
					}
					?>



				</div>
			</div>
		</div>





<?php
	}
}
?>