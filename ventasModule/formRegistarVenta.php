<?php
session_start();

class formRegistrarVenta
{
    public function formRegistrarVentaShow($productos, $fila = null){
    
    include_once("../securityModule/formBienvenida.php");
    $obj = new formBienvenida();
    $obj->formBienvenidaShow();
    { ?>

    <div class="col-lg-9"> 
        <br>
            <div  class="card text-dark bg-light mb-3" style="width: 60rem;">
				
                
            <?php
                   // if(isset($_SESSION["productos_seleccionados"]) && !empty($_SESSION["productos_seleccionados"])) {
                    if ($fila != null) {
                        
                        $_SESSION["productos_seleccionados"][ $fila["nombre"]] = ["idProducto" => $_POST["idProducto"], "nombre"=> $_POST['nombreProducto'],"cantidad" => $_POST["cantidadProducto"], "precio" => $fila["precio"] * $_POST["cantidadProducto"]];

                   ?>
                <div  class="card text-dark bg-light mb-3" style="width: 60rem;">
                <div class="card-header fw-bold text-center">Lista de productos</div>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                
                                    $total = 0;
                                    $fila1 = 1;
                                        foreach ($_SESSION["productos_seleccionados"] as $producto=> $arr) {
                                            
                                            echo "<form action='getRegistrarVenta.php' method=POST><tr>";
                                            echo "<td><input type=number value=$fila1 name='filaProducto' readonly ></td>";
                                            echo "<td>" . $arr["nombre"] . "</td>";
                                            echo "<td>" . $arr["cantidad"] . "</td>";
                                            echo "<td>". $arr["precio"] /** $arr["cantidad"]*/ ."</td>";
                                            echo "<td><input type=submit value='eliminar' name='eliminar' class='btn btn-primary'></td>";
                                            echo "</tr>
                                            </form>";
                                            $total += $arr["precio"] /** $arr["cantidad"]*/;
                                            $fila1++;
                                        }

                                    /*
                                    foreach ($productos as $producto) {
                                        
                                        echo "<form action='controlRegistrarVenta.php' method=POST>
                                        <tr>
                                        <input name='idProducto' value='$producto[idproducto]' hidden>";
                                        echo "<td><input name='nombreProducto' value='$producto[nombre]'  class='form-control-sm border-0';'></td>";
                                        echo "<td>S/. <input type=number name='precio' value=$producto[precio] class='form-control-sm border-0'></td>";
                                        echo "<td><input type=text name='descripcion' value=$producto[descripcion] class='form-control-sm border-0' ></td>";
                                        echo "<td><input type=number name=cantidadProducto min=1 value=1 class='form-control-sm  border-1'></td>";
                                        // echo "<td>" . $producto['imagen'] . "</td>";
                                        echo "<td><input type=submit value='agregar' class='btn btn-primary' name='agregar'></td>";
                                        echo "</tr>
                                        </form>";
                                    }*/
                                    
                                    ?>
                                </tbody>
                                
                                <tfoot>
                                        <tr>
                                            <td colspan="3" style="text-align: center;font-weight: bold;">Total</td>
                                            <td><?php echo $total; ?></td>
                                        </tr>
                                    </tfoot>


                            </table>
                        </div>
                <?php

                    }
                    else if (isset($_SESSION["productos_seleccionados"])) {
                 //   if(isset($_SESSION["productos_seleccionados"]) && !empty($_SESSION["productos_seleccionados"])) {
                        ?>

            <div  class="card text-dark bg-light mb-3" style="width: 60rem;">

        
				<div class="card-header fw-bold text-center">Lista de productos agregados</div>
                            <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Identificador</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                
                                        $total = 0;
                                        $fila1 = 1;
                                        foreach ($_SESSION["productos_seleccionados"] as $producto) {
                                            
                                            echo "<form action='getRegistrarVenta.php' method=POST>
                                            <tr>";
                                            echo "<td><input type=number value=$fila1 name='filaProducto' readonly  class='form-control-sm border-0'></td>";
                                            echo "<td>" . $producto["nombre"]. "</td>";
                                            echo "<td>" . $producto["cantidad"] . "</td>";
                                            echo "<td>". $producto["precio"] /** $producto["cantidad"] */."</td>";
                                            echo "<td><input type=submit value='eliminar' name='eliminar' class='btn btn-primary'></td>";
                                            echo "</tr>
                                            </form>";
                                            $total += $producto["precio"] /** $producto["cantidad"]*/;
                                            $fila1++;
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" style="text-align: center;font-weight: bold;">Total</td>
                                            <td>S/. <?php echo $total; ?></td>
                                        </tr>
                                    </tfoot>
                            </table>
                        <?php
                    }
                ?>
               
                    </section>
                    <br>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center" style="width: 60rem;">

                    <?php 
              
                                

                                if( isset($_SESSION["productos_seleccionados"]) && !empty($_SESSION["productos_seleccionados"]) ){

                            ?>
              <!--       <a href="../Controlador/controlRegistrarCliente.php?op=contado" class="btn btn-primary">CONTADO</a> -->
                            <form action="getRegistrarVenta.php" method="POST">
                            <button type="submit" name="siguiente01" class="btn btn-primary">Siguiente</button>
                            </form>
                
                        
                <!--       <a href="controlRegistrarCliente.php?op=siguiente01" class="btn btn-primary">Siguiente</a> -->
                        <form action="getRegistrarVenta.php" method="post">
                            <button type="submit" name="cancelar" class="btn btn-secondary" <?php  echo isset($_SESSION["productos_seleccionados"]) ? "":"" ?>>Cancelar</button>
                        </form>
                        <?php 
                        
                        }
                
                        
                        ?>
                        
                        
                    </div><br><br>
                    <div></div>
                    
                            <div  class="card text-dark bg-light mb-3" style="width: 60rem;">
                            <div class="card-header fw-bold text-center">Lista de productos</div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <!-- <th>Imagen</th> -->
                                        <th>Accion</th>
                                    </tr>
                
                                </thead>
                                <tbody>
                                    <?php
                
                                   $total = 0;
                                    foreach ($productos as $producto) {
                                        
                                        echo "<form action='getRegistrarVenta.php' method=POST>
                                        <tr>
                                        <input name='idProducto' value='$producto[idproducto]' hidden>";
                                        echo "<td><input name='nombreProducto' value='$producto[nombre]' readonly class='form-control-sm border-0';' ></td>";
                                        echo "<td><input type=number name='precio' value=$producto[precio] readonly class='form-control-sm border-0';'></td>";
                                        echo "<td>" . $producto["descripcion"] . "</td>";
                                        echo "<td><input type=number name=cantidadProducto min=1 max=$producto[stock] value=1 class='form-control-sm border-0';'></td>";
                                        // echo "<td>" . $producto['imagen'] . "</td>";
                                        echo "<td><input type=submit value='agregar' class='btn btn-primary' name='agregar'></td>";
                                        echo "</tr>
                                        </form>";
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
</div>
</div>



                    
               
        

    <?php
        include_once("../shared/pie.php");
    }
    }

}

?>