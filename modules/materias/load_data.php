<?php
	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	$consulta = "SELECT COUNT(materia) AS total FROM materias";

	if ($resultado = $conexion -> query($consulta))
	{
		if ($lista = mysqli_fetch_array($resultado))
		{
			$tpages = ceil($lista['total'] / $maximo);
		}
	}
	
	if (!empty($_POST['search']))
	{
		$_SESSION['materia'] = array();
		$_SESSION['nombre_materia'] = array();
		$_SESSION['semestre_materia'] = array();

		$i = 0;

		$consulta = "SELECT * FROM materias WHERE materia = '".encrypt($_POST['search'], $key)."' OR nombre = '".encrypt($_POST['search'], $key)."'";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['materia'][$i] = decrypt($lista['materia'], $key);
				$_SESSION['nombre_materia'][$i] = decrypt($lista['nombre'], $key);
				$_SESSION['semestre_materia'][$i] = decrypt($lista['semestre'], $key);

				$i += 1;
			}
		}
		$_SESSION['total_materias'] = count($_SESSION['materia']);
	}
	else
	{
		$_SESSION['materia'] = array();
		$_SESSION['nombre_materia'] = array();
		$_SESSION['semestre_materia'] = array();

		$i = 0;

		$consulta = "SELECT * FROM materias LIMIT $inicio, $maximo";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['materia'][$i] = decrypt($lista['materia'], $key);
				$_SESSION['nombre_materia'][$i] = decrypt($lista['nombre'], $key);
				$_SESSION['semestre_materia'][$i] = decrypt($lista['semestre'], $key);

				$i += 1;
			}
		}
		$_SESSION['total_materias'] = count($_SESSION['materia']);
	}
?>