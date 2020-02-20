<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/evento.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_POST['nombre']) || $_SESSION['nombre'] != "Auxiliar") { 
        header("location:../view/index.php"); 
    }

    $Programacion_idProgramacion = 1;
    $Lugar_idLugar = $_POST['Lugar_idLugar'];
	$nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $inicio = $_POST['inicio']." ".$_POST['inicio1'];
    $fin = $_POST['fin']." ".$_POST['fin1'];
    $EventoController = new EventoController();
    $Evento = $EventoController->CrearEvento($Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin);
    if($Evento) {
        
        $foto = $Evento->__GET('idEvento').'.jpg';
        move_uploaded_file($_FILES['Foto']['tmp_name'], '../view/assets/img/evento/'.$foto);
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('!Evento creado con exito¡')</script>");    
    } else {
        echo("<script language='javascript'>window.location.href='../view/auxiliar.php'; alert('ERROR, El evento no fue creado')</script>");
    }
    

?>