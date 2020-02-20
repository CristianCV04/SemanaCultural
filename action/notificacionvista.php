<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/notificacion.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idNotificacion'])) { 
        header("location:../view/index.php"); 
    }
    
    $NotificacionController = new NotificacionController();
    $Notificacion = $NotificacionController->NotificacionVista($_GET['idNotificacion']);
    $idEvento = $Notificacion->__GET('Evento_idEvento');
    if($Notificacion) {
        header("location:../view/verevento.php?idEvento=$idEvento");
    }
    
?>