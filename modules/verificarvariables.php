<?php
	include_once 'functions.php';

	if (!empty($_COOKIE['recordar']) & !empty($_COOKIE['usuario']))
	{
		$usuario = decrypt($_COOKIE['usuario'], $key);
		$recordar = decrypt($_COOKIE['recordar'], $key);	
	}
	else
	{
		$recordar = '';
		$usuario = '';
	}

	if ($recordar == 'si23//PBrazZerS//XxX'.$usuario)
	{
		$_SESSION['usuario'] = decrypt($_COOKIE['usuario'], $key);
		$_SESSION['nombre'] = decrypt($_COOKIE['nombre'], $key);
		$_SESSION['apellidos'] = decrypt($_COOKIE['apellidos'], $key);
		$_SESSION['imagen'] = decrypt($_COOKIE['imagen'], $key);
		$_SESSION['permisos'] = decrypt($_COOKIE['permisos'], $key);
		$_SESSION['periodo_escolar'] = decrypt($_COOKIE['periodo_escolar'], $key);
		$_SESSION['codautentificado'] = decrypt($_COOKIE['codautentificado'], $key);

		if (!empty($_COOKIE['seccion-docente']))
		{
			$_SESSION['seccion-docente'] = decrypt($_COOKIE['seccion-docente'], $key);
		}
		if (!empty($_COOKIE['seccion-admin']))
		{
			$_SESSION['seccion-admin'] = decrypt($_COOKIE['seccion-admin'], $key);
		}
	}
?>