<?php
class formAsignarOrdenOnline
{
    public function formAsignarOrdenOnlineShow()
    {
        include_once("../securityModule/formBienvenida.php");
        $obj = new formBienvenida();
        $obj->formBienvenidaShow();

        echo "si se pudo busdfrro";
        $idorden = "";
        $codigo = "";
        $fechaventa = "";
        $diavisita = "";
        $pagosemanal = "";
        $cantidadcuotas = "";
        $montototal = "";
        $estado = "";
        $tipoorden = "";
        $idcliente = "";
        $vendedor = "";

        $nombret = "";
        $apet = "";

        $idtrabajadr = "";
        $nombres = "";
        $apes = "";

        $boton = "";

        $cont = 0;

        $press = "";
        $ga = "";

        $array = array("");



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

            <title>Document</title>
        </head>

        <body>



            <h1>Asignar orden online</h1>
            <div align="center">
                <form method="POST" action="../ventasModule/getAsignarOrdenOnline.php?view=asignarordenonline">
                    <table class="table">
                        <tr>
                            <th>id orden</th>
                            <th>codigo</th>
                            <th>fecha venta</th>
                            <th>dia visita</th>
                            <th>pago semanal</th>
                            <th>cantidad cuotas</th>
                            <th>monto total</th>
                            <th>estado</th>
                            <th>tipo orden</th>
                            <th>id cliente</th>
                            <th>vendedor</th>
                            <th>boton asignar</th>
                            <th>boton anular</th>

                        </tr>


                        <?php
                        include_once('../model/conexion.php');
                        $resultadoa = mysqli_query($instancia, "SELECT *  FROM orden WHERE estado = 0");

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

                            $resultadob = mysqli_query($instancia, "SELECT *  FROM trabajador WHERE idtrabajador=1");
                            $consultab = mysqli_fetch_array($resultadob);
                            $nombret = $consultab['nombre'];
                            $apet = $consultab['apellido'];

                            $resultadoc = mysqli_query($instancia, "SELECT *  FROM trabajador");

                            $cont = $cont + 1;

                        ?>
                            <tr>
                                <td scope="row"><?php echo $idorden ?></td>
                                <td scope="row"><?php echo $codigo ?></td>
                                <td scope="row"><?php echo $fechaventa ?></td>
                                <td scope="row"><?php echo $diavisita ?></td>
                                <td scope="row"><?php echo $pagosemanal ?></td>
                                <td scope="row"><?php echo $cantidadcuotas ?></td>
                                <td scope="row"><?php echo $montototal ?></td>
                                <td scope="row"><?php echo $estado ?></td>
                                <td scope="row"><?php echo $tipoorden ?></td>
                                <td scope="row"><?php echo $idcliente ?></td>
                                <td scope="row"><?php echo $vendedor ?></td>




                                <td scope="row">
                                    <input type="submit" name="btnAsignar<?php echo $cont ?>" value="Enviar"> </td>

                                    <?php
                                    array_push($array, $idorden);

                                    ?>
                                <td scope="row">
                                    <input type="submit" name="btnAnular<?php echo $cont ?>" value="Anular"> </td>
                            </tr>

                        <?php


                        }




                        ?>

                        <select name="miselect">
                            <?php while ($consultac = mysqli_fetch_array($resultadoc)) {
                                $idtrabajadr = $consultac['idtrabajador'];
                                $nombres = $consultac['nombre'];
                                $apes = $consultac['apellido'];
                            ?>
                                <option value="<?php echo $idtrabajadr ?>"><?php echo $nombres . " " . $apes ?></option>

                            <?php } ?>

                        </select>

                        <input type="submit" name="btnActualizar" value="Actualizar"> </td>

                    </table>

                </form>


                <?php
                //obtener odorden de la fila que se apreto el boton
                for ($i = 1; $i <= $cont; $i++) {

                    $ga = "btnAsignar" . $i;
                    if ($_REQUEST[$ga]) {
                        echo "...." . $array[$i];


                        //obtener trabajadr que se eligio en comobobox al apretar boton
                        if (isset($_POST["miselect"])) {
                            $boton = $_POST['miselect'];
                            echo "estas aca" . $boton;

                            include_once('../model/conexion.php');
                            $resultadod = mysqli_query($instancia, "UPDATE orden SET vendedor=$boton WHERE idorden=$array[$i]");
                            mysqli_fetch_array($resultadod);
                        }

                     
                    }

                    if($_REQUEST["btnAnular".$i]){
                        echo "se anulo el ".$array[$i];
                        include_once('../model/conexion.php');
                            $resultadof = mysqli_query($instancia, "UPDATE orden SET vendedor=NULL WHERE idorden=$array[$i]");
                            mysqli_fetch_array($resultadof);
                    }




                }






                ?>
            </div>


        </body>

        </html>


<?php
        include("../shared/pie.php");
    }
}
?>