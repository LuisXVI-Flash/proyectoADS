<?php
include_once("conexion.php");
class Orden extends conexion
{
	public function obtenerDatosInforme($idinforme)
	{
		$consulta = "SELECT DISTINCT o.idorden, o.montototal FROM orden o,  detalleinforme d, informe i WHERE d.idinforme= '$idinforme' AND o.idorden= d.idorden ";
		$conexion = $this -> obtenerConexion();
		$resultado = $conexion -> query($consulta);
		$conexion -> close();
			return $resultado -> fetch_all();
	}
}
?>