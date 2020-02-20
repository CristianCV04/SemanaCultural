<?php
    
    session_start();
    require_once('../controller/visita.controller.php');
    require_once('../controller/usuario.controller.php');

    if(!empty($_SESSION['idUsuario'])) {
        include("include/headerPerfil.php");
    } else {
        include("include/header.php");
    }
    
    $UsuarioController = new UsuarioController();
    $VisitaController = new VisitaController();
    $usuariosRegistrados = $UsuarioController->ContarUsuario();
    $visitasDiarias = 0;
    foreach ($VisitaController->ListarVisita() as $visita) { $visitasDiarias++; }

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="row">
            <div class="col-lg-3">
                <div class="alert alert-danger text-center">
                    <i class="fa fa-calendar fa-3x"></i>&nbsp;<span><b>3 </b>Días Restantes</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-success text-center">
                    <i class="fa fa-users fa-3x"></i>&nbsp;<span><b>2 </b>Registrados Hoy</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-info text-center">
                    <i class="fa fa-rss fa-3x"></i>&nbsp;<span><b>1,900 </b>Suscriptores</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="alert alert-warning text-center">
                    <i class="fa fa-money fa-3x"></i>&nbsp;<span><b>$200,000,000 </b>Invertidos</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-2x fa-picture-o fa-fw"></i>
                        <span>Galeria de la Semana Cultural</span>
                    </div>
                    <div id="galery">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="assets/img/img1.jpg" alt="Chania">
                                </div>
                                <div class="item">
                                    <img src="assets/img/img2.jpg" alt="Chania">
                                </div>
                                <div class="item">
                                    <img src="assets/img/img3.jpg" alt="Flower">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-2x fa-reply" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-2x fa-share" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-2x fa-globe fa-fw"></i>
                        <span>Área de la Universidad del Magadalena</span>
                    </div>
                    <div id="maps"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body yellow">
                        <i class="fa fa-bar-chart-o fa-3x"></i>
                        <h3><?php echo $visitasDiarias; ?></h3>
                    </div>
                    <div class="panel-footer">
                        <span class="panel-eyecandy-title">Ingresos Diarios</span>
                    </div>
                </div>
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body red">
                        <i class="fa fa-thumbs-up fa-3x"></i>
                        <h3><?php echo $usuariosRegistrados; ?></h3>
                    </div>
                    <div class="panel-footer">
                        <span class="panel-eyecandy-title">Usuarios Registrados</span>
                    </div>
                </div>
                <?php if(!empty($_SESSION['idUsuario'])) { ?>
                <div class="chat-panel panel panel-primary">
                   <form id="formChat" role="form">
                        <div class="panel-heading" id="panel-chat">
                        <i class="fa fa-comments fa-fw"></i><span> Chat</span>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <a href="#"><i class="fa fa-refresh fa-fw"></i>Refrescar</a>
                                </li>
                            </ul>
                        </div>
                        </div>
                        <div class="panel-body">
                        <ul class="chat">
                           <input type="hidden" name="Usuario_idUsuario" id="user" value="<?php echo $_SESSION['idUsuario']; ?>">
                           <input type="hidden" name="Chat_idChat" id="user" value="1">
                            <li class="left clearfix">
                                <div class="chat-body clearfix">
                                    <div id="conversation">
                                    </div>
                                </div>
                            </li>
                        </ul>
                        </div>
                        <div class="panel-footer">
                        <div class="input-group">
                            <input id="message" name="mensaje" type="text" class="form-control input-sm" placeholder="Escribe tu mensaje aqui..." />
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="send">Send</button>
                            </span>
                        </div>
                        </div>
                   </form>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script>
            $(document).on("ready", function () {
                registerMessages();
                $.ajaxSetup({
                    "cache": false
                });
                setInterval("loadOldMessages()", 500);
            });

            var registerMessages = function () {
                $("#send").on("click", function (e) {
                    e.preventDefault();
                    var frm = $("#formChat").serialize();
                    $.ajax({
                        type: "POST",
                        url: "../action/registrarmensaje.php",
                        data: frm
                    }).done(function (info) {
                        $("#message").val("");
                        var altura = $("#conversation").prop("scrollHeight");
                        $("#conversation").scrollTop(altura);
                        console.log(info);
                    })
                });
            }

            var loadOldMessages = function () {
                $.ajax({
                    type: "POST",
                    url: "../action/mostrarmensaje.php"
                }).done(function (info) {
                    $("#conversation").html(info);
                    $("#conversation p:last-child").css({
                        "background-color": "lightgreen",
                        "padding-bottom": "20px"
                    });
                    var altura = $("#conversation").prop("scrollHeight");
                    $("#conversation").scrollTop(altura);
                });
            }
        </script>
    </body>
    
</html>

<?php

    include("include/footer.php");

?>