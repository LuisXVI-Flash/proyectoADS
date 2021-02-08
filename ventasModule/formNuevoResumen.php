<?php
    class formNuevoResumen{
        public function formNuevoResumenShow(){
            include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
?>


<script>
        function ventas() {
            var n1 = parseInt(document.formNuevo.prodEnviados.value);
            var n2 = parseInt(document.formNuevo.prodRetornados.value);
            var n3 = parseInt(document.formNuevo.prodPerdidos.value);
            document.formNuevo.prodVendidos.value=n1-n2-n3;
        }
    </script>
    <form action="controllerResumenVentas.php?view=grabarNuevo" method="POST" name="formNuevo">
        <div>
            Zona de venta
            <input type="text" name="zonaVenta" id="zonaVenta"><br>
            Cantidad de productos enviados a Zona 
            <input type="text" name="prodEnviados" id="prodEnviados" onChange="ventas()"><br>
            Cantidad de productos retornados
            <input type="text" name="prodRetornados" id="prodRetornados" onChange="ventas()"><br>
            Cantidad de productos perdidos
            <input type="text" name="prodPerdidos" id="prodPerdido" onChange="ventas()"><br>
            Cantidad de productos vendidos
            <input type="text" name="prodVendidos" id="prodVendidos"><br>
            Observaciones
            <input type="text" name="observaciones" id="observaciones"><br>
            <br>
            <br>
            <input name="bntAceptar" type="submit" id="bntAceptar" value="Grabar Datos">
        </div> 
    </form>
    <a href="../ventasModule/controllerResumenVentas.php?view=resumenActual"><input type='button' class ='btn btn-danger' value='Salir' ;'></a>

<?php
        include("../shared/pie.php");
        }
    }
?>