<?php
  //formBienvenida
  class formBienvenida{
      public function formBienvenidaShow(){
       include("../shared/cabecera.php");
          ?>
    
	

<br>
       
               <?php 

if ($_SESSION['idcargo']==1) {
    ?>
   <li class='nav-link'>
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Configuracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../configuracionModulo/formGestionar.php"><i class="fa fa-circle-o"></i> Gestionar Datos Usuario</a></li>

            
          </ul>
        </li>
<?php }
        ?>
               <?php 
if ($_SESSION['idcargo']==1 || $_SESSION['idcargo']==2 ||$_SESSION['idcargo']==3) {
    ?>
  <li class='nav-link'>
          <a href="#">
            <i class="fa fa-th"></i> <span>Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php 
             if ($_SESSION['idcargo']==1 || $_SESSION['idcargo']==2){ ?>
            <li><a href="../ventasModule/getResumenVentas.php?view=editarResVen"><i class="fa fa-circle-o"></i> Editar resumen de ventas</a></li>

            <li><a href="../ventasModule/getAsignarOrdenOnline.php?view=asignarordenonline"><i class="fa fa-circle-o"></i> Asignar orden online</a></li>

            <li><a href="../ventasModule/getValidarBotonVerificarInforme.php?view=listaform"><i class="fa fa-circle-o"></i> Verificar Informe de Ventas</a></li>
            <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Generar Balance de Ventas</a></li>
            <?php } 
             if($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3){   
            ?>
            <li><a href="../ventasModule/controlRegistrarVenta.php"><i class="fa fa-circle-o"></i> Registrar Ventas</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php }
        ?>
        
              <?php 
//if ($_SESSION['idcargo']==1) {
    ?>
     <!--
  <li class='nav-link'>
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Producto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php 
             //if ($_SESSION['idcargo']==1 || $_SESSION['idcargo']==2){ ?>
            <li><a href="venta.php"><i class="fa fa-circle-o"></i> Agregar Producto</a></li>
            <li><a href="cliente.php"><i class="fa fa-circle-o"></i> Modificar Producto</a></li>
            <li><a href="cliente.php"><i class="fa fa-circle-o"></i> Eliminar</a></li>
            <?php //} 
              ?>
          </ul>
        </li>
   -->
        <?php // }
        ?>

            
        
        
      </ul>
      </div>
    </nav>
    <!-- /.sidebar -->
  

			         
          
          
          <?php
          
      }
  }  
?>