<?php
	session_start();
    require_once('../controller/favorito.controller.php');
    require_once('../controller/lugar.controller.php');
    require_once('../controller/evento.controller.php');
    if(!empty($_SESSION['nombres'])) {
        include("include/headerPerfil.php");
    } else {
        include("include/header.php");
    }
    $EventoController = new EventoController();
    $LugarController = new LugarController();
    $FavoritoController = new FavoritoController();
    
?>
<!DOCTYPE>

<html lang="es">

    <body>
        <div class="programacion">
            <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <center><h2><strong>EVENTOS</strong></h2></center>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th><center>No</center></th>
                                                        <th><center>INICIA</center></th>
                                                        <th><center>FINALIZA</center></th>
                                                        <th><center>NOMBRE</center></th>
                                                        <th><center>DESCRIPCIÓN</center></th>
                                                        <th><center>UBICACIÓN</center></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php $j = 0; ?>
                                                    <?php foreach($FavoritoController->ListarFavorito($_SESSION['idUsuario']) as $Favorito) { ?>
                                                        <?php $j++; ?>
                                                        <?php $Evento = $EventoController->VerEvento($Favorito->__GET('Evento_idEvento')); ?>
                                                        <?php $Lugar = $LugarController->VerLugar($Evento->__GET('Lugar_idLugar')); ?>
                                                        <tr>
                                                            <td><?php echo $j; ?></td>
                                                            <td><?php echo date("H:i", strtotime($Evento->__GET('inicio'))); ?></td>
                                                            <td><?php echo date("H:i", strtotime($Evento->__GET('fin'))); ?></td>
                                                            <td><?php echo $Evento->__GET('nombre'); ?></td>
                                                            <td><?php echo $Evento->__GET('descripcion'); ?></td>
                                                            <td><?php echo $Lugar->__GET('nombre'); ?></td>
                                                            <td id="celdaVer"><a href="verevento.php?idEvento=<?php echo $Evento->__GET('idEvento'); ?>" id="verEvento">VER</a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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