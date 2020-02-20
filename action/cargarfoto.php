<?php
	session_start();

	$foto = $_SESSION['idUsuario'].'.jpg';
	move_uploaded_file($_FILES['Foto']['tmp_name'], '../view/assets/img/user/'.$foto);
	header("Location:../view/usuarioPerfil.php");
?>