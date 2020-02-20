<?php
	session_start();

	$idEvento = $_POST['idEvento'];
	$foto = $idEvento.$_SESSION['idUsuario'].date('ymdhis').'.jpg';
	move_uploaded_file($_FILES['Foto']['tmp_name'], '../view/assets/img/evento/'.$foto);
	header("Location:../view/verevento.php?idEvento=$idEvento");
?>