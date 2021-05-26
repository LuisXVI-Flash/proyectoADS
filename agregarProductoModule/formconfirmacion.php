<?php
    class confirmacion{
        public function confirmacionShow($id){
            session_start(); 
                include_once("../securityModule/formBienvenida.php");
                    $obj = new formBienvenida();
                    $obj->formBienvenidaShow();
?>
 <div class="col-lg-9"> 
        <br><div  class="card text-dark bg-light mb-3" style="width: 30rem;">
        <div class="card-header fw-bold text-center">¿Seguro que desea eliminar?</div>
    <form action="controllerProducto.php?id=<?php echo $id?>" method="post">
    <br><div class="d-grid gap-2 d-md-flex justify-content-md-center">
             <input type="submit" name="Seguro" value="Eliminar" class="btn btn-primary">
            <input type="submit" name="No" value="Cancelar" class="btn btn-secondary">  
    </div>
    </form>
        </div>
        
    </div>

<?php
        include_once("../shared/pie.php");
        }
    }
?>