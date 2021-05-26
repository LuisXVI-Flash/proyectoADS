<?php
//formBienvenida

class formBienvenida
{
    public function formBienvenidaShow()
    {
        include("../shared/cabecera.php");
?>
        <br>
        <?php

        if ($_SESSION['idcargo'] == 1) {
        ?>

            <a class="nav-link disabled" href="#">Configuración</a>

            <!--<a class="nav-link" href="../configuracionModulo/formGestionar.php">Gestionar Datos Usuario</a> -->

            <form action="../configuracionModulo/getGestionarUsuario.php" method="POST">
                <button class="btn btn-link" type="submit" name="btngestionarr">Gestionar Datos Usuario</button>
            </form>



        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2 || $_SESSION['idcargo'] == 3) {
        ?>
            <a class="nav-link disabled" href="#">Ventas</a>

        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2) { ?>

            <!--Victor-->
            <!--<li><a class="nav-link disabled" href="../ventasModule/getAsignarOrdenOnline.php?view=asignarordenonline"> Asignar orden online</a></li>-->
            <form action="../ventasModule/getAsignarOrdenOnline.php?view=asignarordenonline" method="POST">
                <button class="btn btn-link" type="submit" name="btnasignar">Asignar orden online</button>
            </form>
            
            <form method="POST" action="../ventasModule/getValidarBotonVerificarInforme.php?view">
                <li><button class="btn btn-link" name="btnInforme" id="btnInforme">Verificar Informe de Ventas</button></li>
            </form>
            <!---->

            <form action="../ventasModule/getResumenVentas.php" method="post">
                <input class="btn btn-link" name="btnResumen" type="submit" value="Editar resumen de ventas">
            </form>
            
        <?php }
        if($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3){   
            ?>
            <form action="../ventasModule/getRegistrarVenta.php" method="post">
            <input class="btn btn-link" type="submit" name="btnRegistrar" value="Registrar Ventas">
            </form>
            <!--<li><a href="../ventasModule/controlRegistrarVenta.php"><i class="fa fa-circle-o"></i> Registrar Ventas</a></li>-->
            
            
        <?php }
        ?>
        <?php if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 3) {
        ?>
            <!--<a class="nav-link" href="../ventasModule/controlRegistrarVenta.php">Registrar Ventas</a>-->

            <form action="../ventasModule/controllerEntregarPedido.php?view=entregarpedido" method="POST">
                <button class="btn btn-link" type="submit" name="btnentregar">Entregar pedido</button>
            </form>
            
        <?php }
        ?>

        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2) {
        ?>
            <a class="nav-link disabled" href="#">Administración de Productos</a>

        <?php } ?>
        <?php
        if ($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 3) {
        ?>
            <form action="../agregarProductoModule/getProducto.php" method="post">
                <input  class="btn btn-link" type="submit" name="btnProductos" value="Administrar Productos">
            </form>


        <?php }
        ?>


        </nav>
        </div>
        </div>






<?php

    }
}
?>