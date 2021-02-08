<?php
    $view=$_GET['view'];
    switch($view){
        case 'nuevoResumen':
            session_start();
            
            $hoy = date("j");
            if($hoy==2){
                include_once("formNuevoResumen.php");
                $objForm = new formNuevoResumen;
                $objForm -> formNuevoResumenShow();
            }else{
                include_once("../shared/formMensajeSistema.php");
                $objMessaje = new formMensajeSistema;
                $objMessaje -> formMensajeSistemaShow("No corresponde crear un nuevo resumen","../ventasModule/getResumenVentas.php?view=editarResVen");
            }
            break;
        
        case 'resumenActual':
            session_start();
            include_once("formResumenActual.php");
            $objVista = new formResumenActual();
            $objVista->formResumenActualShow();
            break;

        case 'grabarNuevo':
            $dia = date('Y-m-d');
            $zonaVenta = $_POST['zonaVenta'];
            $cantLlevados = $_POST['prodEnviados'];
            $cantRetorn = $_POST['prodRetornados'];
            $cantPerdidos = $_POST['prodPerdidos'];
            $totalVentas = $_POST['prodVendidos'];
            $observaciones = $_POST['observaciones'];
            if($zonaVenta != NULL && $cantLlevados != NULL && $cantRetorn != NULL && $cantPerdidos != NULL && $totalVentas != NULL){
                include_once "../shared/formMensajeSistema.php";
                include_once "../model/entityResumenventa.php";
                
                $objAea = new entityResumenventa();
                $objAea -> agregarDatos($dia,$zonaVenta,$cantLlevados,$cantRetorn,$cantPerdidos,$totalVentas,$observaciones);
                $objMessaje = new formMensajeSistema;
                $objMessaje -> formMensajeSistemaShow("Datos guardados Satisfactoriamente","../ventasModule/controllerResumenVentas.php?view=resumenActual");
                
                


            }else{
                include_once("../shared/formMensajeSistema.php");
                $objMessaje = new formMensajeSistema;
                $objMessaje -> formMensajeSistemaShow("Por favor, ingrese datos validos","../ventasModule/controllerResumenVentas.php?view=nuevoResumen");
            }
            break;

        case 'nuevoActual':
            include_once("formNuevoResumen.php");
            $objForm = new formNuevoResumen;
            $objForm -> formNuevoResumenShow();
            break;

        case 'pdf':
            $objAeadatehoy = date("y-m-d");
            $datefinmes = date("Y-m-t", strtotime($date));
            if($datehoy==$datefinmes){
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
    

    }
?>