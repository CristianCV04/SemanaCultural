<?php
    
    require_once('../controller/notificacion.controller.php');
    require_once('../controller/evento.controller.php');
    $username = $_SESSION['username'];
    $nombres = $_SESSION['nombres'];
    $apellido1 = $_SESSION['apellido1'];
    $apellido2 = $_SESSION['apellido2'];
    $NotificacionController = new NotificacionController();
    $EventoController = new EventoController();

?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="utf-8">
        <?php header("Content-Type: text/html; charset=utf-8");?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Semana Cultural Unimagdalena</title>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/scripts/apiGoogleMaps.js"></script>
        <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/styleverevento.css" rel="stylesheet" />
        <link href="assets/css/main-style.css" rel="stylesheet" />
        <link href="assets/css/styleregistro.css" rel="stylesheet" />
        <link href="assets/css/styleperfil.css" rel="stylesheet" />
        <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="assets/css/styleprogramacion.css" rel="stylesheet" />
        <link href="assets/css/styleadministrador.css" rel="stylesheet" />
        <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <link rel="icon" href="assets/img/logoOfic.png">
    </head>

    <body onload="initMap()">
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="assets/img/logoOfic.png"/></a>
                    <h1 id="namelogo"><strong>CULTURAL<b>EVENTS</b></strong></h1>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php $Notificacion = $NotificacionController->ContarNotificacion($_SESSION['idUsuario']); ?>
                            <span class="top-label label label-warning"><?php echo $Notificacion ?></span> <i class="fa fa-bell fa-3x"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <?php if($Notificacion==0) { ?>
                                <li><a><i class="fa fa-bell fa-fw"></i> No hay notificaciones nuevas</a></li>
                            <?php } ?>
                            <?php foreach($NotificacionController->VerNotificacionByUsuario($_SESSION['idUsuario']) as $Notificacion) { ?>
                                <?php $Evento = $EventoController->VerEvento($Notificacion->__GET('Evento_idEvento')); ?>
                                <li>
                                    <a href="../action/notificacionvista.php?idNotificacion=<?php echo $Notificacion->__GET('idNotificacion'); ?>"><i class="fa fa-tasks fa-fw"></i> Se actualizo el evento <?php echo $Evento->__GET('nombre'); ?></a>
                                </li>
                                <li class="divider"></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-3x"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="usuarioPerfil.php"><i class="fa fa-user fa-fw"></i>Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../action/salir.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <div class="user-section">
                                <div class="user-section-inner">
                                    <img src="assets/img/user/<?php echo $_SESSION['idUsuario'] ?>.jpg" />
                                </div>
                                <div class="user-info">
                                    <div class="user-text-online">
                                        <h3><span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;<strong><?php echo ucwords($username); ?></strong></h3>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="selected">
                            <a href="index.php"><h4><i class="fa fa-home fa-fw"></i><strong>Inicio</strong></h4></a>
                        </li>
                        <li class="selected">
                            <a href="programacion.php"><h4><i class="fa fa-tasks fa-fw"></i><strong>Programación</strong></h4></a>
                        </li>
                        <?php if($_SESSION['nombre'] == "Administrador") { ?>
                            <li class="selected">
                                <a href="administrador.php"><h4><i class="fa fa-pencil fa-fw"></i><strong>Editar Usuarios</strong></h4></a>
                            </li>
                        <?php } ?>
                        <?php if($_SESSION['nombre'] == "Auxiliar") { ?>
                            <li class="selected">
                                <a href="auxiliar.php"><h4><i class="fa fa-pencil fa-fw"></i><strong>Editar Eventos</strong></h4></a>
                            </li>
                        <?php } ?>
                        <li class="selected">
                            <a href="favorito.php"><h4><i class="fa fa-star fa-fw"></i><strong>Favoritos</strong></h4></a>
                        </li>
                        <li class="selected">
                            <a href="galeria.php"><h4><i class="fa fa-picture-o fa-fw"></i><strong>Galeria</strong></h4></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Semana Cultural Universidad del Magdalena</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-folder-open"></i><b> Bienvenido </b><b><?php echo ucwords($nombres)." ".ucwords($apellido1)." ".ucwords($apellido2); ?></b>
                        </div>
                    </div>
                </div>