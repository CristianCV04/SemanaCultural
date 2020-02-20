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
        <div class="containerlogin">
            <div id="contentreg">
                <form action="../action/loguear.php" method="POST">
                    <h1>Iniciar Sesión</h1>
                    <div id="userlogo">
                        <img src="assets/img/logoOfic.png" alt="User">
                    </div>
                    <div>
                        <i class="fa fa-user fa-2x"></i>
                        <input type="text" placeholder="Username" name="username" autofocus required />
                    </div>
                    <div>
                        <i class="fa fa-lock fa-2x"></i>
                        <input type="password" placeholder="Password" name="password" required />
                    </div>
                    <div>
                        <a href="#">Olvide mi Contraseña?</a>
                        <input type="submit" value="Entrar" />
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>

<?php

    include("include/footer.php");

?>