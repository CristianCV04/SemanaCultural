<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php

    session_start();
    require_once('../controller/usuario.controller.php');
    require_once('../controller/tipousuario.controller.php');
    require_once('../controller/visita.controller.php');
    if(empty($_POST['username'])) { 
        header("location:../view/index.php"); 
    }
    
    $UsuarioController = new UsuarioController();
    $username = $_POST['username'];
    if($Usuario = $UsuarioController->VerUsuarioByUsername($username)) {
        if($Usuario->__GET('password') == $_POST['password']) {
            if($Usuario->__GET('bloqueado') == TRUE) {
                echo("<script language='javascript'>window.location.href='../view/login.php'; alert('El Usuario $username esta Bloqueado')</script>");
            } elseif($Usuario->__GET('confirmado') == FALSE) {
                echo("<script language='javascript'>window.location.href='../view/login.php'; alert('El Usuario $username no ha confirmado el email')</script>");
            } else {
                $TipoUsuarioController = new TipoUsuarioController();
                $TipoUsuario = $TipoUsuarioController->VerTipoUsuario($Usuario->__GET('TipoUsuario_idTipoUsuario'));
                $VisitaController = new VisitaController();
                $VisitaController->CrearVisita($Usuario->__GET('idUsuario'));
                $_SESSION['idUsuario'] = $Usuario->__GET('idUsuario');
                $_SESSION['username'] = $Usuario->__GET('username');
                $_SESSION['nombre'] = $TipoUsuario->__GET('nombre');
                $_SESSION['nombres'] = $Usuario->__GET('nombres');
                $_SESSION['apellido1'] = $Usuario->__GET('apellido1');
                $_SESSION['apellido2'] = $Usuario->__GET('apellido2');
                $_SESSION['email'] = $Usuario->__GET('email');
                if($TipoUsuario->__GET('nombre') == "Administrador") {
                    header("location:../view/administrador.php");
                } elseif($TipoUsuario->__GET('nombre') == "Auxiliar") {
                    header("location:../view/auxiliar.php");
                } else {
                    header("location:../view/index.php");
                }   
            }
        } else {
            echo("<script language='javascript'>window.location.href='../view/login.php'; alert('ERROR, la contraseña no es valida')</script>");
        }       
    } else {
        echo("<script language='javascript'>window.location.href='../view/login.php'; alert('ERROR, el usuario $username no existe')</script>");
    }
    
?> 	