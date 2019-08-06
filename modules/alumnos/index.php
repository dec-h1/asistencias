<?php
	include_once '../security.php';
	include_once '../conexion.php';
	include_once '../functions.php';
	include_once '../close_msgbox_info.php';

	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	// Formulario actual
	if (!empty($_POST['btn']))
	{
		$view_form = $_POST['btn'].'.php';
	}
	else
	{
		$view_form = 'form_default.php';
	}

	// Pagina actual
	if (!empty($_POST['page']))
	{
		$page = $_POST['page'];
	}
	else
	{
		$page = 1;
	}
	
	// Numero de registros a visualizar
	$maximo = 50;
	$inicio = ($page - 1) * $maximo;

	// Cargar datos de usuarios
	include_once 'load_data.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>Alumnos | Control de Asistencias</title>
	<link rel="icon" type="image/png" href="../../images/favicon.ico" />
	<link rel="stylesheet" href="../../css/style.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="../../css/style_icons.css" media="screen, projection" type="text/css" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
</head>
<body>
	<div class="content">
		<?php
			include_once '../msgbox_info.php';
			include_once $view_form;
		?>
	</div>
</body>
</html>