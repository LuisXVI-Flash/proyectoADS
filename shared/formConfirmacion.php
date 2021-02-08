<?php
//formMessageSistema.php
class formConfirmacion{
    public function formConfirmacionShow($mensaje,$linkSi,$linkNo){
        include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ventana de confirmacion</h5>
            </div>
            <div class="modal-body">
                <?php echo $mensaje ?>
            </div>
            <div class="modal-footer">
                <form action="<?php echo $linkSi ?>" method="post">
                    <button type="submit" class="btn btn-primary" name="si">Si <?php echo $linkSi ?></button>
                </form>
                <form action="<?php echo $linkNo ?>" method="post">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </form>
                
                
            </div>
            </div>
        </div>
        </div>
    <?php
        include_once("../shared/pie.php");
    }
}
?>