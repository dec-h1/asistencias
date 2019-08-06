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

	$fecha_ingreso = date('Y-m-d');

	$insertar = "INSERT INTO personal(usuario, fecha_ingreso, nombre, apellidos, curp, rfc, domicilio, telefono, nivel_estudios, documentacion, observacion) VALUES('".encrypt($_POST['txtuserid'], $key)."', '".$fecha_ingreso."', '".encrypt($_POST['txtnombre'], $key)."', '".encrypt($_POST['txtapellidos'], $key)."', '".encrypt($_POST['txtcurp'], $key)."', '".encrypt($_POST['txtrfc'], $key)."', '".encrypt($_POST['txtdomicilio'], $key)."', '".encrypt($_POST['txttelefono'], $key)."', '".encrypt($_POST['selectnivelestudios'], $key)."', '".encrypt($_POST['selectdocumentacion'], $key)."', '".encrypt($_POST['txtobservacion'], $key)."')";

	mysqli_query($conexion, $insertar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE GUARDO CORRECTAMENTE';

	header ('Location: /modules/administrativos');
?>