<?php

class Conexion
{
	static private $instancia = null;

	static public function obtenerConexion()
	{
		if ( self::$instancia == null )
		{
			self::$instancia = new mysqli("localhost","root","","dibruesma2");
		}

		return self::$instancia;
	}
	protected function conectar()
	{
		$con = mysqli_connect($this -> server,$this -> user,$this -> pass,$this -> bd) or die ("no se pudo");
		return $con;
		//mysqli_select_db($this -> bd,$con);
	}
	private $conexion;
	public function __construct(){
        $this->conexion = mysqli_connect("localhost","root","","dibruesma2");
    }

    public function get(){
        return $this->conexion;
    }
    public function close(){
        mysqli_close($this->conexion);
    }

    public function query($sql){
        return mysqli_query($this->get(),$sql);  
    }
}

$instancia=mysqli_connect("localhost","root","","dibruesma2");

?>