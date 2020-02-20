<?php
	
    session_start();
    include("include/headerPerfil.php");
    require_once('../controller/pasopaso.controller.php');
    require_once('../controller/evento.controller.php');
    if(empty($_SESSION['idUsuario']) || empty($_GET['Evento_idEvento']) || $_SESSION['nombre'] != "Auxiliar") {
        header("location:../view/index.php"); 
    }
    
    $Evento_idEvento = $_GET['Evento_idEvento'];

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="containerRegistro">
            <div id="contentreg">
                <form action="../action/crearpasopaso.php" method="POST">
                    <h1>Registrar Paso</h1>
                    <input type="hidden" name="Evento_idEvento" value="<?php echo $Evento_idEvento ?>" />
                    <label>HORA:</label>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-clock-o fa-2x"></i>
                        </span>
                        <input type="time" placeholder="Hora" name="tiempo" required />
                    </div>
                    <br/>
                    <div>
                        <span class="add-on">
                            <i class="fa fa-indent fa-2x"></i>
                        </span>
                        <input type="text" placeholder="Descripción" name="descripcion" required />
                    </div>
                    <div>
                        <input type="submit" value="Crear" />
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>

<?php

	include("include/footer.php");

?>