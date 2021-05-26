<?php
session_start();
include_once("../securityModule/formBienvenida.php");
$obj = new formBienvenida();
$obj->formBienvenidaShow();
class formRegistroOrden
{


    public function formRegistroOrdenShow($trabajadores,$tipoOrden)
    {
?>

       <?php 
       $tot=0;
       foreach ($_SESSION['productos_seleccionados'] as $key => $value) {
        $tot=$tot+$value['precio'];
       }
        ?>
      <div class="col-lg-9"> 
        <br><div  class="card text-dark bg-light mb-3" style="width: 40rem;">
			<div class="card-header fw-bold text-center">Registro de Orden</div>
                    <?php
                        if($tipoOrden=="credito") {
                    ?>
                    <form action="getRegistrarVenta.php" method="POST" onSubmit="return confirm('¿Seguro que quieres continuar?')">
                        <div class="m-auto mt-2 mb-2" style="width: 75%;">
    
                            <span>Día de visita</span>
                            <select name="diavisita" id="" class="form-select">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sabado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                            <br>
                            <span>Cobrador</span>
                            <select name="trabajador" id="" class="form-select">
                                <?php
                                foreach ($trabajadores as $trabajador)
                                    echo '<option value="' . $trabajador["idtrabajador"] . '" >' . $trabajador["nombre_cargo"] . '</option>';
    
                                $total = 0;
                                foreach ($_SESSION["productos_seleccionados"] as $producto => $arr) {
                                    $total += $arr["precio"];
                                }
                                $month = date('m');
                                $day = date('d');
                                $year = date('Y');
    
                                $today = $year . '-' . $month . '-' . $day;
    
                                ?>
                            </select>
                            <br>
                            <input type="hidden" name="total" value="<?php echo $tot ?>">
                            <span>Periodo de pago</span>
                            <select name="cantidadcuota" id="cantidadCuota" class="form-select">
                                <option value="2">2 semanas</option>
                                <option value="3">3 semanas</option>
                                <option value="4">4 semanas</option>
                            </select>
                            <br>
                            <span>Fecha</span>
                            <input type="date" value="<?php echo $today; ?>" id="date" name="fecha" class="form-control"  readonly>
                            <br>
                            <span>Número de cuotas</span>
                            <input type="text" name="cuota" value="<?php echo round((float)($tot / 2), 2); ?>" id="cuota" class="form-control">
                            <br>
                    <?php //var_dump($_SESSION['productos_seleccionados']) ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button type="submit" name="guardarOrden" class="btn btn-primary mb-2 mt-2" style="width: 80%;display: block;margin:auto; ">Guardar Registro de Orden</button>
                        <a href="controlRegistrarCliente.php?view1=siguiente01" class="btn btn-primary mb-2 mt-2" style="width: 30%;margin: auto;">Atras</a>
                        </div>
                   </form>
                    <?php
                    } elseif($tipoOrden=="contado") {
                        ?>
                    <form action="getRegistrarVenta.php" method="POST" onSubmit="return confirm('¿Seguro que quieres continuar?')">
                        <div class="m-auto mt-2 mb-2" style="width: 50%;">
                            <input name="trabajador" value="3" hidden>
                            <br>
                            <span >Fecha</span>
                            <?php 
                                $month = date('m');
                                $day = date('d');
                                $year = date('Y');
    
                                $today = $year . '-' . $month . '-' . $day;
                            ?>
                            <input type="date" value="<?php echo $today; ?>" id="date" name="fecha" class="form-control" style="display: inline;" readonly>
                            <br>
                            <span>Monto Total</span>
                            <input type="text" name="total" value="<?php echo $tot ?>" class="form-control" readonly>
                            <br>
                    <?php //var_dump($_SESSION['productos_seleccionados']) ?>
                        
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <input type="text" name="tipoOrden" value="contado" hidden readonly>
                        <button type="submit" name="guardarOrden" class="btn btn-primary mb-2 mt-2" style="width: 70%;display: block;margin:auto; ">Guardar Registro de Orden</button>
                       <a href="controlRegistrarCliente.php?view1=siguiente01" class="btn btn-primary mb-2 mt-2" style="width: 30%;margin: auto;">Atras</a>
                    </div><br>
                   
                    </form>
                     </div>
                    </div>
                    </div>
                    </div>
                        <?php
                    }
                    ?>
                 
                 
            </div>
        </div>

            <script>
                let tot = +"<?php echo $tot ?>";
                const cantidadCuota = document.getElementById("cantidadCuota");
                cantidadCuota.addEventListener('change', event => {
                    document.getElementById('cuota').value = Math.round(tot / event.target.value * 100) / 100;
                });
            </script>
        </body>
        </html>
<?php
    }
} ?>