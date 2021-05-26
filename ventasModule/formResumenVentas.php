<?php
    class formResumenVentas{
        public function formResumenVentasShow(){
            include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>
<div class="col-lg-9"> 
  <div class="container">
    <form action="controllerResumenVentas.php" method="post">
            <br><div class='form-group'>
                <input class="btn btn-primary" name="btnNuevoResumen" id="btnNuevoResumen" type="submit" value="Nuevo Resumen">
            </div>
    </form>
    <p></p>
    <br>
    <form action="controllerResumenVentas.php" method="post">
            <div class='form-group'>
                <input class="btn btn-primary" name="btnResumenActual" id="btnResumenActual" type="submit" value="Resumen Actual">
            </div>
    </form>
</div>
</div>

<?php
            include_once("../shared/pie.php");
        }
    }
?>
