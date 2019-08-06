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

	$insertar = "INSERT INTO materias(materia, semestre, nombre) VALUES('".encrypt($_POST['txtmateria'], $key)."', '".encrypt($_POST['txtsemestremateria'], $key)."', '".encrypt($_POST['txtnombremateria'], $key)."')";

	mysqli_query($conexion, $insertar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE GUARDO CORRECTAMENTE';

	header ('Location: /modules/materias');
?>