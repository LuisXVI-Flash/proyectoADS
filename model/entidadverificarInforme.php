<?php
include_once("conexion.php");
class verificarInforme extends conexion
{
	public function obtenerDatosInforme()
	{
		$consulta = "select *, if(estado LIKE '1','Aceptado',IF(estado LIKE '0','Observado','Vacio')) as mensaje_estado from informe;";
		$conexion = $this -> obtenerConexion();
		$resultado = $conexion -> query($consulta);
		$conexion -> close();
			return $resultado -> fetch_all();
	}

	public function cambiarEstadoInformeAceptado($idinforme)
	{
		$consulta = "UPDATE informe SET estado = '1' WHERE idinforme='$idinforme'";
		$conexion = $this -> obtenerConexion();
		$resultado = $conexion -> query($consulta);
		$conexion -> close();
	}
	public function cambiarEstadoInformeObservado($idinforme)
	{
		$consulta = "UPDATE informe SET estado = '0' WHERE idinforme='$idinforme'";
		$conexion = $this -> obtenerConexion();
		$resultado = $conexion -> query($consulta);
		$conexion -> close();
	}
	
}
?>