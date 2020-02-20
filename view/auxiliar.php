<?php

    session_start();
    include("include/headerPerfil.php");
    require_once('../controller/usuario.controller.php');
    require_once('../controller/evento.controller.php');
    require_once('../controller/pasopaso.controller.php');
    require_once('../controller/lugar.controller.php');
    if(empty($_SESSION['idUsuario']) || $_SESSION['nombre'] != "Auxiliar") {
        header("location:../view/index.php"); 
    }

    $EventoController = new EventoController();
    $PasoPasoController = new PasoPasoController();
    $LugarController = new LugarController();

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="programacion">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#item1" id="itemsTit">Lista de Eventos</a></li>
                <li><a data-toggle="tab" href="#item2" id="itemsTit"><span>Registrar Eventos</span></a></li>
                <li><a data-toggle="tab" href="#item3" id="itemsTit"><span>Listar Paso a Paso</span></a></li>
            </ul>
            <div class="tab-content">
                <div id="item1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Eventos</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>INICIO</th>
                                                    <th>FIN</th>
                                                    <th>NOMBRE</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>LUGAR</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($EventoController->ListarAllEvento() as $evento) { ?>
                                                <?php $lugar = $LugarController->VerLugar($evento->__GET('Lugar_idLugar')); ?>
                                                    <tr>
                                                        <td><?php echo date("H:i:s", strtotime($evento->__GET('inicio'))); ?></td>
                                                        <td><?php echo date("H:i:s", strtotime($evento->__GET('fin'))); ?></td>
                                                        <td><?php echo $evento->__GET('nombre'); ?></td>
                                                        <td><?php echo $evento->__GET('descripcion'); ?></td>
                                                        <td><?php echo $lugar->__GET('nombre'); ?></td>
                                                        <td id="celdamod"><a href="modificarevento.php?idEvento=<?php echo $evento->__GET('idEvento'); ?>" id="btnmod">MODIFICAR</a></td>
                                                        <td id="celdaeli"><a onclick="javascript:return confirm('¿Seguro que desea eliminar este evento?')" href="../action/eliminarevento.php?idEvento=<?php echo $evento->__GET('idEvento'); ?>" id="btneli">ELIMINAR</a></td>
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
                <div id="item2" class="tab-pane fade">
                    <br/>
                    <br/>
                    <div class="containerRegistro">
                        <div id="contentreg">
                            <form action="../action/crearevento.php" method="POST" enctype="multipart/form-data">
                                <h1>Crear Evento</h1>
                                <div>
                                    <span class="add-on"><i class="fa fa-indent fa-2x"></i></span>
                                    <input type="text" placeholder="Nombre" name="nombre" required />
                                </div>
                                <div>
                                    <span class="add-on"><i class="fa fa-indent fa-2x"></i></span>
                                    <input type="text" placeholder="Descripción" name="descripcion" />
                                </div>
                                <label>INICIA:</label>
                                <div>
                                    <span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>
                                    <input type="date" placeholder="Fecha de Inicio" name="inicio" required />
                                    <input type="time" placeholder="Hora de Inicio" name="inicio1" required />
                                </div>
                                <label>FINALIZA:</label>
                                <div>
                                    <span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>
                                    <input type="date" placeholder="Fecha de Finalizacion" name="fin" required />
                                    <input type="time" placeholder="Hora de Finalizacion" name="fin1" required />
                                </div>
                                <div>
                                    <span class="add-on"><i class="fa fa-globe fa-2x"></i></span>
                                    <select name="Lugar_idLugar" required>
                                        <option selected>---Seleccione un Lugar---</option>
                                        <?php foreach($LugarController->ListarLugar() as $lugar) { ?>
                                            <option value="<?php echo $lugar->__GET('idLugar'); ?>">
                                                <?php echo $lugar->__GET('nombre'); ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div><br>
                                <label>IMAGEN EVENTO:</label>
                                <div>
                                    <span class="add-on"><i class="fa fa-2x fa-picture-o"></i></span>
                                    <input type="file" id="imgevento" placeholder="" name="Foto" required />
                                </div>
                                <div>
                                    <input type="submit" value="Crear" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div>
                <div id="item3" class="tab-pane fade">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Paso a Paso</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables1-example">
                                            <thead>
                                                <tr>
                                                    <th>HORA</th>
                                                    <th>EVENTO</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($PasoPasoController->ListarPasoPaso() as $pasopaso) { ?>
                                                    <?php $evento = $EventoController->VerEvento($pasopaso->__GET('Evento_idEvento')); ?>
                                                    <tr>
                                                        <td><?php echo $pasopaso->__GET('tiempo'); ?></td>
                                                        <td><?php echo $evento->__GET('nombre'); ?></td>
                                                        <td><?php echo $pasopaso->__GET('descripcion'); ?></td>
                                                        <td id="celdamod"><a href="modificarpasopaso.php?idPasoPaso=<?php echo $pasopaso->__GET('idPasoPaso'); ?>" id="btnmod">MODIFICAR</a></td>
                                                        <td id="celdaeli"><a onclick="javascript:return confirm('¿Seguro que desea eliminar este paso del evento?')" href="../action/eliminarpasopaso.php?idPasoPaso=<?php echo $pasopaso->__GET('idPasoPaso'); ?>" id="btneli">ELIMINAR</a></td>
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
        </div>
        <script src="assets/plugins/jquery-1.10.2.js"></script>
        <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="assets/plugins/pace/pace.js"></script>
        <script src="assets/scripts/siminta.js"></script>
        <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#dataTables1-example').dataTable();
            });
        </script>
    </body>

</html>