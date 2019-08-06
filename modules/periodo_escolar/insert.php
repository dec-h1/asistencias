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

	$insertar = "INSERT INTO periodos_escolares(periodo_escolar, activo, fecha_inicio, fecha_fin) VALUES('".encrypt($_POST['txtperiodoescolar'], $key)."', '".encrypt($_POST['selectactivo'], $key)."', '".encrypt($_POST['dateinicia'], $key)."', '".encrypt($_POST['datetermina'], $key)."')";

	mysqli_query($conexion, $insertar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE GUARDO CORRECTAMENTE';

	header ('Location: /modules/periodo_escolar');
?>