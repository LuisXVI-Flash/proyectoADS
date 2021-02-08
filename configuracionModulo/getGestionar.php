<?php 
	require_once __DIR__."/controladorGestionarUsuario.php";

	if(isset($_POST["verificar_usuario"])) {
		$dni = (isset($_POST["dni"]) && !empty(trim($_POST["dni"]))) ? $_POST["dni"] : null;

		if(isset($dni)) {
			$controlador = new controladorGestionarUsuario();
			$controlador->verificar_dni(["dni"=> $dni]);
		}
		exit;
	}

	if(isset($_POST["contrasenia_usuario"])) {
		$dni = (isset($_POST["dni"]) && !empty(trim($_POST["dni"]))) ? $_POST["dni"] : null;
		$contrasenia_1 = (isset($_POST["contrasenia_1"]) && !empty(trim($_POST["contrasenia_1"]))) ? $_POST["contrasenia_1"] : null;
		$contrasenia_2 = (isset($_POST["contrasenia_2"]) && !empty(trim($_POST["contrasenia_2"]))) ? $_POST["contrasenia_2"] : null;

		if(isset($contrasenia_1) && isset($contrasenia_2) && isset($dni)) {

			if($contrasenia_1 !== $contrasenia_2) {
				session_start();
				$_SESSION["mensaje"] = "La contraseña es incorrecta, por favor verifique"; 
				$_SESSION["estado"] = true; 
				header('Location: '.$_SERVER['HTTP_REFERER']);
				exit();
			}

			$controlador = new controladorGestionarUsuario();
			$controlador->call_actualizar([
				"dni"=> $dni,
				"pasword" => md5($contrasenia_1)
			]);
		} else{ 
			include_once("../shared/formMensajeSistema.php");
			(new formMensajeSistema())->accesso_denegado();
		}
		exit;
	}

	if(isset($_POST["guardar_usuario"])) { // Botón

		$cargo = (isset($_POST["cargo"]) && !empty(trim($_POST["cargo"]))) ? $_POST["cargo"] : null;
		$dni = (isset($_POST["dni"]) && !empty(trim($_POST["dni"]))) ? $_POST["dni"] : null;
		$nombre = (isset($_POST["nombre"]) && !empty(trim($_POST["nombre"]))) ? $_POST["nombre"] : null;
		$apellido = (isset($_POST["apellido"]) && !empty(trim($_POST["apellido"]))) ? $_POST["apellido"] : null;
		$contrasenia_1 = (isset($_POST["contrasenia_1"]) && !empty(trim($_POST["contrasenia_1"]))) ? $_POST["contrasenia_1"] : null;
		$contrasenia_2 = (isset($_POST["contrasenia_2"]) && !empty(trim($_POST["contrasenia_2"]))) ? $_POST["contrasenia_2"] : null;
		$user_nick = (isset($_POST["user_nick"]) && !empty(trim($_POST["user_nick"]))) ? $_POST["user_nick"] : null;
		$email = (isset($_POST["email"]) && !empty(trim($_POST["email"]))) ? $_POST["email"] : null;
		$celular = (isset($_POST["celular"]) && !empty(trim($_POST["celular"]))) ? $_POST["celular"] : null;

		if(isset($cargo) && isset($nombre) &&  isset($dni) &&  isset($apellido) && isset($contrasenia_1) && isset($contrasenia_2) && isset($user_nick) && isset($email) && isset($celular)) {

			if($contrasenia_1 !== $contrasenia_2) { // Si la contraseña no es igual. retonamos mensaje
				session_start();
				$_SESSION["mensaje"] = "La contraseña es incorrecta, por favor verifique"; 
				$_SESSION["estado"] = true; 
				header('Location: '.$_SERVER['HTTP_REFERER']);
				exit();
			}

			$controlador = new controladorGestionarUsuario();
			$controlador->call_insertar([ // Llama a la función insertar usuario interno
				"idcargo" => (int)$cargo,
				"dni" => (int)$dni,
				"nombre" => $nombre,
				"apellido" => $apellido,
				"pasword" => md5($contrasenia_1),
				"usuario" => $user_nick,
				"email" => $email,
				"celular" => $celular
			]);
		} else {
			session_start();
			$_SESSION["estado"] = true; 
			$_SESSION["mensaje"] = "Completa los campos"; 
			header('Location: '.$_SERVER['HTTP_REFERER']);
			// include_once("../shared/formMensajeSistema.php");
			// (new formMensajeSistema())->accesso_denegado();
			exit();
		}

	} 
	// else {
	// 	// include_once("../shared/formMensajeSistema.php"); 
	// 	// (new formMensajeSistema())->accesso_denegado();
	// }


	// if(isset($_POST["guardar_boleta"])) {
	// 	$dni = (isset($_POST["dni"]) && !empty(trim($_POST["dni"]))) ? $_POST["dni"] : null;
	// 	$nombre = (isset($_POST["nombre"]) && !empty(trim($_POST["nombre"]))) ? $_POST["nombre"] : null;
	// 	$apellido = (isset($_POST["apellido"]) && !empty(trim($_POST["apellido"]))) ? $_POST["apellido"] : null;
	// 	$email = (isset($_POST["email"]) && !empty(trim($_POST["email"]))) ? $_POST["email"] : null;
	// 	$direccion = (isset($_POST["direccion"]) && !empty(trim($_POST["direccion"]))) ? $_POST["direccion"] : null;
	// 	$celular = (isset($_POST["celular"]) && !empty(trim($_POST["celular"]))) ? $_POST["celular"] : null;
	// 	$referencia = (isset($_POST["referencia"]) && !empty(trim($_POST["referencia"]))) ? $_POST["referencia"] : null;

	// 	if(isset($dni) && isset($nombre) && isset($apellido) && isset($email) && isset($direccion) && isset($celular) && isset($referencia)) {

	// 		$checks = (isset($_POST["check"]) && !empty(trim($_POST["check"]))) ? $_POST["check"] : null;

	// 		if(isset($checks)) {
				
	// 		}

	// 		$controlador = new controladorGestionarUsuario();
	// 		$controlador->call_registrar_cliente([ // Llama a la función insertar
	// 			"dni" => (int)$dni,
	// 			"nombre" => $nombre,
	// 			"apellido" => $apellido,
	// 			"email" => $email,
	// 			"direccion" => $direccion,
	// 			"celular" => $celular,
	// 			"referencia" => $referencia
	// 		]);
	// 	}
	// }
?>