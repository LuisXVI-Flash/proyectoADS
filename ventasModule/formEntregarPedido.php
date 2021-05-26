<?php
class formEntregarPedido
{
    public function formEntregarPedidoShow()
    {
        include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>
<div class="col-lg-9"> 
    <br><div  class="card text-dark bg-light mb-3" style="width: 55rem;">
		<div class="card-header fw-bold text-center">Entregar pedido</div>
            <div align="center">
                <form method="POST" action="../ventasModule/controllerEntregarPedido.php?view=entregarpedidogg">
                    <table class="table table-borderless">
                        <tr>
                            <th>Código</th>
                            <th>fecha venta</th>
                            <th>monto total</th>
                            <th>estado</th>
                            <th>tipo orden</th>
                            <th>id cliente</th>
                            <th>Acciones</th>
                           
                        </tr>
                        <?php

                        include_once("../model/entityOrden.php");
                        $objAea = new entityOrden();
                        $objAea->listarOrdenTrabajador();
                        ?>
            </div>

    </div>
</div>

<?php
        include("../shared/pie.php");
    }
}
?>