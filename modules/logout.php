<?php
	session_start();
	session_destroy();

	setcookie('usuario', '', time() - 42000, '/');
	setcookie('nombre', '', time() - 42000, '/');
	setcookie('apellidos', '', time() - 42000, '/');
	setcookie('imagen', '', time() - 42000, '/');
	setcookie('permisos', '', time() - 42000, '/');
	setcookie('periodo_escolar', '', time() - 42000, '/');
	setcookie('codautentificado', '', time() - 42000, '/');
	setcookie('seccion-admin', '', time() - 42000, '/');
	setcookie('seccion-docente', '', time() - 42000, '/');
	setcookie('recordar', '', time() - 42000, '/');

	header ('Location: /');
?>