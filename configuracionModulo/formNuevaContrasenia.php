<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
	include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
}
$stylesheet = true;

if (isset($_SESSION) && isset($_SESSION["idcargo"]) && isset($_SESSION["nombreCargo"]) && ($_SESSION["nombreCargo"] === "Administrador" && $_SESSION["idcargo"] == 1)) {

} else {
	include_once("../shared/formMensajeSistema.php");
	(new formMensajeSistema())->accesso_denegado();
}

?>

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

	  <div class="col-lg-9"> 
  <div class="container">
	 <br> <div  class="card text-dark bg-light mb-3" style="width: 40rem;">
						<div class="card-header fw-bold text-center">Recuperación de Contraseña</div>
						<form action="../configuracionModulo/getGestionar.php" method="POST">
							<div class="m-auto" style="width: 80%;">
								<div>
									<span class="bold">DNI:</span>
									<span><?php echo isset($_SESSION["dni"]) ? $_SESSION["dni"] : ""; ?></span>
								</div> 

								<br>
	           		<span class="bold">Contraseña:</span>
	              <input type="password" name="contrasenia_1" value="" class="form-control" style="display: inline;" required>
	              <br>
	              <span class="bold">Confirmar Contraseña:</span>
	              <input type="password" name="contrasenia_2" value="" class="form-control" style="display: inline;" required>
	              <input type="hidden" name="dni" value="<?php echo isset($_SESSION["dni"]) ? $_SESSION["dni"] : ""; ?>">

	              <div class="form-row mt-3 d-flex justify-content-center">
									<span type="button" class="btn btn-secondary me-md-2" onclick="goBack()">Volver Atrás</span>
									<button type="submit" name="contrasenia_usuario" class="btn btn-primary">Cambiar contraseña</button>
								</div><br>
							</div>
						</form>
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