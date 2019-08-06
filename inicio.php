<?php
	include_once 'modules/security.php';
	include_once 'modules/conexion.php';
	include_once 'modules/verificarvariables.php';
	include_once 'modules/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>Asistencias</title>
	<link rel="icon" type="image/png" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" media="screen, projection" type="text/css" />
	<link rel="stylesheet" href="css/style_icons.css" media="screen, projection" type="text/css" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<?php
				include_once "modules/sections/info-user.php";
			?>
		</div>
		<?php
			if (!empty($_SESSION['seccion-docente']) == 'docentesi23//PBrazZerS//XxXdocente'.$_SESSION['usuario'])
			{
				include_once 'modules/sections/section-docente.php';
			}
			if (!empty($_SESSION['seccion-admin']) == 'adminsi23//PBrazZerS//XxXadmin'.$_SESSION['usuario'])
			{
				include_once 'modules/sections/section-admin.php';
			}
		?>
	</div>
</body>
</html>