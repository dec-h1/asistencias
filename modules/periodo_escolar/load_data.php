<?php
	if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}
	
	$consulta = "SELECT COUNT(periodo_escolar) AS total FROM periodos_escolares";

	if ($resultado = $conexion -> query($consulta))
	{
		if ($lista = mysqli_fetch_array($resultado))
		{
			$tpages = ceil($lista['total'] / $maximo);
		}
	}
	if (!empty($_POST['search']))
	{
		$_SESSION['periodo_escolar'] = array();
		$_SESSION['pe_activo'] = array();
		$_SESSION['pe_inicia'] = array();
		$_SESSION['pe_termina'] = array();

		$i = 0;

		$consulta = "SELECT * FROM periodos_escolares WHERE periodo_escolar = '".encrypt($_POST['search'], $key)."'";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['periodo_escolar'][$i] = decrypt($lista['periodo_escolar'], $key);
				$_SESSION['pe_inicia'][$i] = decrypt($lista['fecha_inicio'], $key);
				$_SESSION['pe_termina'][$i] = decrypt($lista['fecha_fin'], $key);

				if(decrypt($lista['activo'], $key) == 1)
				{
					$_SESSION['pe_activo'][$i] = 'Si';
				}
				else
				{
					$_SESSION['pe_activo'][$i] = 'No';
				}

				$i += 1;
			}
		}
		$_SESSION['total_periodos_escolares'] = count($_SESSION['periodo_escolar']);
	}
	else
	{
		$_SESSION['periodo_escolar'] = array();
		$_SESSION['pe_activo'] = array();
		$_SESSION['pe_inicia'] = array();
		$_SESSION['pe_termina'] = array();

		$i = 0;

		$consulta = "SELECT * FROM periodos_escolares LIMIT $inicio, $maximo";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['periodo_escolar'][$i] = decrypt($lista['periodo_escolar'], $key);
				$_SESSION['pe_inicia'][$i] = decrypt($lista['fecha_inicio'], $key);
				$_SESSION['pe_termina'][$i] = decrypt($lista['fecha_fin'], $key);

				if(decrypt($lista['activo'], $key) == 1)
				{
					$_SESSION['pe_activo'][$i] = 'Si';
				}
				else
				{
					$_SESSION['pe_activo'][$i] = 'No';
				}

				$i += 1;
			}
		}
		$_SESSION['total_periodos_escolares'] = count($_SESSION['periodo_escolar']);
	}
?>