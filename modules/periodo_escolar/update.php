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

	$actualizar = "UPDATE periodos_escolares SET activo = '".encrypt($_POST['selectactivo'], $key)."', fecha_inicio = '".encrypt($_POST['dateinicia'], $key)."', fecha_fin = '".encrypt($_POST['datetermina'], $key)."' WHERE periodo_escolar = '".encrypt($_POST['txtperiodoescolar'], $key)."'";

	mysqli_query($conexion, $actualizar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE MODIFICO CORRECTAMENTE';

	header ('Location: /modules/periodo_escolar');
?>