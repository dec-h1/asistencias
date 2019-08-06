<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';

	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtperiodoescolar']))
	{
		header('Location: /');
		exit();
	}

	echo $eliminar = "DELETE FROM periodos_escolares WHERE periodo_escolar = '".encrypt($_POST['txtperiodoescolar'], $key)."'";

	mysqli_query($conexion, $eliminar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO HA SIDO ELIMINADO SATISFACTORIAMENTE';

	header ('Location: /modules/periodo_escolar');
?>