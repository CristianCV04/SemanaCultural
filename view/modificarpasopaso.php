<?php
	
    session_start();
    include("include/headerPerfil.php");
    require_once('../controller/pasopaso.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['idPasoPaso']) || $_SESSION['nombre'] != "Auxiliar") {
        header("location:../view/index.php"); 
    }
    
    $idPasoPaso = $_GET['idPasoPaso'];
    $PasoPasoController = new PasoPasoController();
    $PasoPaso = $PasoPasoController->VerPasoPaso($idPasoPaso);

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="containerRegistro">
            <div id="contentreg">
                <form action="../action/modificarpasopaso.php" method="POST">
                    <h1>Modificar Paso</h1>
                    <input type="hidden" name="idPasoPaso" value="<?php echo $idPasoPaso; ?>" />
                    <input type="hidden" name="Evento_idEvento" value="<?php echo $PasoPaso->__GET('Evento_idEvento'); ?>" />
                    <label>HORA:</label>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-calendar fa-2x"></i>
                        </span>
                        <input type="time" placeholder="Hora" name="tiempo" value="<?php echo $PasoPaso->__GET('tiempo'); ?>" required />
                    </div>
                    <br/>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-indent fa-2x"></i>
                        </span>
                        <input type="text" placeholder="Descripción" name="descripcion" value="<?php echo $PasoPaso->__GET('descripcion'); ?>" required />
                    </div>
                    <div>
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