
	
	<?php 
	class formProducto{
		public function formProductoShow($filas){
			session_start(); 
                include_once("../securityModule/formBienvenida.php");
                    $obj = new formBienvenida();
                    $obj->formBienvenidaShow();
		
		 ?>
		 <div class="col-lg-9"> 
        <br><div  class="card text-dark bg-light mb-3" style="width: 60rem;">
			<div class="card-header fw-bold text-center">Lista de productos</div>
		 <div class="container mt-5 center">
		 	
			<form action="controllerProducto.php" method="post">
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<input type="submit" name="Nuevo" value="Nuevo Producto" class="btn btn-primary">
			</div><br>
			</form>
		 	<table  class="table table-borderless primary">
		 		<thead>
		 			<tr>
		 				<th  scope="col">Nombre</th>
		 				<th  scope="col">Stock</th>
		 				<th  scope="col">Precio</th>
		 				<th  scope="col">Descripción</th>
		 				<th  scope="col">Acciones</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			<?php 
		 				foreach($filas as $filas){
		 			?>
		 			<tr>
						<form action="controllerProducto.php?id=<?php echo $filas['idproducto'] ?>" method="post">
		 				<td name="nombre" value=""><?php echo $filas['nombre'] ?></td>
		 				<td name="stock" value=""><?php echo $filas['stock'] ?></td>
		 				<td name="precio" value=""><?php echo $filas['precio'] ?></td>
		 				<td name="descripcion" value=""><?php echo $filas['descripcion'] ?></td>
		 				<td>
							<input type="submit" name="Editar" value="Editar" class="btn btn-primary">
							<input type="submit" name="Eliminar" value="Eliminar" class="btn btn-secondary">
		 					
		 				</td>
						</form>
		 			</tr>		
		 			<?php	}
		 			 ?>
		 			</tbody>
		 	</table>
		 </div>
		</div>
	</div>
<?php
		include_once("../shared/pie.php");
	}
}
?>