<?php

    session_start();
    require_once('../controller/evento.controller.php');
    require_once('../controller/comentario.controller.php');
    require_once('../controller/usuario.controller.php');
    require_once('../controller/pasopaso.controller.php');
    require_once('../controller/multimedia.controller.php');
    if(empty($_GET['idEvento'])) {
        header("location:../view/index.php"); 
    }
    if(!empty($_SESSION['nombres'])) {
        include("include/headerPerfil.php");
    } else {
        include("include/header.php");
    }

    $MultimediaController = new MultimediaController();
    $EventoController = new EventoController();
    $UsuarioController = new UsuarioController();
    $PasoPasoController = new PasoPasoController();
    $ComentarioController = new ComentarioController();
    $Evento = $EventoController->VerEvento($_GET['idEvento']);

?>

<!DOCTYPE>

<html>

    <body>
        <div class="vistaeventos">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <?php if(!empty($_SESSION['idUsuario'])) { ?>
                    <div class="col-md-1" id="divcompartir">
                        <form action="" method="POST">
                            <input type="submit" title="Compartir" id="btncompartir">
                        </form>
                    </div>
                    <div class="col-md-1" id="divfavorito">
                        <form action="" method="POST">
                            <input type="submit" name="1" title="Agregar favorito" value="1" id="btnfavorito">
                        </form>
                    </div>
                    <div class="col-md-2" id="divcalificacion">
                        <form action="" method="POST">
                            <?php for($i = 1; $i <= 5; $i++) { ?>
                                <input type="submit" id="btncalificar" name="<?php echo $i; ?>" title="<?php if($i == 1) echo 'Pesimo'; if($i == 2) echo 'Malo'; if($i == 3) echo 'Bueno'; if($i == 4) echo 'Muy Bueno'; if($i == 5) echo 'Excelente'; ?>" value="<?php echo $i; ?>" />
                            <?php } ?>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <h3 class="nombreevento"><?php echo $Evento->__GET('nombre'); ?></h3>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#item1" id="itemsTit">Noticias</a></li>
                <?php if(!empty($_SESSION['idUsuario'])) { ?>
                    <li><a data-toggle="tab" href="#item2" id="itemsTit"><span>Momentos Destacados</span></a></li>
                <?php } ?>
                <li><a data-toggle="tab" href="#item3" id="itemsTit"><span>Multimedia del Evento</span></a></li>
            </ul>
            <div class="tab-content">
                <div id="item1" class="tab-pane fade in active">
                    <br/>
                    <img src="assets/img/evento/<?php echo $Evento->__GET('idEvento');?>.jpg" id="imgNoticia" alt="">
                    <br/>
                    <div id="invitacion">
                        <p><?php echo $Evento->__GET('descripcion'); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="divcomentar">
                            <h3 id="comentar">Comentarios</h3>
                            <?php if(!empty($_SESSION['idUsuario'])) { ?>
                            <form action="../action/crearcomentario.php" method="POST">
                                <input type="hidden"  name="Evento_idEvento" value="<?php echo $_GET['idEvento']; ?>" />
                                <div class="col-md-1">
                                    <img id="imgperfilcomentario" class="img-circle" src="assets/img/user/<?php echo $_SESSION['idUsuario']; ?>.jpg" />
                                </div>
                                <div class="col-md-10" id="divbtnpublicar">
                                    <textarea name="comentario" id="comentario" placeholder="Añade un comentario publico..."></textarea>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-primary" name="" value="Publicar" />
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12" id="listacomentarios">
                            <?php foreach($ComentarioController->VerComentarioByEvento($_GET['idEvento']) as $Comentario) { ?>
                            <div class="col-md-1">
                                <img src="assets/img/user/<?php echo $Comentario->__GET('Usuario_idUsuario'); ?>.jpg" id="imgperfilcomentario" class="img-circle" alt="">
                            </div>
                            <?php $Usuario = $UsuarioController->VerUsuario($Comentario->__GET('Usuario_idUsuario')); ?>
                            <div class="col-md-11">
                                <h4 class="nombreperfil"><?php echo $Usuario->__GET('username'); ?></h4>
                                <p id="comentarioecho"><?php echo $Comentario->__GET('comentario'); ?></p>
                            </div>
                            <?php } ?>
                            <?php if(empty($Comentario)) { ?>
                                <p id="comentarioecho">Aun no hay comentarios de este evento... Se el primero en comentar</p>
                            <?php } ?>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div>
                <div id="item2" class="tab-pane fade">
                    <div class="pasoapaso">
                        <br/>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th id="horapaso"><i class="fa fa-2x fa-clock-o" aria-hidden="true"></i> Hora del momento</th>
                                    <th id="despaso"><i class="fa fa-2x fa-comments-o" aria-hidden="true"></i> Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach($PasoPasoController->VerPasoPasoByEvento($_GET['idEvento']) as $PasoPaso) { ?>
                                    <tr>
                                        <td><?php echo $PasoPaso->__GET('tiempo'); ?></td>
                                        <td><?php echo $PasoPaso->__GET('descripcion'); ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if(empty($PasoPaso)) { ?>
                                    <h4>Aun no se hace seguimiento...</h4>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="item3" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6" id="imgdeevento">
                                <div class="row">
                                    <div class="col-md-6" id="divnombregallery">
                                        <h3 id="titgallery"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</h3>
                                    </div>
                                    <div class="col-md-6" id="divbtnsubir">
                                        <form action="../action/cargarfotoevento.php" method="POST" enctype="multipart/form-data">
                                            <h3 id="titgallery">
                                                <div class="dropdown">
                                                    <button id="btndropdown" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Subir
                                                        <span class="caret"></span></button>
                                                        <ul id="ulbtnsubir" class="dropdown-menu">
                                                            <input type="hidden" name="idEvento" value="<?php echo $_GET['idEvento']; ?>">
                                                            <li><input type="file" name="Foto" value="" placeholder=""></li>
                                                            <li><input type="submit" id="btncargar" name="" value="Cargar"></li>
                                                        </ul>
                                                    </div>
                                            </h3>
                                        </form>
                                    </div>
                                </div>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        
                                        <div class="item active">
                                            <img src="assets/img/evento/<?php echo $_GET['idEvento']; ?>.jpg" alt="misa">
                                            <div class="carousel-caption"></div>
                                        </div>
                                        <?php foreach($MultimediaController->VerImagenesByEvento($_GET['idEvento']) as $Multimedia) { ?>
                                        <div class="item">
                                            <img src="assets/img/evento/<?php echo $Multimedia->__GET('nombre'); ?>.jpg" alt="">
                                            <div class="carousel-caption">
                                                <h3><?php echo $Multimedia->__GET('descripcion'); ?></h3>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon"> <i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6" id="videodeevento">
                                <div class="row">
                                    <div class="col-md-6" id="divnombregallery">
                                        <h3 id="titgallery"><i class="fa fa-video-camera" aria-hidden="true"></i> Video</h3>
                                    </div>
                                    <div class="col-md-6" id="divbtnsubir">
                                        <form action="../action/cargarvideoevento.php" method="POST" enctype="multipart/form-data">
                                            <h3 id="titgallery">
                                                <div class="dropdown">
                                                    <button id="btndropdown" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Subir
                                                        <span class="caret"></span></button>
                                                        <ul id="ulbtnsubir" class="dropdown-menu">
                                                            <input type="hidden" name="idEvento" value="<?php echo $_GET['idEvento']; ?>">
                                                            <li><input type="file" name="Video" value="" placeholder=""></li>
                                                            <li><input type="submit" id="btncargar" name="" value="Cargar"></li>
                                                        </ul>
                                                    </div>
                                            </h3>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                       <?php foreach($MultimediaController->VerVideosByEvento($_GET['idEvento']) as $Multimedia) { ?>
                                        <video id="video" controls>
                                            <source src="assets/video/<?php echo $Multimedia->__GET('nombre'); ?>.mp4" type="video/mp4">
                                        </video>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

<?php

include("include/footer.php");

?>