<?php

    session_start();
    require_once('../controller/restauracion.controller.php');
    require_once('../controller/usuario.controller.php');
    $token = $_GET['token'];
    $idUsuario = $_GET['idUsuario'];
    if($idUsuario != "" && $token != "") {
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Confirmar Cuenta</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container" role="main">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php
                    $RestauracionController = new RestauracionController();
                    $Restauracion = $RestauracionController->VerRestauracion($token);
                    if($Restauracion) {
                        if($Restauracion->__GET('Usuario_idUsuario') == $idUsuario) {
                            $UsuarioController = new UsuarioController();
                            $UsuarioController->ConfirmarUsuario($idUsuario);
                            $RestauracionController->EliminarRestauracion($token);
                echo("<script language='javascript'>window.location.href='../view/index.php'; alert('Usuario confirmado con exito')</script>");
                  } else {
                echo("<script language='javascript'>window.location.href='../view/index.php'; alert('El Usuario no coincide con el token')</script>");
                        }
                    } else {
                echo("<script language='javascript'>window.location.href='../index.php'; alert('Token invalido')</script>");
                    }
                ?>
            </div>
            
        </div>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
    </body>

</html>
<?php
    } else {
        echo("<script language='javascript'>window.location.href='../index.php'; alert('ERROR, EL USUARIO $idUsuario, $token NO EXISTE...')</script>");
    }
?>