<?php
//formMessageSistema.php
class formMensajeSistema{
    public function formMensajeSistemaShow($mensaje,$link){
            include 'cabecera.php';
        ?>
        
        <div>
            <p><center><?php echo strtoupper($mensaje)?></center> </p>
            <p><center><a class="btn btn-primary" href="<?php echo $link?>" role="button">Regresar</a></center></p>
        </div>
        
        
    <?php
        include_once("../shared/pie.php");
    }

    public function llamar_mensaje() {
        $this->formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
    }

    public function accesso_denegado() {
        $stylesheet = true; 
        include 'cabecera.php';
    ?>
    <body>        
        <div class="container">
                <div class="row">
                    <div class="col-5 mx-auto my-5 text-center">
                        <h1 class="text-normal mb-3">
                            Se detecto un acceso incorrecto
                        </h1>
                        <a href="../index.php"><span class="btn btn-secondary w-50" ">Volver Atrás</span></a>
                        <script>
                        function goBack() {
                          window.history.back();
                        }
                        </script>
                    </div>
                </div>
            </div>
        </body>
    </html>

    <?php
    }
}
?>