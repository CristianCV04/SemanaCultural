<?php
	
    session_start();
    include("include/headerPerfil.php");
    require_once('../controller/usuario.controller.php');
    require_once('../controller/lugar.controller.php');
    require_once('../controller/evento.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idEvento']) || $_SESSION['nombre'] != "Auxiliar") {
        header("location:../view/index.php"); 
    }
    
    $idEvento = $_GET['idEvento'];
    $LugarController = new LugarController();
    $EventoController = new EventoController();
    $evento = $EventoController->VerEvento($idEvento);
    $inicio = explode(" ", $evento->__GET('inicio'));
    $fin = explode(" ", $evento->__GET('fin'));

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="containerRegistro">
            <div id="contentreg">
                <form action="../action/modificarevento.php" method="POST">
                    <h1>Modificar Evento</h1>
                    <input type="hidden" name="idEvento" value="<?php echo $idEvento ?>" />
                    <input type="hidden" name="Programacion_idProgramacion" value="<?php echo $evento->__GET('Programacion_idProgramacion'); ?>" />
                    <div>
                        <span class="add-on">
                            <i class="fa fa-indent fa-2x"></i>
                        </span>
                        <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $evento->__GET('nombre'); ?>" required />
                    </div>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-indent fa-2x"></i>
                        </span>
                        <input type="text" placeholder="Descripción" name="descripcion" value="<?php echo $evento->__GET('descripcion'); ?>" />
                    </div>
                    <label>INICIA:</label>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-calendar fa-2x"></i>
                        </span>
                        <input type="date" placeholder="Fecha de Inicio" name="inicio" value="<?php echo $inicio[0]; ?>" required />
                        <input type="time" placeholder="Hora de Inicio" name="inicio1" value="<?php echo $inicio[1]; ?>" required />
                    </div>
                    <label>FINALIZA:</label>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-calendar fa-2x"></i>
                        </span>
                        <input type="date" placeholder="Fecha de Finalizacion" name="fin" value="<?php echo $fin[0]; ?>" required />
                        <input type="time" placeholder="Hora de Finalizacion" name="fin1" value="<?php echo $fin[1]; ?>" required />
                    </div>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-globe fa-2x"></i>
                        </span>
                        <select name="Lugar_idLugar" required>
                            <?php $lugar1 = $LugarController->VerLugar($evento->__GET('Lugar_idLugar')) ?>
                            <option selected value="<?php echo $lugar1->__GET('idLugar'); ?>"><?php echo $lugar1->__GET('nombre'); ?></option>
                            <?php foreach($LugarController->Listar1Lugar($evento->__GET('Lugar_idLugar')) as $lugar) { ?>
                                <option value="<?php echo $lugar->__GET('idLugar'); ?>">
                                    <?php echo $lugar->__GET('nombre'); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <a href="crearpasopaso.php?Evento_idEvento=<?php echo $idEvento; ?>">Crear Paso a Paso</a>
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