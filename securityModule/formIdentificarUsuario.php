<?php
//formAutenticarUsuario.php
class formIdentificarUsuario
{
    public function formIdentificarUsuarioShow()
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dibruesma E.I.R.L.</title>
</head>
<body>
	<?php 
			session_start();
			// print_r($_SESSION);
			session_destroy(); 
	?>
	<form name="form1" method="post" action="securityModule/getUsuario.php">
		<div class="login">
				<div class="login-screen">
					<div class="app-title">
						<h1>Iniciar sesión</h1>
					</div>
					<div class="login-form">
						<div class="control-group">
						<input type="text" class="login-field" placeholder="usuario" name="login" id="login">
						<label class="login-field-icon fui-user" for="login-name"></label>
						</div>
						<div class="control-group">
						<input type="password" class="login-field" placeholder="contraseña" name="password"  id="password">
						<label class="login-field-icon fui-lock" for="login-pass"></label>
						</div>
						<input class="btn btn-primary btn-large btn-block" type="submit" id="bntAceptar" name="bntAceptar" value="Ingresar">
					</div>
				</div>
		</div>
	</form>
</body>
</html>
<?php		
}
}
?>        