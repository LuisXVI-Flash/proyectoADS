<?php  
	
	
	
	require_once __DIR__."/../model/entityTrabajador.php";

//session_destroy();
		

	class controladorGestionarUsuario
	{
		
		private $trabajador, $cliente;

		function __construct()
		{
			$this->trabajador = new entityTrabajador();
			$this->cliente = new entityTrabajador();
		}

		public function verificar_dni($data){
			$result = $this->trabajador->verificar_usuario_dni($data);
			$result = json_decode($result);
			session_start();
			if(!$result->estado) {
				$_SESSION["estado"] = $result->estado;
				$_SESSION["mensaje"] = $result->mensaje;
				header("Location: ./formGestionar.php");
			}
			else {
				$_SESSION["dni"] = $result->dni;
				header("Location: ./formNuevaContrasenia.php");
			}
		}

		public function call_insertar($data)
		{
			$result = $this->trabajador->registrarTrabajador($data);

			$result = json_decode($result);
			session_start();
			$_SESSION["estado"] = $result->estado;
			$_SESSION["mensaje"] = $result->mensaje;
			header("Location: ./formGestionar.php");
		}

		public function call_actualizar($data)
		{
			$result = $this->trabajador->actualizar_trabajador($data);
			$result = json_decode($result);
			session_start();
			$_SESSION["estado"] = $result->estado;
			$_SESSION["mensaje"] = $result->mensaje;
			if($result->estado) {
				unset($_SESSION["dni"]);
				header("Location: ./formGestionar.php");
			}
			else {
				header("Location: ./formNuevaContrasenia.php");
			}
		}

	
	}
?>