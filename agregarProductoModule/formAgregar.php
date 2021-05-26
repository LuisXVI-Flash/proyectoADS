<?php
	class formAgregarProducto{
		public function formAgregarProductoShow(){
			session_start(); 
                include_once("../securityModule/formBienvenida.php");
                    $obj = new formBienvenida();
                    $obj->formBienvenidaShow();
?>


<div class="col-lg-9"> 
    <br><div  class="card text-dark bg-light mb-3" style="width: 50rem;">
       <div class="card-header fw-bold text-center">Agregar producto</div>
	   <div class="container mt-2 center">
	<form action="controllerProducto.php" method="post">
		<label>Nombre producto</label>
		<input type="text" name="txtnombre" class="form-control"><br>
		<label>Precio unitario</label>
		<input type="text" name="txtprecio" class="form-control"><br>
		<label>Stock</label>
		<input type="text" name="txtstock" class="form-control"><br>
		<label>Descripción</label>
		<input type="text" name="txtdescripcion" class="form-control"><br>
		<div class="d-grid gap-2 d-md-flex justify-content-md-center">
		<input type="submit" name="Agregar" value="Agregar" class="btn btn-primary">
		<input type="submit" name="Regresar" value="Regresar" class="btn btn-secondary">
		</div><br>
	</form>
</div>
</div>
</div>

<?php 
include_once("../shared/pie.php");
	}
}
	
 ?>