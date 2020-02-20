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
        <link href="assets/css/stylelogin.css" rel="stylesheet" />
        <link href="assets/css/styleregistro.css" rel="stylesheet" />
        <link href="assets/css/main-style.css" rel="stylesheet" />
        <link href="assets/css/styleprogramacion.css" rel="stylesheet" />
        <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <link rel="icon" href="assets/img/logoOfic.png">
        <script src="assets/js/jquery.min.js"></script>
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
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logoOfic.png" />
                    </a>
                    <h1 id="namelogo"><strong>CULTURAL<b>EVENTS</b></strong></h1>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-3x"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Iniciar Sesión</a></li>
                            <li><a href="registro.php"><i class="fa fa-user fa-fw"></i> Registrarme</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="selected">
                            <a href="index.php"><h4><i class="fa fa-home fa-fw"></i><strong>Inicio</strong></h4></a>
                        </li>
                        <li class="selected">
                            <a href="programacion.php"><h4><i class="fa fa-tasks fa-fw"></i><strong>Programación</strong></h4></a>
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