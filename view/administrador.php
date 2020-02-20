<?php

    session_start();
    include("include/headerPerfil.php");
    require_once('../controller/usuario.controller.php');
    require_once('../controller/tipousuario.controller.php');
    if(empty($_SESSION['idUsuario']) || $_SESSION['nombre'] != "Administrador") {
        header("location:../view/index.php"); 
    }

    $UsuarioController = new UsuarioController();
    $TipoUsuarioController = new TipoUsuarioController();

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="programacion">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#item1" id="itemsTit">Lista de Usuarios</a></li>
                <li><a data-toggle="tab" href="#item2" id="itemsTit"><span>Registrar Usuarios</span></a></li>
            </ul>
            <div class="tab-content">
                <div id="item1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Usuarios</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRES</th>
                                                    <th>PRIMER APELLIDO</th>
                                                    <th>SEGUNDO APELLIDO</th>
                                                    <th>USERNAME</th>
                                                    <th>EMAIL</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($UsuarioController->ListarUsuario($_SESSION['idUsuario']) as $usuario) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $usuario->__GET('nombres'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuario->__GET('apellido1'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuario->__GET('apellido2'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuario->__GET('username'); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $usuario->__GET('email'); ?>
                                                        </td>
                                                        <td id="celdamod"><a href="modificarusuario.php?idUsuario=<?php echo $usuario->__GET('idUsuario'); ?>" id="btnmod">MODIFICAR</a></td>
                                                        <td id="celdaeli"><a onclick="javascript:return confirm('¿Seguro que desea eliminar este usuario?')" href="../action/eliminarusuario.php?idUsuario=<?php echo $usuario->__GET('idUsuario'); ?>" id="btneli">ELIMINAR</a></td>
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
                            <form action="../action/registrar.php" method="POST">
                                <h1>Registrar Usuario</h1>
                                <div>
                                    <i class="fa fa-indent fa-2x"></i>
                                    <input type="text" placeholder="Nombres" name="nombres" required />
                                </div>
                                <div>
                                    <i class="fa fa-indent fa-2x"></i>
                                    <input type="text" placeholder="Primer Apellido" name="apellido1" required />
                                </div>
                                <div>
                                    <i class="fa fa-indent fa-2x"></i>
                                    <input type="text" placeholder="Segundo Apellido" name="apellido2" required />
                                </div>
                                <div>
                                    <i class="fa fa-user fa-2x"></i>
                                    <input type="text" placeholder="Username" name="username" required />
                                </div>
                                <div>
                                    <i class="fa fa-lock fa-2x"></i>
                                    <input type="password" placeholder="Password" name="password" required />
                                </div>
                                <div>
                                    <i class="fa fa-envelope fa-2x"></i>
                                    <input type="email" placeholder="Correo electronico" name="email" required />
                                </div>
                                <div>
                                    <i class="fa fa-male fa-2x"></i>
                                    <select name="TipoUsuario_idTipoUsuario" required>
                                        <option selected>---Seleccione Tipo de Usuario---</option>
                                        <?php foreach($TipoUsuarioController->ListarTipoUsuario() as $tipousuario) { ?>
                                            <option value="<?php echo $tipousuario->__GET('idTipoUsuario'); ?>"><?php echo $tipousuario->__GET('nombre'); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" value="Registrar" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <br/>
                    <br/>
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
            $(document).ready(function () { $('#dataTables-example').dataTable(); });
        </script>
    </body>

</html>