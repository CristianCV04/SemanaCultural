<?php
	
    session_start();
    include("include/headerPerfil.php");
    require_once('../controller/usuario.controller.php');
    require_once('../controller/tipousuario.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idUsuario']) || $_SESSION['nombre'] != "Administrador") {
        header("location:../view/index.php"); 
    }

    $idUsuario = $_GET['idUsuario'];
    $UsuarioController = new UsuarioController();
    $TipoUsuarioController = new TipoUsuarioController();
    $usuario = $UsuarioController->VerUsuario($idUsuario);

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="containerRegistro">
            <div id="contentreg">
                <form action="../action/modificarusuario.php" method="POST">
                    <h1>Modificar Usuario</h1>
                    <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>" />
                    <div>
                        <i class="fa fa-indent fa-2x"></i>
                        <input type="text" placeholder="Nombres" name="nombres" value="<?php echo $usuario->__GET('nombres'); ?>" required />
                    </div>
                    <div>
                        <i class="fa fa-indent fa-2x"></i>
                        <input type="text" placeholder="Primer Apellido" name="apellido1" value="<?php echo $usuario->__GET('apellido1'); ?>" required />
                    </div>
                    <div>
                        <i class="fa fa-indent fa-2x"></i>
                        <input type="text" placeholder="Segundo Apellido" name="apellido2" value="<?php echo $usuario->__GET('apellido2'); ?>" required />
                    </div>
                    <div>
                        <i class="fa fa-user fa-2x"></i>
                        <input type="text" placeholder="Username" name="username" value="<?php echo $usuario->__GET('username'); ?>" required />
                    </div>
                    <div>
                        <i class="fa fa-envelope fa-2x"></i>
                        <input type="email" placeholder="Correo electronico" name="email" value="<?php echo $usuario->__GET('email'); ?>" required />
                    </div>
                    <div>
                        <i class="fa fa-male fa-2x"></i>
                        <select name="TipoUsuario_idTipoUsuario" required>
                            <?php $tipousuario = $TipoUsuarioController->VerTipoUsuario($usuario->__GET('TipoUsuario_idTipoUsuario')) ?>
                            <option selected value="<?php echo $tipousuario->__GET('idTipoUsuario'); ?>"><?php echo $tipousuario->__GET('nombre'); ?></option>
                            <?php foreach($TipoUsuarioController->Listar1TipoUsuario($usuario->__GET('TipoUsuario_idTipoUsuario')) as $tipousuario) { ?>
                                <option value="<?php echo $tipousuario->__GET('idTipoUsuario'); ?>">
                                    <?php echo $tipousuario->__GET('nombre'); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <a href="../action/desbloquearusuario.php?idUsuario=<?php echo $usuario->__GET('idUsuario'); ?>">Desbloquear</a>
                        <span class="separator">.</span>
                        <a href="../action/bloquearusuario.php?idUsuario=<?php echo $usuario->__GET('idUsuario'); ?>">Bloquear</a>
                        <input type="submit" value="Modificar" />
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>

<?php

	include("include/footer.php");

?>