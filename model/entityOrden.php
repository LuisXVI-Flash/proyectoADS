<?php
include_once("conexion.php");
class entityOrden extends Conexion
{

    //public $cont=0;

    public function setCont($cont)
    {
        $this->_cont = $cont;
    }

    public function getCont()
    {
        return $this->_cont;
    }



    public function EOrden()
    {
        $this->conectar();
    }

    public function listartrabajador()
    {
        $conexion = Conexion::obtenerConexion();
        $resultadoc = mysqli_query($conexion, "SELECT *  FROM trabajador");
        while ($consultac = mysqli_fetch_array($resultadoc)) {
            $idtrabajadr = $consultac['idtrabajador'];
            $nombres = $consultac['nombre'];
            $apes = $consultac['apellido'];
?>
            <option value="<?php echo $idtrabajadr ?>" ><?php echo $nombres . " " . $apes ?></option>

        <?php }
    }



    public function listarorden()
    {

        $idorden = "";
        $codigo = "";
        $fechaventa = "";
        $montototal = "";
        $estado = "";
        $tipoorden = "";
        $idcliente = "";
        $vendedor = "";

        $idtrabajadr = "";
        $nombres = "";
        $apes = "";

        $boton = "";

        $cont = 0;
        $ga = "";

        $array = array("");



        $instancia = Conexion::obtenerConexion();
        $resultadoa = mysqli_query($instancia, "SELECT *  FROM orden WHERE estado = 0");
        $resultadoc = mysqli_query($instancia, "SELECT *  FROM trabajador WHERE idcargo=3");
        
        while ($consultaa = mysqli_fetch_array($resultadoa)) {
            $estado = $consultaa['estado'];
            $idorden = $consultaa['idorden'];
            $codigo = $consultaa['codigo'];
            $fechaventa = $consultaa['fechaventa'];
            $diavisita = $consultaa['diavisita'];
            $pagosemanal = $consultaa['pagosemanal'];
            $cantidadcuotas = $consultaa['cantidadcuotas'];
            $montototal = $consultaa['montototal'];
            $tipoorden = $consultaa['tipoorden'];
            $idcliente = $consultaa['idcliente'];
            $vendedor = $consultaa['vendedor'];

            $resultadob = mysqli_query($instancia, "SELECT *  FROM trabajador WHERE idcargo=3");
            $consultab = mysqli_fetch_array($resultadob);
            $nombret = $consultab['nombre'];
            $apet = $consultab['apellido'];

            

            $cont = $cont + 1;

        ?>
            <tr>
            
                <td scope="row"><?php echo $codigo ?></td>
                <td scope="row"><?php echo $fechaventa ?></td>
                <td scope="row"><?php echo $montototal ?></td>
                <td scope="row"><?php echo $estado ?></td>
                <td scope="row"><?php echo $tipoorden ?></td>
                <td scope="row"><?php echo $idcliente ?></td>
                <td scope="row"><?php echo $vendedor ?></td>




                <td scope="row">
                    <input type="submit" name="btnAsignar<?php echo $cont ?>" value="Enviar" class="btn btn-primary">
                </td>

                <?php
                array_push($array, $idorden);

                ?>
                <td scope="row">
                    <input type="submit" name="btnAnular<?php echo $cont ?>" value="Anular"  class="btn btn-secondary">
                </td>
            </tr>

        <?php


        }




        ?>
       <br><div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <input class="btn btn-primary me-md-2" type="submit" name="btnActualizar" value="Actualizar"> </td>
        </div><br>
        <?php ?>
        <select name="miselect" class="form-select me-md-2 justify-content-md-center" style="width: 50%;">
            <?php while ($consultac = mysqli_fetch_array($resultadoc)) {
                $idtrabajadr = $consultac['idtrabajador'];
                $nombres = $consultac['nombre'];
                $apes = $consultac['apellido'];
            ?>
                <option class="btn btn-light dropdown-toggle" value="<?php echo $idtrabajadr ?>"><?php echo $nombres . " " . $apes ?></option>

            <?php } ?>

        </select><br>
       
        </table>

        </form>


        <?php
        //obtener odorden de la fila que se apreto el boton
        for ($i = 1; $i <= $cont; $i++) {

            $ga = "btnAsignar" . $i;
            if ($_REQUEST[$ga]) {
                echo "...." . $array[$i];
                $gg = 2;

                //obtener trabajadr que se eligio en comobobox al apretar boton
                if (isset($_POST["miselect"])) {

                    $boton = $_POST['miselect'];
                    echo "estas aca" . $boton;

                    include_once('../model/conexion.php');
                    $resultadod = mysqli_query($instancia, "UPDATE orden SET vendedor=$boton WHERE idorden=$array[$i]");
                    mysqli_fetch_array($resultadod);
                }
            }
            if ($_REQUEST["btnAnular" . $i]) {
                echo "se anulo el " . $array[$i];
                include_once('../model/conexion.php');
                $resultadof = mysqli_query($instancia, "UPDATE orden SET vendedor=NULL WHERE idorden=$array[$i]");
                mysqli_fetch_array($resultadof);
            }
        }
    }
























    public function listarOrdenTrabajador()
    {


        $array = array("");
        $cont = 0;

        $a = $_SESSION['trabajador'];
        $instancia = Conexion::obtenerConexion();
        $resultadog = mysqli_query($instancia, "SELECT *  FROM trabajador WHERE nombre ='$a'");
        $consultag = mysqli_fetch_array($resultadog);
        $b = $consultag['idtrabajador'];



        $resultadoa = mysqli_query($instancia, "SELECT *  FROM orden WHERE vendedor =$b");

        while ($consultaa = mysqli_fetch_array($resultadoa)) {
            $estado = $consultaa['estado'];
            $idorden = $consultaa['idorden'];
            $codigo = $consultaa['codigo'];
            $fechaventa = $consultaa['fechaventa'];
            $diavisita = $consultaa['diavisita'];
            $pagosemanal = $consultaa['pagosemanal'];
            $cantidadcuotas = $consultaa['cantidadcuotas'];
            $montototal = $consultaa['montototal'];
            $tipoorden = $consultaa['tipoorden'];
            $idcliente = $consultaa['idcliente'];

            $resultadob = mysqli_query($instancia, "SELECT *  FROM trabajador WHERE idtrabajador=1");
            $consultab = mysqli_fetch_array($resultadob);
            $nombret = $consultab['nombre'];
            $apet = $consultab['apellido'];

            $resultadoc = mysqli_query($instancia, "SELECT *  FROM trabajador");

            $cont = $cont + 1;

        ?>
        
            <tr>
                <td scope="row"><?php echo $codigo ?></td>
                <td scope="row"><?php echo $fechaventa ?></td>
                <td scope="row"><?php echo $montototal ?></td>
                <?php 
                if($estado==0)
                {
                    $estado="Pendiente";
                }
                else{
                    $estado="Entregado";
                }

                ?>


                <td scope="row"><?php echo $estado ?></td>


                <td scope="row"><?php echo $tipoorden ?></td>
                <td scope="row"><?php echo $idcliente ?></td>




                <td scope="row">
                    <input type="submit" name="btnEntregado<?php echo $cont ?>" value="Entregado" class="btn btn-primary">
                </td>

                <?php
                array_push($array, $idorden);

                ?>
                <td scope="row">
                    <input type="submit" name="btnPendiente<?php echo $cont ?>" value="Pendiente" class="btn btn-secondary">
                </td>
            </tr>

            <?php

            

            ?>

<?php


        }
?>
        <input type="submit" name="btnActualizar" value="Actualizar" class="btn btn-primary"> </td>

        <?php

for ($i = 1; $i <= $cont; $i++) {

                $ga = "btnEntregado" . $i;
                if ($_REQUEST[$ga]) {

              

                        include_once('../model/conexion.php');
                        $resultadod = mysqli_query($instancia, "UPDATE orden SET estado=1 WHERE idorden=$array[$i]");
                        mysqli_fetch_array($resultadod);
                    
                }

                if ($_REQUEST["btnPendiente" . $i]) {
                    include_once('../model/conexion.php');
                    $resultadof = mysqli_query($instancia, "UPDATE orden SET estado=0 WHERE idorden=$array[$i]");
                    mysqli_fetch_array($resultadof);
                }
            }





    }
}


?>