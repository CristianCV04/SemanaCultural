<?php

    session_start();
    if(!empty($_SESSION['nombres'])) {
        include("include/headerPerfil.php");
    } else {
        include("include/header.php");
    }

?>

<!DOCTYPE html>

<html lang="es">

    <body>
        <table class="table table-striped">
        	<caption><h2 id="titPerfil">Informacion Personal</h2></caption>
        	<tbody>
        		<tr>
        			<td><h4>NOMBRE</h4></td>
        			<td><b id="infop"><?php echo $_SESSION['nombres']; ?></b></td>
        			<td rowspan="5" id="tdfoto">
        				<img id="fotoperfil" src="assets/img/user/<?php echo $_SESSION['idUsuario'] ?>.jpg" alt="">
        				<form action="../action/cargarfoto.php" method="POST" enctype="multipart/form-data">
        					<input type="file" name="Foto" value="" placeholder="">
        					<input type="submit" class="btn-success" name="" value="Cargar">
        				</form>
        			</td>
        		</tr>
        		<tr>
        			<td><h4>1<sub>er</sub> APELLIDO</h4></td>
        			<td><b id="infop"><?php echo $_SESSION['apellido1']; ?></b></td>
        		</tr>
        		<tr>
        			<td><h4>2<sub>do</sub> APELLIDO</h4></td>
        			<td><b id="infop"><?php echo $_SESSION['apellido2']; ?></b></td>
        		</tr>
        		<tr>
        			<td><h4>USERNAME</h4></td>
        			<td><b id="infop"><?php echo $_SESSION['username']; ?></b></td>
        		</tr>
        		<tr>
        			<td><h4>E-MAIL</h4></td>
        			<td><b id="infop"><?php echo $_SESSION['email']; ?></b></td>
        		</tr>
        	</tbody>
        </table>
    </body>

</html>

<?php

include("include/footer.php");

?>