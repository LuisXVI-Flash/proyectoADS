<?php


// $obj->formBienvenidaShow();

class formRegistrarCliente
{
    public function formRegistrarClienteShow($dni = null,$cliente = null,$message_error = null)
    {
        if(!isset($_SESSION)) {
    session_start();
}
// include_once "controllerResumenVentas.php";
include_once("../securityModule/formBienvenida.php");
$obj = new formBienvenida();
$obj->formBienvenidaShow();
?>

 <div class="col-lg-9"> 
 <br><div  class="card text-dark bg-light mb-3" style="width: 45rem;">
				<div class="card-header fw-bold text-center">Registrar cliente</div>
                        <form action="getRegistrarVenta.php" method="POST" class="w-100">
                            
                            <div class="m-auto" style="width: 65%;">
                            <div class="container" style="width: 100%;" >
                            <br><div class="row">
                            <span>DNI</span>
                                <div class="col-8">
                                <input type="text" name="dni" value="<?php  echo $dni!=null?$dni:'' ?>" required  class="form-control" style="display: inline;" required pattern="[0-9]{8}">
                                </div>
                                <div class="col-4">
                                <button name="buscar" type="submit" class="btn btn-primary" style="width: 100%;">Buscar</button>
                            <br>
                          </div>
                            </div>
                        </div>
                       </div>
                       <div class="container" style="width: 65%;" >
                                <span>Nombres</span>
                                <input type="text" name="nombre"  value="<?php echo $cliente != null ?$cliente["nombre"] : '' ?>"  <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;" >
                                <br>
                                <span>Apellidos</span>
                                <input type="text" name="apellido" value="<?php echo $cliente != null ?$cliente["apellido"] : '' ?>"  <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                <br>
                                <span>E-mail</span>
                                <input type="email" name="email" value="<?php echo $cliente != null ?$cliente["email"] : '' ?>" <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                <br>
                                <span>Dirección</span>
                                <input type="text" name="direccion" value="<?php echo $cliente != null ?$cliente["direccion"] : '' ?>" <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                <br>
                                <span>Celular</span>
                                <input type="number" name="celular" value="<?php echo $cliente != null ?$cliente["celular"] : '' ?>" pattern="[0-9]{9}" <?php echo $cliente!=null?"disabled":"" ?> class="form-control" style="display: inline;">
                                
                            <br>
                            <?php 
                            if($message_error!=null){
                                echo "<p>$message_error</p>";
                            }
                            ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button type="submit" name="<?php echo $cliente!=null?'contado':'grabar'?>" <?php  echo $dni!=null?:'disabled'?> value="contado" class="btn btn-primary mb-2 mt-2" style="width: 30%; margin: auto;">Contado</button>
                            <button type="submit" name="<?php echo $cliente!=null?'credito':'grabar'?>" <?php  echo $dni!=null?:'disabled'?> value="credito" class="btn btn-primary mb-2 mt-2" style="width: 30%; margin: auto;">Crédito</button>
                            
                            </div>
                        </form>
                            <form action="getRegistrarVenta.php" method="post">
                            <button type="submit" class="btn btn-secondary" style="width: 30%; margin: auto;" name="btnRegistrar">Cancelar</button>
                            </form>
                    </div >

            </div>        
      </div>
<?php
    }
}