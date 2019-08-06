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

	$actualizar = "UPDATE docentes SET nombre = '".encrypt($_POST['txtnombre'], $key)."', apellidos = '".encrypt($_POST['txtapellidos'], $key)."', curp = '".encrypt($_POST['txtcurp'], $key)."', rfc = '".encrypt($_POST['txtrfc'], $key)."', domicilio = '".encrypt($_POST['txtdomicilio'], $key)."', telefono = '".encrypt($_POST['txttelefono'], $key)."', nivel_estudios = '".encrypt($_POST['selectnivelestudios'], $key)."', documentacion = '".encrypt($_POST['selectdocumentacion'], $key)."', observacion = '".encrypt($_POST['txtobservacion'], $key)."' WHERE usuario = '".encrypt($_POST['txtuserid'], $key)."'";

	mysqli_query($conexion, $actualizar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE MODIFICO CORRECTAMENTE';

	header ('Location: /modules/docentes');
?>