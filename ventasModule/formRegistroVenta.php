<?php 
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

include '../shared/cabecera.php'; 
 ?>


<div class="container">
	<div class="row col-12">

		<h1>REFERENCIA DE SOLO DISEÑO..</h1>
    <form action="../Controlador/controlRegistrarVenta.php" method="POST" class="p-3">
        Productos:
        <select name="producto" class="form-select" style="width: 100px; display:inline;">
            <option value="1">Jabón Liquido</option><option value="2">Pino quita grasa</option><option value="3">Ambientador</option>                    </select>
        Cantidad:
        <input type="number" id="idcantidadproducto" min="1" max="20" name="cantidadProducto" value="1">
        <button type="submit" name="agregar" class="btn btn-success">AGREGAR</button>
    </form>
      
		<section class="">
		<div class="">
		<h3>Productos Seleccionados</h3>
		                        <table class="table w-50">
		<thead class="table-dark">
		    <tr>
		        <th>Nombre</th>
		        <th>Cantidad</th>
		        <th>Precio</th>
		    </tr>

		</thead>
		<tbody>
		    <tr><td>Ambientador</td><td>1</td><td>8</td></tr><tr><td>Pino quita grasa</td><td>3</td><td>24</td></tr>                                    </tbody>
		<tfoot>
		    <tr>
		        <td colspan="2" style="text-align: center;font-weight: bold;">Total</td>
		        <td>32</td>
		    </tr>
		</tfoot>
		</table>
		                </div>
		</section>
		<br>
    <div class="col-auto">
		 	<a href="../Controlador/controlRegistrarCliente.php?op=contado" class="btn btn-primary">CONTADO</a>
		  <a href="../Controlador/controlRegistrarCliente.php?op=credito" class="btn btn-secondary">CREDITO</a>
    </div>

	</div>
	 <div class="col-6 my-5">
	 	<a href="./boletaElectronica.php" class="btn btn-primary">Emitir Boleta (Siguiente)</a>
	</div>
</div>




</body>
</html>