<?php
    class formNuevoResumen{
        public function formNuevoResumenShow(){

                session_start(); 
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
<div class="col-lg-9"> 
  <div class="container">
   <br><div  class="card text-dark bg-light mb-3" style="width: 40rem;">
   <div class="card-header fw-bold text-center">Registrar nuevo resumen de venta</div>
    <form action="controllerResumenVentas.php" method="POST" name="formNuevo" >
        <div class="card-body m-auto" style="width: 80%;">
        <span class="bold"> Zona de venta:</span>
            <input type="text" name="zonaVenta" id="zonaVenta" class="form-control" style="display: inline;">
        <span class="bold">Cantidad de productos enviados a Zona:</span>
            <input type="text" name="prodEnviados" id="prodEnviados" onChange="ventas()"  class="form-control" style="display: inline;">
        <span class="bold">Cantidad de productos retornados:</span>   
            <input type="text" name="prodRetornados" id="prodRetornados" onChange="ventas()"  class="form-control" style="display: inline;">
        <span class="bold">Cantidad de productos perdidos:</span>
            <input type="text" name="prodPerdidos" id="prodPerdido" onChange="ventas()"  class="form-control" style="display: inline;">
        <span class="bold">Cantidad de productos vendidos:</span>
            <input type="text" name="prodVendidos" id="prodVendidos"  class="form-control" style="display: inline;">
        <span class="bold">Observaciones:</span>
            <input type="text" name="observaciones" id="observaciones"  class="form-control" style="display: inline;"> 
       </div>       
      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
      
        <input name="bntAceptar" type="submit" id="bntAceptar" value="Grabar Datos" class="btn btn-primary">
            
        </div><br>
       

    </form>
    
</div>
<form action="../ventasModule/controllerResumenVentas.php" method="post">
        <br><input align="center" type='submit' name="Regresar" class ='btn btn-secondary' value='Salir'></a>
    </form>
</div>
</div>
    
<?php
        include("../shared/pie.php");
        }
    }
?>