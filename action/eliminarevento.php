<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/evento.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idEvento']) || $_SESSION['nombre'] != "Auxiliar") { 
        header("location:../view/index.php"); 
    }

    $EventoController = new EventoController();
    $Evento = $EventoController->EliminarEvento($_GET['idEvento']);
    if($Evento == TRUE) {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('!Evento eliminado con exito¡')</script>");
    } else {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('ERROR, El evento no fue eliminado')</script>");
    }
    
?>