<?php
	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	$consulta = "SELECT COUNT(usuario) AS total FROM alumnos";

	if ($resultado = $conexion -> query($consulta))
	{
		if ($lista = mysqli_fetch_array($resultado))
		{
			$tpages = ceil($lista['total'] / $maximo);
		}
	}

	if (!empty($_POST['search']))
	{
		$_SESSION['user_id'] = array();
		$_SESSION['alumno_nombre'] = array();
		$_SESSION['alumno_fecha_ingreso'] = array();

		$i = 0;

		$consulta = "SELECT * FROM alumnos WHERE usuario = '".encrypt($_POST['search'], $key)."' OR fecha_ingreso = '".$_POST['search']."' OR nombre = '".encrypt($_POST['search'], $key)."'";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['user_id'][$i] = decrypt($lista['usuario'], $key);
				$_SESSION['alumno_fecha_ingreso'][$i] = $lista['fecha_ingreso'];
				$_SESSION['alumno_nombre'][$i] = decrypt($lista['nombre'], $key).' '.decrypt($lista['apellidos'], $key);

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
	else
	{
		$_SESSION['user_id'] = array();
		$_SESSION['alumno_nombre'] = array();
		$_SESSION['alumno_fecha_ingreso'] = array();

		$i = 0;

		$consulta = "SELECT * FROM alumnos LIMIT $inicio, $maximo";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['user_id'][$i] = decrypt($lista['usuario'], $key);
				$_SESSION['alumno_fecha_ingreso'][$i] = $lista['fecha_ingreso'];
				$_SESSION['alumno_nombre'][$i] = decrypt($lista['nombre'], $key).' '.decrypt($lista['apellidos'], $key);

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
?>