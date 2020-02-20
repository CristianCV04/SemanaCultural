<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/mensajechat.controller.php');
    require_once('../controller/usuario.controller.php');
    if(empty($_SESSION['idUsuario'])) { 
        header("location:../view/index.php"); 
    }

    $MensajeChatController = new MensajeChatController();
    $UsuarioController = new UsuarioController();
    foreach($MensajeChatController->ListarMensajeChat() as $MsjChat) {
        $Usuario = $UsuarioController->VerUsuario($MsjChat->__GET('Usuario_idUsuario'));
        $idUsuario = $Usuario->__GET('idUsuario');
        $username = $Usuario->__GET('username');
        $mensaje = $MsjChat->__GET('mensaje');
        echo "<p><b><img class='img-responsive' src='assets/img/user/$idUsuario.jpg' style='width: 70px; height: 50px;'/> <h4 style='position:relative; margin-left: 80px; margin-top: -35px;'> $username dice:</h4></b></p><div style='width: 250px; margin-left:80px;'>$mensaje</div><br>";
    }
    
?>