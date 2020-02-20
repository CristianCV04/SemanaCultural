<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/usuario.controller.php');
    require_once('../controller/restauracion.controller.php');
    require_once('../controller/visita.controller.php');
    require_once('../lib/phpmailer/class.phpmailer.php');
    require_once('../lib/phpmailer/class.smtp.php');

    if(empty($_POST['username'])) { 
        header("location:../view/index.php"); 
    }

    function generarLinkTemporal($idUsuario, $email) {
        $cadena = $idUsuario.$email.rand(1,9999999).date('Y-m-d');
        $token = sha1($cadena);
        $RestauracionController = new RestauracionController();
        $Restauracion = $RestauracionController->CrearRestauracion($idUsuario, $email, $token);
        if($Restauracion == TRUE) {
            $enlace = $_SERVER["SERVER_NAME"].'/SemanaCultural/action/confirmar.php?idUsuario='.$idUsuario.'&token='.$token;
            return $enlace;
        } else {
            return FALSE;
        }
    }
 
    function enviarEmail($email, $link){
        $correo = new PHPMailer();
        $correo->IsSMTP();
        $correo->SMTPAuth = true;
        $correo->SMTPSecure = 'tls';
        $correo->Host = "smtp.live.com";
        $correo->Port = 25;
        $correo->Username   = "andres-78961@hotmail.com";
        $correo->Password   = "cristiancv4";
        $correo->SetFrom("andres-78961@hotmail.com", "Confirmar Cuenta");
        $correo->AddReplyTo("andres-78961@hotmail.com", "Confirmar Cuenta");
        $correo->AddAddress($email, "U");
        $correo->Subject = ("Confirmar cuenta");
        $correo->MsgHTML('<p>Hemos recibido una petición para crear una cuenta nueva.</p>
            <p>Haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este mensaje.</p>
            <p><a href="'.$link.'"><strong>CONFIRMAR CUENTA</strong></a></p>');
        $correo->Timeout=30;
        $correo->CharSet = 'UTF-8';
        if(!$correo->Send()) {
            echo "ERROR: " . $correo->ErrorInfo;
        } else {
            echo "Mensaje enviado con exito.";
        }
    }

    $TipoUsuario_idTipoUsuario = $_POST['TipoUsuario_idTipoUsuario'];
	$nombres = $_POST['nombres'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $UsuarioController = new UsuarioController();
    $Usuario = $UsuarioController->CrearUsuario($TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $password, $email);
    if($Usuario) {
        $linkTemporal = generarLinkTemporal($Usuario->__GET('idUsuario'), $email);
        if($linkTemporal){
            enviarEmail($email, $linkTemporal);
        }
        if(!empty($_SESSION['idUsuario'])) {
            echo("<script language='javascript'>window.location.href='../view/administrador.php'; alert('!Usuario registrado con exito¡')</script>");
        } else {
            echo("<script language='javascript'>window.location.href='../view/index.php'; alert('!Usuario registrado con exito¡')</script>");
        }
    } else {
        if(!empty($_SESSION['idUsuario'])) {
            echo("<script language='javascript'>window.location.href='../view/administrador.php'; alert('ERROR, El usuario no fue registrado')</script>");
        }
        echo("<script language='javascript'>window.location.href='../view/registro.php'; alert('ERROR, El usuario no fue registrado')</script>");
    }

?>