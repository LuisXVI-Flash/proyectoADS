<?php 

class formEditar{
	public function formEditarShow($producto){
		session_start(); 
                include_once("../securityModule/formBienvenida.php");
                    $obj = new formBienvenida();
                    $obj->formBienvenidaShow();
	foreach($producto as $producto){
	?>
	<div class="col-lg-9"> 
    <br><div  class="card text-dark bg-light mb-3" style="width: 40rem;">
	<div class="card-header fw-bold text-center">Editar producto</div>
	<div>
	<div class="container mt-5 center">
	<form action="controllerProducto.php" method="POST">
		<input type="hidden" name="txtid" value="<?php echo $producto['idproducto']?>" class="form-control">
		<label>Nombre producto</label>
		<input type="text" name="txtnombre" value="<?php echo $producto['nombre']?>" class="form-control">
		<label>Precio unitario</label>
		<input type="text" name="txtprecio" value="<?php echo $producto['precio']?>" class="form-control">
		<label>Stock</label>
		<input type="text" name="txtstock" value="<?php echo $producto['stock']?>" class="form-control">
		<label>Descripción</label>
		<input type="text" name="txtdescripcion" value="<?php echo $producto['descripcion']?>" class="form-control">
	</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-center">
		<br><input type="submit" name="Actualizar" value="Actualizar" class="btn btn-primary">
		<input type="submit" class="btn btn-secondary" name="Regresar" value="Regresar">
		</div><br>
	</form>
	
	</div>
	</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php



} 
include_once("../shared/pie.php");
}
}
?>

