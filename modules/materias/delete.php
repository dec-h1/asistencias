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

	echo $eliminar = "DELETE FROM materias WHERE materia = '".encrypt($_POST['txtmateria'], $key)."'";

	mysqli_query($conexion, $eliminar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO HA SIDO ELIMINADO SATISFACTORIAMENTE';

	header ('Location: /modules/materias');
?>