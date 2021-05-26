<?php
    class formBalancePDF{
        public function formBalancePDFShow($array){
            session_start();
            include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
            
?>  
<div class="col-lg-9"> 
  <div class="container">
  <br><div  class="card text-dark bg-light mb-3" style="width: 40rem;">
   <div class="card-header fw-bold text-center">Balance de ventas</div>
    <script>
        document.getElementById("ventas").onclick = function() {ventas()};
        function ventas() {
            var n1 = parseInt(document.formNuevo.llevados.value);
            var n2 = parseInt(document.formNuevo.ventas.value);
            document.formNuevo.eficiencias.value=(parseInt(((n2*100)/n1))+"%");
        }
    </script>

<form action="controllerResumenVentas.php" method="post">

        <br><div>
        <table class="table table-borderless">
            <tbody>
                <tr>
                <td>
                <label for="">Cantidad de productos Llevados a zona</label>
                </td>
                <td>
                <input class="form-control" type="text" name="llevados" value="<?php echo $array["sum(cantprodllevados)"]?>" readonly><br>
                </td>
                </tr>
                <tr> 
                <td>
                <label for="">Cantidad de productos Perdidos</label>
                </td>
                <td>
                <input class="form-control" type="text" name="perdidos" value="<?php echo $array["sum(cantprodperdidos)"]?>" readonly><br>
                </td>
                </tr>
                <tr> 
                <td>
                <label for="">Cantidad de productos regresados a almacen</label>
                </td>
                
                <td>
                <input class="form-control" type="text" name="retornados" value="<?php echo $array["sum(cantprodretornados)"]?>" readonly><br>
                </td>
                </tr>
                <tr> 
                <td>
                <label for="">Cantidad total de productos vendidos</label>
                </td>
                
                <td onclick="ventas()">
                <input class="form-control" type="text" name="ventas" value="<?php echo $array["sum(totalventas)"]?>" onclick="ventas()" readonly><br>
                </td>
                </tr>
                </tr>
                <tr> 
                <td>
                <label for="">Porcentaje de eficiencia</label>
                </td>
                
                <td>
                <input class="form-control" type="text" name="eficiencias"  readonly><br>
                </td>
                </tr>
            </tbody>
        </table>            
        </div>        
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <input type="button" value="Grabar Venta" onclick="window.print();" class="btn btn-primary" style="width: 25%;">    
        <input type='submit' class ='btn btn-secondary'name="btnResumenActual" value='Salir'></a>
        </div><br>
</form>

</div>
</div>

<?php
include_once("../shared/pie.php");

        }

    }


?>