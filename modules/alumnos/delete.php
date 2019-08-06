<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtuserid']))
	{
		header('Location: /');
		exit();
	}

	$eliminar = "DELETE FROM alumnos WHERE usuario = '".encrypt($_POST['txtuserid'], $key)."'";

	mysqli_query($conexion, $eliminar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO HA SIDO ELIMINADO SATISFACTORIAMENTE';

	header ('Location: /modules/alumnos');
?>