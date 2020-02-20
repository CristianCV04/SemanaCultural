<?php

    session_start();
    require_once('../controller/evento.controller.php');
    require_once('../controller/lugar.controller.php');
    
    if(!empty($_SESSION['idUsuario'])) { 
        include("include/headerPerfil.php"); 
    } else { 
        include("include/header.php"); 
    }

    $EventoController = new EventoController();
    $LugarController = new LugarController();
    
?>

<!DOCTYPE>

<html lang="es">

    <body>
        <div class="programacion">
            <ul class="nav nav-tabs">
                <?php $i = 1; ?>
                <?php foreach($EventoController->ListarDistincEvento() as $evento) { ?>
                    <li>
                        <a data-toggle="tab" href="#item<?php echo $i; ?>" id="itemsTit"><span><?php echo date("l", strtotime($evento->__GET('inicio'))); ?> <?php echo date("j", strtotime($evento->__GET('inicio'))); ?> de <?php echo date("F", strtotime($evento->__GET('inicio'))); ?></span></a>
                    </li>
                    <?php $i++; ?>
                <?php } ?>
            </ul>
            <div class="tab-content">
                <?php $i = 1; ?>
                <?php foreach($EventoController->ListarDistincEvento() as $evento) { ?>
                    <div id="item<?php echo $i; ?>" class="tab-pane">
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
                                                    <?php foreach($EventoController->ListarEvento(date("Y-m-d", strtotime($evento->__GET('inicio')))) as $evento1) { ?>
                                                        <?php $j++; ?>
                                                        <?php $lugar = $LugarController->VerLugar($evento1->__GET('Lugar_idLugar')); ?>
                                                        <tr>
                                                            <td><?php echo $j; ?></td>
                                                            <td><?php echo date("H:i", strtotime($evento1->__GET('inicio'))); ?></td>
                                                            <td><?php echo date("H:i", strtotime($evento1->__GET('fin'))); ?></td>
                                                            <td><?php echo $evento1->__GET('nombre'); ?></td>
                                                            <td><?php echo $evento1->__GET('descripcion'); ?></td>
                                                            <td><?php echo $lugar->__GET('nombre'); ?></td>
                                                            <td id="celdaVer"><a href="verevento.php?idEvento=<?php echo $evento1->__GET('idEvento'); ?>" id="verEvento">VER</a></td>
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
                    <?php $i++; ?>
                <?php } ?>
            </div>
        </div>
    </body>

</html>

<?php
    
    include("include/footer.php");

?>