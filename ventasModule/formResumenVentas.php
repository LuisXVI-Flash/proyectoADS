<?php
    class formResumenVentas{
        public function formResumenVentasShow(){
            include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>

    <form action="controllerResumenVentas.php?view=nuevoResumen" method="post">
            <div class='form-group'>
                <input name="btnNuevoResumen" id="btnNuevoResumen" type="submit" value="Nuevo Resumen">
            </div>
    </form>
    <p></p>
    <br>
    <form action="controllerResumenVentas.php?view=resumenActual" method="post">
            <div class='form-group'>
                <input name="btnResumenActual" id="btnResumenActual" type="submit" value="Resumen Actual">
            </div>
    </form>


<?php
            include_once("../shared/pie.php");
        }
    }
?>
