<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/pasopaso.controller.php');
    require_once('../controller/favorito.controller.php');
    require_once('../controller/notificacion.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_POST['Evento_idEvento']) || $_SESSION['nombre'] != "Auxiliar") { 
        header("location:../view/index.php"); 
    }

    $Evento_idEvento = $_POST['Evento_idEvento'];
    $tiempo = $_POST['tiempo'];
    $descripcion = $_POST['descripcion'];
    $PasoPasoController = new PasoPasoController();
    $PasoPaso = $PasoPasoController->CrearPasoPaso($Evento_idEvento, $descripcion, $tiempo);
    if($PasoPaso) {
        $FavoritoController = new FavoritoController();
        $NotificacionController = new NotificacionController();
        foreach($FavoritoController->ListarFavoritoByEvento($Evento_idEvento) as $Favorito) {
            $NotificacionController->CrearNotificacion($Favorito->__GET('Usuario_idUsuario'), $Evento_idEvento, $PasoPaso->__GET('idPasoPaso'));
        }
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('!Paso creado con exito¡')</script>");    
    } else {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('ERROR, El paso no fue creado')</script>");
    }
    

?>