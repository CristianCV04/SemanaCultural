<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/comentario.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_POST['comentario'])) { 
        header("location:../view/index.php"); 
    }

	$Evento_idEvento = $_POST['Evento_idEvento'];
    $comentario = $_POST['comentario'];
    $ComentarioController = new ComentarioController();
    $Comentario = $ComentarioController->CrearComentario($_SESSION['idUsuario'], $Evento_idEvento, $comentario);
    if($Comentario) {
        echo("<script language='javascript'>window.location.href='../view/verevento.php?idEvento=$Evento_idEvento'; alert('!Comentario insertado exitosamente¡')</script>");    
    } else {
        echo("<script language='javascript'>window.location.href='../view/verevento.php?idEvento=$Evento_idEvento'; alert('ERROR, El comentario no se ingreso')</script>");
    }
    

?>