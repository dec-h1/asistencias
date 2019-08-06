<?php
	$consulta = "SELECT COUNT(usuario) AS total FROM usuarios";

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
		$_SESSION['user_type'] = array();
		$_SESSION['user_image'] = array();

		$i = 0;

		$consulta = "SELECT * FROM usuarios WHERE usuario = '".encrypt($_POST['search'], $key)."'";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['user_id'][$i] = decrypt($lista['usuario'], $key);
				$_SESSION['user_type'][$i] = decrypt($lista['tipo_permiso'], $key);
				$_SESSION['user_image'][$i] = decrypt($lista['imagen'], $key);

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
	else
	{
		$_SESSION['user_id'] = array();
		$_SESSION['user_email'] = array();
		$_SESSION['user_type'] = array();
		$_SESSION['user_image'] = array();

		$i = 0;

		$consulta = "SELECT * FROM usuarios LIMIT $inicio, $maximo";

		if ($resultado = $conexion -> query($consulta))
		{
			while ($lista = mysqli_fetch_array($resultado))
			{
				$_SESSION['user_id'][$i] = decrypt($lista['usuario'], $key);
				$_SESSION['user_email'][$i] = decrypt($lista['correo'], $key);
				$_SESSION['user_type'][$i] = decrypt($lista['tipo_permiso'], $key);
				$_SESSION['user_image'][$i] = decrypt($lista['imagen'], $key);

				$i += 1;
			}
		}
		$_SESSION['total_users'] = count($_SESSION['user_id']);
	}
?>