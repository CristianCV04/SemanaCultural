<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php
    
    session_start();
    require_once('../controller/usuario.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_POST['idUsuario']) || $_SESSION['nombre'] != "Administrador") { 
        header("location:../view/index.php"); 
    }

    $idUsuario = $_POST['idUsuario'];
    $TipoUsuario_idTipoUsuario = $_POST['TipoUsuario_idTipoUsuario']; 
    $nombres = $_POST['nombres'];
    $apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $UsuarioController = new UsuarioController();
    $usuario = $UsuarioController->ModificarUsuario($idUsuario, $TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $email);
    if($usuario) {
        echo("<script language='javascript'>window.location.href='../view/administrador.php'; alert('!Usuario modificado con exito¡')</script>");
    } else {
        echo("<script language='javascript'>window.location.href='../view/administrador.php'; alert('ERROR, El usuario no se modifico')</script>");
    }

?>