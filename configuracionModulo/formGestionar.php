<?php 
if(!isset($_SESSION)) { 
	session_start(); 
	include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
}

$stylesheet = true;

if (isset($_SESSION) && isset($_SESSION["idcargo"]) && isset($_SESSION["nombreCargo"]) && ($_SESSION["nombreCargo"] === "Administrador" && $_SESSION["idcargo"] == 1)) {
	 // echo "<br>Abriendo vista";
} else {
	include_once("../shared/formMensajeSistema.php");
	(new formMensajeSistema())->accesso_denegado();
	exit;
}

include '../shared/cabecera.php'; 
?>

  <div class="container">
  	<?php // print_r($_SESSION); ?>
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
		
		<div class="row actions-gestion">
			<div class="d-flex align-items-start w-100">
			  <div class="btns-gestionar p-2">
			  	<div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			    <a class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Nuevo usuario</a>
			    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cambiar contraseña</a>
			  </div>
			  </div>

			  <div class="row row-form-content">
			  	<div class="col-12">
				  <div class="tab-content bg-white" id="v-pills-tabContent">
				    <div class="tab-pane fade show " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
			    
		    	    <div class="card m-auto border border-2">
					      <h1 style="text-align: center;">Registro Usuario</h1>
					      <form action="../configuracionModulo/getGestionar.php" method="POST" class="w-100">
					      
					          <div class="m-auto" style="width: 80%;">
					              <div class="form-row d-flex mt-3">
					              	<span class="col-6 bold">Cargo:</span>
													<div class="col-6 ml-auto border">
														<input type="radio" id="check1" name="cargo" value="2" checked>
														<label for="check1">Jefe de Zona</label>
														<br>
														<input type="radio" id="check2" name="cargo" value="3">
														<label for="check2">Vendedor</label>
														<br>
														<input type="radio" id="check3" name="cargo" value="4">
														<label for="check3">Cobrador</label>
													</div>
					              </div>

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
					              <span class="bold">Contraseña:</span>
					              <input type="password" name="contrasenia_1" value="" class="form-control" style="display: inline;" required>
					              <br>
					              <span class="bold">Confirmar Contraseña:</span>
					              <input type="password" name="contrasenia_2" value="" class="form-control" style="display: inline;" required>
					              <br>
					              <span class="bold">User:</span>
					              <input type="text" name="user_nick" value="" class="form-control" style="display: inline;" required>
					              <br>
					              <span class="bold">Email:</span>
					              <input type="email" name="email" value="" class="form-control" style="display: inline;" required>
					              <br>
					              <span class="bold">Celular:</span>
					              <input type="text" name="celular" value="" class="form-control" style="display: inline;" required>
					          </div >
					          
					      		<div class="form-row mt-3 d-flex justify-content-center">
						      		<span class="btn btn-secondary" onclick="goBack()" style="width: 80%;">Volver Atrás</span>
						          <button type="submit" name="guardar_usuario" class="btn btn-success mb-2 mt-2" style="width: 80%;" >Registrar</button>
					      		</div>
					      </form>
						  </div>

				    </div>
				    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
				    	<div class="card m-auto border border-2">

						    <h1 style="text-align: center;">Verificar DNI</h1>
								<form action="../configuracionModulo/getGestionar.php" method="POST">
									<div class="m-auto" style="width: 80%;">
										<span class="bold">DNI:</span>
			           		<input type="text" name="dni"  value="" autofocus="" class="form-control" style="display: inline;" required>
			           		<div class="form-row mt-3 d-flex justify-content-center">
			           			<button type="submit" name="verificar_usuario" class="btn btn-success mb-2 mt-2" style="width: 100%;" >Verificar</button>
			           		</div>
									</div>
								</form>
							</div>
				    </div>
				  </div>
			  	</div>
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