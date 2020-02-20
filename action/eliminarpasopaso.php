<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/pasopaso.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idPasoPaso']) || $_SESSION['nombre'] != "Auxiliar") { 
        header("location:../view/index.php"); 
    }

    $PasoPasoController = new PasoPasoController();
    $PasoPaso = $PasoPasoController->EliminarPasoPaso($_GET['idPasoPaso']);
    if($PasoPaso == TRUE) {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('!Paso eliminado con exito¡')</script>");
    } else {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('ERROR, El paso no fue eliminado')</script>");
    }
    
?>