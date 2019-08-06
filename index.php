<?php
	session_start();

	include_once 'modules/conexion.php';
	include_once 'modules/verificarvariables.php';
	include_once 'modules/functions.php';

	if (!empty($_SESSION['codautentificado']) == 'si23//PBrazZerS//XxX'.!empty($_SESSION['usuario']))
	{
		header('Location: inicio');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>Asistencias</title>
	<link rel="icon" type="image/png" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" media="screen, projection" type="text/css" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
</head>
<body class="login">
	<div class="wrap-title-login">
		<div class="title-login">
			<h1>Asistencias</h1>
		</div>
	</div>
	<div class="wrap-form-login">
		<div class="logo-form-login">
			<img src="images/asistencia-icon.png"/>
		</div>
		<form name="frm-login" action="#" method="POST">
			<?php
				if (!empty($_POST['txtusuario']) and !empty($_POST['txtcontrasena']))
				{
					$usuario = encrypt($_POST['txtusuario'],$key);
					$contrasena = encrypt($_POST['txtcontrasena'],$key);

					$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$contrasena' LIMIT 1";

					if ($resultado = $conexion -> query($consulta))
					{
						if (/*$lista = $resultado -> fetch_row()*/$lista = mysqli_fetch_array($resultado))
						{
							$encryptpermiso = encrypt('docente',$key);

							if ($lista['tipo_permiso'] == $encryptpermiso)
							{
								$usuariotext = decrypt($lista['usuario'],$key);
								$permisos = decrypt($lista['tipo_permiso'],$key);
								$imagen = decrypt($lista['imagen'],$key);

								$consulta = "SELECT * FROM docentes WHERE usuario = '$usuario' LIMIT 1";

								if ($resultado = $conexion -> query($consulta))
								{
									if ($lista = mysqli_fetch_array($resultado))
									{
										$nombre = decrypt($lista['nombre'],$key);
										$apellidos = decrypt($lista['apellidos'],$key);
									
										$consulta = "SELECT * FROM periodos_escolares WHERE activo = '".encrypt('1', $key)."' AND actual = '".encrypt('1', $key)."' LIMIT 1";

										if ($resultado = $conexion -> query($consulta))
										{
											if ($lista = mysqli_fetch_array($resultado))
											{
												$periodo_escolar = decrypt($lista['periodo_escolar'],$key);
											}
										}
									}
								}
								
								$usuario = $usuariotext;

								if (!empty($_POST['recordarsesion']))
								{
									$_SESSION['seccion-docente'] = setcookie('seccion-docente', encrypt('docentesi23//PBrazZerS//XxXdocente'.$usuario,$key), time() + 365 * 24 * 60 * 60);
								}
								else
								{
									$_SESSION['seccion-docente'] = 'docentesi23//PBrazZerS//XxXdocente'.$usuario;
								}
							}

							$encryptpermiso = encrypt('admin',$key);

							if ($lista['tipo_permiso'] == $encryptpermiso)
							{
								$usuariotext = decrypt($lista['usuario'],$key);
								$permisos = decrypt($lista['tipo_permiso'],$key);
								$imagen = decrypt($lista['imagen'],$key);

								$consulta = "SELECT * FROM personal WHERE usuario = '$usuario' LIMIT 1";

								if ($resultado = $conexion -> query($consulta))
								{
									if($lista = mysqli_fetch_array($resultado))
									{
										$nombre = decrypt($lista['nombre'],$key);
										$apellidos = decrypt($lista['apellidos'],$key);
									
										$consulta = "SELECT * FROM periodos_escolares WHERE activo = '".encrypt('1', $key)."' AND actual = '".encrypt('1', $key)."' LIMIT 1";

										if ($resultado = $conexion -> query($consulta))
										{
											if ($lista = mysqli_fetch_array($resultado))
											{
												$periodo_escolar = decrypt($lista['periodo_escolar'],$key);
											}
										}
									}
								}
								
								$usuario = $usuariotext;

								if (!empty($_POST['recordarsesion']))
								{
									$_SESSION['seccion-admin'] = setcookie('seccion-admin', encrypt('adminsi23//PBrazZerS//XxXadmin'.$usuario,$key), time() + 365 * 24 * 60 * 60);
								}
								else
								{
									$_SESSION['seccion-admin'] = 'adminsi23//PBrazZerS//XxXadmin'.$usuario;
								}
							}

							if (!empty($_POST['recordarsesion']))
							{
								setcookie('recordar', encrypt('si23//PBrazZerS//XxX'.$usuario,$key), time() + 15 * 24 * 60 * 60);
								setcookie('usuario', encrypt($usuario,$key), time() + 15 * 24 * 60 * 60);
								setcookie('nombre', encrypt($nombre,$key), time() + 15 * 24 * 60 * 60);
								setcookie('apellidos', encrypt($apellidos,$key), time() + 15 * 24 * 60 * 60);
								setcookie('imagen', encrypt($imagen,$key), time() + 15 * 24 * 60 * 60);
								setcookie('permisos', encrypt($permisos,$key), time() + 15 * 24 * 60 * 60);
								setcookie('periodo_escolar', encrypt($periodo_escolar,$key), time() + 15 * 24 * 60 * 60);
								setcookie('codautentificado', encrypt('si23//PBrazZerS//XxX'.$usuario,$key), time() + 15 * 24 * 60 * 60);
							}

							$_SESSION['usuario'] = $usuario;
							$_SESSION['nombre'] = $nombre;
							$_SESSION['apellidos'] = $apellidos;
							$_SESSION['imagen'] = $imagen;
							$_SESSION['permisos'] = $permisos;
							$_SESSION['periodo_escolar'] = $periodo_escolar;
							$_SESSION['codautentificado'] = 'si23//PBrazZerS//XxX'.$usuario;

							header('Location: inicio');
						}
						else
						{
							echo '
								<label class="label" style="margin: 9px 0 0 0; color: #c93f3f; font-size: 1.2em; font-weight: bold;">usuario/contraseña - ¡incorrecto!</label>
								<input type="text" class="text" name="txtusuario" placeholder="Correo electrónico o matrícula" autofocus required />
								<input type="password" class="textcontrasena" name="txtcontrasena" placeholder="Contraseña" autocomplete="off" required />
								<label class="labelrecordar" for="checkboxrecordar">Recordar mi sesión</label>
								<input id="checkboxrecordar" type="checkbox" name="recordarsesion" value="1">
								<button class="button" type="submit">Go</button>
							';
						}
					}
				}
				else
				{
					echo '
						<label class="label">Iniciar sesión</label>
						<input type="text" class="text" name="txtusuario" placeholder="Correo electrónico o matrícula" autofocus required />
						<input type="password" class="textcontrasena" name="txtcontrasena" placeholder="Contraseña" autocomplete="off" required />
						<label class="labelrecordar" for="checkboxrecordar">Recordar mi sesión</label>
						<input id="checkboxrecordar" type="checkbox" name="recordarsesion" value="1">
						<button class="button" type="submit">Go</button>
					';
				}
			?>
		</form>
	</div>
</body>
</html>