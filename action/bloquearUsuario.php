<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/usuario.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idUsuario']) || $_SESSION['nombre'] != "Administrador") { 
        header("location:../view/index.php"); 
    }

    $UsuarioController = new UsuarioController();
    $Usuario = $UsuarioController->BloquearUsuario($_GET['idUsuario'], TRUE);
    if($Usuario) {
        echo("<script language='javascript'>window.location.href='../view/administrador.php'; alert('!Usuario bloqueado con exito¡')</script>");
    } else {
        echo("<script language='javascript'>window.location.href='../view/administrador.php'; alert('ERROR, El usuario no fue bloqueado')</script>");        
    }
    
?>