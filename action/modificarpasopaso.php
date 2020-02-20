<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php
    
    session_start();
    require_once('../controller/pasopaso.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_POST['idPasoPaso']) || $_SESSION['nombre'] != "Auxiliar") { 
        header("location:../view/index.php"); 
    }

    $idPasoPaso = $_POST['idPasoPaso'];
    $Evento_idEvento = $_POST['Evento_idEvento'];
	$tiempo = $_POST['tiempo'];
    $descripcion = $_POST['descripcion'];
    $PasoPasoController = new PasoPasoController();
    $PasoPaso = $PasoPasoController->ModificarPasoPaso($idPasoPaso, $Evento_idEvento, $descripcion, $tiempo);
    if($PasoPaso) {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('!Paso modificado con exito¡')</script>");
    } else {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('ERROR, El paso no se modifico')</script>");
    }

?>