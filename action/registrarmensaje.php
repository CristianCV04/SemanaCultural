<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/mensajechat.controller.php');
    if(empty($_SESSION['idUsuario'])) { 
        header("location:../view/index.php"); 
    }
    $Usuario_idUsuario = $_POST['Usuario_idUsuario'];
    $Chat_idChat = $_POST['Chat_idChat'];
    $mensaje = $_POST['mensaje'];

    $MensajeChatController = new MensajeChatController();
    $MensajeChatController->CrearMensajeChat($Usuario_idUsuario, $Chat_idChat, $mensaje);

    
?>