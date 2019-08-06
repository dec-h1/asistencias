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

	if (!empty($_FILES['fileimage']['name']))
	{
		$nombre_img = $_FILES['fileimage']['name'];
	}
	else
	{
		$nombre_img = $_SESSION['user_image'][0];
	}
	

	$actualizar = "UPDATE usuarios SET tipo_permiso = '".encrypt($_POST['txtusertype'], $key)."', correo = '".encrypt($_POST['txtuseremail'], $key)."', imagen = '".encrypt($nombre_img, $key)."' WHERE usuario = '".encrypt($_POST['txtuserid'], $key)."'";

	mysqli_query($conexion, $actualizar);

	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'EL REGISTRO SE MODIFICO CORRECTAMENTE';

	header ('Location: /modules/usuarios');
?>