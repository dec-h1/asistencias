<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';
	
	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	if (empty($_POST['txtmateria']))
	{
		header('Location: /');
		exit();
	}

	$actualizar = "UPDATE materias SET nombre = '".encrypt($_POST['txtnombremateria'], $key)."', semestre = '".encrypt($_POST['txtsemestremateria'], $key)."' WHERE materia = '".encrypt($_POST['txtmateria'], $key)."'";

	mysqli_query($conexion, $actualizar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE MODIFICO CORRECTAMENTE';

	header ('Location: /modules/materias');
?>