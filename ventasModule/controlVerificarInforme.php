<?php
class controlVerificarInforme
{
	public function validarBotonVerificarInforme()
	{
		include_once("../model/entidadverificarInforme.php");
		$objComanda = new verificarInforme;
		$respuesta = $objComanda -> obtenerDatosInforme();
		
	}
	public function ValidarBotonVerInforme($idinforme)
	{
		include_once("../model/entidadOrden.php");
		$objboleta = new Orden;
		$respuesta = $objboleta -> obtenerDatosInforme($idinforme);
		include_once("formListaOrden.php");
		$variable = new formListaOrden();
		$variable -> formListaOrdenesShow($respuesta,$idinforme);

	}
	public function ValidarBotonInformeAceptado($idinforme)
	{
		include_once("../model/entidadverificarInforme.php");
		$objorden = new  verificarInforme;
		$respuesta = $objorden -> cambiarEstadoInformeAceptado($idinforme);
		

	}
	public function ValidarBotonInformeObservado($idinforme)
	{
		include_once("../model/entidadverificarInforme.php");
		$objorden = new  verificarInforme;
		$respuesta = $objorden -> cambiarEstadoInformeObservado($idinforme);
	}

}
?>