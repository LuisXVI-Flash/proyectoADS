<?php
class formAsignarOrdenOnline
{
    public function formAsignarOrdenOnlineShow()
    {
        include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();



?>
<div class="col-lg-9"> 
        	<br><div  class="card text-dark bg-light mb-3" style="width: 55rem;">
			<div class="card-header fw-bold text-center">Asignar despacho de venta online</div>
            <div align="center">
                <form method="POST" action="../ventasModule/getAsignarOrdenOnline.php?view=asignarordenonlinegg">
                    <table class="table table-borderless">
                        <tr>
                            <th>codigo</th>
                            <th>fecha de venta</th>
                            <th>monto total</th>
                            <th>estado</th>
                            <th>tipo orden</th>
                            <th>id cliente</th>
                            <th>vendedor</th>
                            <th>boton asignar</th>
                            <th>boton anular</th>
                        </tr>
                        <?php

                        include_once("../model/entityOrden.php");
                        $objAea = new entityOrden();
                        $objAea->listarorden();
                        ?>
            </div>

<?php
        include("../shared/pie.php");
    }
}
?>