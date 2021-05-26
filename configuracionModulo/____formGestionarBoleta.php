<?php 

exit("Archivo NO utilizable");

if(!isset($_SESSION)) 
{ 
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


$checks = (isset($_POST["check"]) && !empty(($_POST["check"]))) ? $_POST["check"] : null;
print_r($checks);
if(isset($checks)) {

	foreach ($checks as $value) {
		echo $value;
	}
}
include '../shared/cabecera.php'; 
?>

  <div class="container">
  	<?php if(isset($_SESSION["estado"]) && $_SESSION["mensaje"]): ?>
	  	<div class="row">
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
	  <?php endif; ?>

	  <div class="row row-form-content">
	  	<div class="col-12 my-5">
				<div class="card m-auto border border-2">
						<h1 style="text-align: center;">Registro Boleta</h1>
						<form action="../configuracionModulo/formGestionarBoleta.php" method="POST">
							<div class="m-auto" style="width: 80%;">
								<br>
								<span class="bold">DNI:</span>
	              <input type="text" name="dni"  value=""  class="form-control" style="display: inline;" required>
								<br>
								<span class="bold">Nombres:</span>
								<input type="text" name="nombre"  value=""  class="form-control" style="display: inline;" required>
								<br>
								<span class="bold">Apellidos:</span>
								<input type="text" name="apellido" value=""  class="form-control" style="display: inline;" required>
								<br>
								<span class="bold">Email:</span>
								<input type="email" name="email" value="" class="form-control" style="display: inline;" required>
								<br>
								<span class="bold">Dirección:</span>
								<input type="text" name="direccion" value="" class="form-control" style="display: inline;" required> 
								<br>
								<span class="bold">Celular:</span>
								<input type="text" name="celular" value="" class="form-control" style="display: inline;" required>

								<br>
								<span class="bold">Referencia:</span>
								<input type="text" name="referencia" value="" class="form-control" style="display: inline;" required>

								<div class="section-products my-5 w-100">
									
									<table id="tabla_prdoucto" class="text-center w-100">
										  <thead>
										  	<tr >
											    <th>PRODUCTO</th>
											    <th>CANTIDAD</th> 
											    <th>PRECIO</th>
											    <th>PRECIO TOTAL</th>
											    <th>ELIMINAR DE LISTA</th>
											  </tr>
										  </thead>
										  <tbody>
											  <tr>
											    <td>Jill</td>
											    <td>2</td>
											    <td>50</td>
											    <td>100</td>
											    <td><input type="checkbox" name="check[]" value="1"></td>
											  </tr>

											  <tr>
											    <td>Jill</td>
											    <td>2</td>
											    <td>50</td>
											    <td>100</td>
											    <td><input type="checkbox" name="check[]" value="2"></td>
											  </tr>
										  </tbody>
									</table>
								</div>

	              <div class="form-row mt-3 d-flex justify-content-center">
									<span class="btn btn-secondary" onclick="goBack()" style="width: 100%;">Volver Atrás</span>
									<button type="submit" name="guardar_boleta" class="btn btn-success mb-2 mt-2" style="width: 100%;" >Grabar Boleta</button>
								</div>
							</div>
						</form>
					</div>
	  	</div>
	  </div>
	
	</div>

	<script>
	function goBack() {
	  window.history.back();
	}

	$(document).ready(function(){
	  $('.toast').toast('show');
	});

	</script>
</body>
</html>