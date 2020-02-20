<?php
	
    session_start();
    include("include/header.php");
    if(!empty($_SESSION['idUsuario'])) {
        header("location:../view/index.php"); 
    }

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <div class="containerRegistro">
            <div id="contentreg">
                <form action="../action/registrar.php" method="POST">
                    <h1>Registrarme</h1>
                    <input type="hidden" name="TipoUsuario_idTipoUsuario" value="3" />
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
                        <a href="login.php">!Ya tengo una¡</a>
                        <input type="submit" value="Registrar" />
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>

<?php

	include("include/footer.php");

?>