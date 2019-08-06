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

	$insertar = "INSERT INTO usuarios(usuario, pass, tipo_permiso, imagen) VALUES('".encrypt($_POST['txtuserid'], $key)."', '".encrypt($_POST['txtuserpass'], $key)."', '".encrypt($_POST['txtusertype'], $key)."', '".encrypt($_POST['txtuserimage'], $key)."')";

	mysqli_query($conexion, $insertar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE GUARDO CORRECTAMENTE';

	header ('Location: /modules/usuarios');
?>