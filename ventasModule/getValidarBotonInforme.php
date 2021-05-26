<?php
if (isset($_POST["btnInformeAceptado"])) {
	session_start();
		
	//echo "Informe Aceptado";
	$idinforme = $_GET["idinforme"];
	include_once("controlVerificarInforme.php");
	$accesoVer = new controlVerificarInforme;
	$accesoVer->ValidarBotonInformeAceptado($idinforme);
	include_once("../shared/formMensaje.php");
	$nuevoMensaje = new formMensaje;
	$nuevoMensaje->formMensajeShow("El informe $idinforme ha sido Aceptado","");
} else {
	if (isset($_POST["btnInformeObservado"])) {
		session_start();
		
		$idinforme = $_GET["idinforme"];
		//echo "Informe Observado $idinforme";
		include_once("controlVerificarInforme.php");
		$accesoVer = new controlVerificarInforme;
		$accesoVer->ValidarBotonInformeObservado($idinforme);
		include_once("../shared/formMensaje.php");
		$nuevoMensaje = new formMensaje;
		$nuevoMensaje->formMensajeShow("El informe $idinforme ha sido Observado","");
		
	}else{
		if (isset($_POST["btnAtras"])) {
			session_start();
			include_once("formListaInforme.php");
			$objForm = new formListaInforme;
			$objForm->formListaInformeShow();
		} 
		else{
			include_once("../shared/formMensajeSistema.php");
		$objMessaje = new formMensajeSistema;
		$objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
		}
	}
}
