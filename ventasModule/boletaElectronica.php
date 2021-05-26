<?php 
!
include_once("../model/Orden.php");
if(!isset($_SESSION)) { 
    session_start(); 
}

$stylesheet = true;

if (isset($_SESSION) && isset($_SESSION["idcargo"]) && isset($_SESSION["nombreCargo"]) && ($_SESSION["nombreCargo"] === "Administrador" && $_SESSION["idcargo"] == 1)) {
	 // echo "<br>Abriendo vista";
} else {
	include_once("../shared/formMensajeSistema.php");
	(new formMensajeSistema())->accesso_denegado();
	exit;
}


 ?>
<style media="print">
    .actios-boleta , .navbar ,.row-message{
        display: none;
    }
</style>

<?php 
	
	include '../model/entityBoleta.php';
	$boleta = new entityBoleta;
	$orden = new Orden;
	$aea= $orden->obtenerIdmax();
	//var_dump($aea[0]["idorden"]);
	$dataBoletad = $boleta->obtenerOrden(["idorden" => 4]);
	$dataBoleta = json_decode($dataBoletad);

	


 ?>
<pre>
	<!-- <?php print_r($dataBoleta); ?> -->
</pre>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Dibruesma E.I.R.L.</title>
</head>
<body>



	<?php if(isset($_SESSION["estado"]) && $_SESSION["mensaje"]): ?>
	<div class="row row-message">
		<div class="col-12 p-0">
			<div class="toast-container">
				<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
				  <div class="toast-header">
				    <img src="../resources/iconos/nombre_icono.png" class="rounded me-2" alt="...">
				    <strong class="me-auto">Mensaje</strong>
				    <!-- <small class="text-muted">11 mins ago</small> -->
				    <button type="button" id="myToast" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				  </div>
				  <div class="toast-body">
				    <?php echo $_SESSION["mensaje"]; ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<?php unset($_SESSION["estado"], $_SESSION["mensaje"]); ?>
	<?php endif; 

	?>



	<div class="row mx-auto">
		<?php if ($dataBoleta->estado == false) : ?>
			<div class="col-12 my-5">
				<h1><?php echo $dataBoleta->mensaje; ?></h1> 
			</div>
		<?php else: ?>
			<div class="container border" style="width: 80%;">
			<div class="col-12 my-3 content-boleta bgc-color-boleta " >
				<div class="row">
					<div class="col-4">
						<div class="col-12 d-flex">
							<span class="col-3 p-0" style="white-space: nowrap;">Razón social</span>
							<span class="col-auto ">: DIBRUESMA E.I.R.L</span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">RUC</span>
							<span class="col-auto ">: 20100338057</span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">Dirección</span>
							<span class="col-auto ">: jr. Santa Catalina 245</span>
						</div>
						<div class="col-auto">
							<span>J.C.M Lima - Lima Villa Maria del Triungfo</span>
						</div>
					</div>

					<div class="col-4 text-center d-flex justify-content-center align-items-center" style="border: 1px solid red">
						<h4 class="text-uppercase text-danger">Boleta Venta Electrónica <br> BX01-00012</h4>
					</div>

					<div class="col-4 d-flex justify-content-end">
						<img src="../imagenes/logo_boleta.png" class="img-fluid w-75" alt="">
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-4">
						<div class="col-12 d-flex">
							<span class="col-3 p-0" style="white-space: nowrap;">Cliente</span>
							<span class="col-auto ">: <?php echo $dataBoleta->data->cliente; ?> </span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">Tipo de Doc</span>
							<span class="col-auto ">: DOC .NACIONAL DE IDENTIDAD</span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">No. Documento</span>
							<span class="col-auto ">: 67942294</span>
						</div>
					</div>

					<div class="col-5 ">
						<div class="col-12 d-flex">
							<span class="col-3 p-0" style="white-space: nowrap;">Fecha de emisión</span>
							<?php
								$fecha =  date("d/m/Y");
							 ?>
							<span class="col-auto ">: <?php echo $fecha; ?></span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">Nombre de cobrador</span>
							<span class="col-auto ">: <?php echo $dataBoleta->data->cobrador->nombre; ?> </span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">Cód vendedor</span>
							<span class="col-auto ">: <?php echo $dataBoleta->data->cobrador->id; ?> </span>
						</div>
						<div class="col-12 d-flex">
							<span class="col-3 p-0">Almacen</span>
							<span class="col-auto ">: Villa Maria del Triunfo</span>
						</div>
						
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="section-boleta my-3 w-100">
										
							<table id="tabla_boleta" class="text-center w-100">
							  <thead>
							  	<tr >
								    <th>CODIGO</th>
								    <th>DESCRIPCION</th>
								    <th>CANTIDAD</th> 
								    <th>PRECIO UNITARIO S/</th>
								    <th>DESCUENTO APLICADOS S/</th>
								    <th>IMPORTE TOTAL</th>
								  </tr>
							  </thead>
							  <tbody>
							  	<?php //print_r($dataBoleta->data->productos); ?>
							  	<?php
									  $productos = $dataBoleta->data->productos->data;
									  var_dump($producto);
							  		$total = $dataBoleta->data->productos->total;
							  		$IVGS = $total*0.18;
							  		$Gravadas = $total - $IVGS;
							  		$total_descuento = ($total*16)/100;
							  		$monto_total = $total -$total_descuento;
							  		foreach ($productos as  $producto): ?>
							  		
									  <tr style="border-bottom: thin solid; line-height: 3">
									    <td><?php echo $producto->idproducto; ?></td>
									    <td><?php echo $producto->nombre; ?></td>
									    <td><?php echo $producto->cantidad; ?></td>
									    <td><?php echo $producto->preciounitario; ?></td>
									    <td><?php echo "0.00";?></td>
									    <td><?php echo $producto->totalUnidad; ?></td>
										$monto_total=$monto_total+$producto->totalUnidad;
									    							    
									  </tr>
							  		<?php endforeach ?>
							  </tbody>

							   <tfooter >
								  <tr style="line-height: 3">
								  	<td colspan="4"></td>
								    <td class="bold" style="text-align: right;">Operaciones Gravadas S/:</td>
								     <td>29.52</td>								    
								  </tr>
								  <tr style="line-height: 3">
								  	<td colspan="4"></td>
								    <td class="bold" style="text-align: right;">IVG S/:</td>
								    <td>6.48</td>							    
								  </tr>
								  <tr style="border-bottom: thin solid; line-height: 3">
								  	<td colspan="4"></td>
								    <td class="bold" style="text-align: right;">MONTO TOTAL S/:</td>
								    <td>36..0</td>							    
								  </tr>
								  <tr style="line-height: 3">
								  	<td colspan="4"></td>
								    <td class="bold" style="text-align: right;">Total Descuentos S/:</td>
								    <td><?php echo $total_descuento; ?></td>								    
								  </tr>
								  <tr style="border-bottom: thin solid; line-height: 3">
								  	<td colspan="4"></td> 
								  	<td class="bold" style="text-align: right;">Total Descuentos Sin Importe S/:</td>
								    <td><?php echo $total_descuento; ?></td>							    
								  </tr>

								  <tr style="line-height: 3">
								  	<td colspan="6" style="opacity: 0">modo lectura</td>					    
								  </tr>

								  <tr style="border-bottom: thin solid; border-top: thin solid; line-height: 3">
								  	<td class="bold">FORMA DE PAGO:</td> 
								  	<td class="text-uppercase"><?php echo $dataBoleta->data->tipo_orden; ?></td> 
								  	<td colspan="2"></td> 
								  	<td class="bold" style="text-align: right;">MONTO:</td>
								    <td>36.00</td>							    
								  </tr>
							  </tbody>
							</table>
						</div>

						<div class="actios-boleta">
							<form action="../configuracionModulo/getGestionar.php" method="POST" class="w-100"> 
								<div class="form-row mt-3 d-flex justify-content-center align-items-center">
						      		<a href="../securityModule/getUsuario.php" class="btn btn-secondary" style="width: 25%;">Volver Atrás</a>
						      		<span style="margin: 0 10px;"></span>
						      		<input type="button" value="Grabar Venta" onclick="window.print();" class="btn btn-primary mb-2 mt-2" style="width: 25%;">
					      		</div>
						    </form>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>	
</body>
</html>