<?php
    $view=$_GET['view'];

    if(isset($_POST['btnNuevoResumen'])){
        session_start();
            
        $hoy = date("j");
        if($hoy!=1){
            include_once("formNuevoResumen.php");
            $objForm = new formNuevoResumen;
            $objForm -> formNuevoResumenShow();
        }else{
            include_once("../shared/formMensajeSistema.php");
            $objMessaje = new formMensajeSistema;
            $objMessaje -> formMensajeSistemaShow("No corresponde crear un nuevo resumen","../ventasModule/getResumenVentas.php?view=editarResVen");
        }
    }else if(isset($_POST['btnResumenActual'])){
        session_start();
        include_once("formResumenActual.php");
        include_once("../model/entityResumenventa.php");
        $objArray = new entityResumenventa();
        $efe=$objArray->listarResumenes();
        $objVista = new formResumenActual();
        $objVista->formResumenActualShow($efe);
        
    }else if(isset($_POST['bntAceptar'])){
        $dia = date('Y-m-d');
        $zonaVenta = $_POST['zonaVenta'];
        $cantLlevados = $_POST['prodEnviados'];
        $cantRetorn = $_POST['prodRetornados'];
        $cantPerdidos = $_POST['prodPerdidos'];
        $totalVentas = $_POST['prodVendidos'];
        $observaciones = $_POST['observaciones'];
        if($zonaVenta != NULL && $cantLlevados != NULL && $cantRetorn != NULL && $cantPerdidos != NULL && $totalVentas != NULL){
            if(ctype_digit($cantLlevados) && ctype_digit($cantRetorn) && ctype_digit($cantPerdidos) && ctype_digit($totalVentas)){
                if($cantLlevados>$cantRetorn && $cantLlevados>$cantPerdidos){
                    include_once "../shared/formMensajeSistema.php";
                    include_once "../model/entityResumenventa.php";
                
                    $objAea = new entityResumenventa();
                    $objAea -> agregarDatos($dia,$zonaVenta,$cantLlevados,$cantRetorn,$cantPerdidos,$totalVentas,$observaciones);
                    $objMessaje = new formMensajeSistema;
                    $objMessaje -> formMensajeSistemaShow1("Datos guardados Satisfactoriamente","../ventasModule/controllerResumenVentas.php","btnResumenActual");
                }else{
                    include_once("../shared/formMensajeSistema.php");
                    $objMessaje = new formMensajeSistema;
                    $objMessaje -> formMensajeSistemaShow1("La cantidad de productos llevados no puede ser menor.","../ventasModule/controllerResumenVentas.php","btnNuevoResumen");
                }
            }else{
                include_once("../shared/formMensajeSistema.php");
                $objMessaje = new formMensajeSistema;
                $objMessaje -> formMensajeSistemaShow1("Por favor, ingrese numeros mayores a cero.","../ventasModule/controllerResumenVentas.php","btnNuevoResumen");
            }
        }else{
            include_once("../shared/formMensajeSistema.php");
            $objMessaje = new formMensajeSistema;
            $objMessaje -> formMensajeSistemaShow1("Por favor, ingrese datos validos","../ventasModule/controllerResumenVentas.php","btnNuevoResumen");
        }
    }else if(isset($_POST['Regresar'])){
        session_start();
        include_once("formResumenVentas.php");
        $objForm = new formResumenVentas;
        $objForm -> formResumenVentasShow();
    }else if(isset($_POST['generarPDF'])){
        $objAeadatehoy = date("y-m-d");
        $datefinmes = date("Y-m-t", strtotime($date));
        if($datehoy!=$datefinmes){
            include_once("../model/entityResumenventa.php");
            include_once("formBalancePDF.php");
            $objBalance=new entityResumenventa();
            $array = $objBalance->listarbalance();
    
                    
            $objForm = new formBalancePDF();
            $objForm->formBalancePDFShow($array);  
        }else{
            include_once("../shared/formMensajeSistema.php");
            $objMessaje = new formMensajeSistema;
            $objMessaje -> formMensajeSistemaShow("No corresponde crear balance de cobranza","../ventasModule/controllerResumenVentas.php?view=resumenActual");
        }
    }else if(isset($_POST['agregarR'])){
        include_once("formNuevoResumen.php");
        $objForm = new formNuevoResumen;
        $objForm -> formNuevoResumenShow();
    }else{
        include_once("../shared/formMensajeSistema.php");
        $objMessaje = new formMensajeSistema;
        $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
    }
?>