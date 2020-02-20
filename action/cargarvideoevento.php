<?php
	session_start();

	$idEvento = $_POST['idEvento'];
	$video = $idEvento.$_SESSION['idUsuario'].date('ymdhis').'.mp4';
	echo("<script language='javascript'>alert('!entra video¡')</script>");
	move_uploaded_file($_FILES['Video']['tmp_name'], '../view/assets/video/'.$video);
	header("Location:../view/verevento.php?idEvento=$idEvento");
?>