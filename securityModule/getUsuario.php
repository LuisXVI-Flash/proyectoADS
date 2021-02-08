
<?php
//getUsuario.php
session_start();

if (isset($_SESSION) && isset($_SESSION["idcargo"]) && isset($_SESSION["nombreCargo"]) && ($_SESSION["nombreCargo"] === "Administrador" && $_SESSION["idcargo"] == 1)) {
    include_once("formBienvenida.php");
    $objBienvenida = new formBienvenida;
    $objBienvenida -> formBienvenidaShow();
    exit;
}

if(isset($_POST['bntAceptar'])){
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    
    $md5 = md5($password);
    if(strlen($login)!=0 or strlen($password)!=0){
        include_once("./controllerIdentificarUsuario.php");
        $objControlAcceso = new controllerIdentificarUsuario;
        $objControlAcceso -> verificarUsuario($login,$md5);
    }else{
        include_once("../shared/formMensajeSistema.php");
        $objMessaje = new formMensajeSistema;
        $objMessaje -> formMensajeSistemaShow("Los datos ingresados no son validos","../index.php");
    }
}else{
    include_once("../shared/formMensajeSistema.php");
    $objMessaje = new formMensajeSistema;
    $objMessaje -> formMensajeSistemaShow("Se ha detectado un acceso no autorizado","../index.php");
}

?>