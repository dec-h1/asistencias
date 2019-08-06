<?php
session_start();

if ($_SESSION['permisos'] != 'admin')
{
	header('Location: /');
	exit();
}

$_SESSION['user_id'] = array();
$_SESSION['docente_nombre'] = array();
$_SESSION['docente_apellidos'] = array();

$consulta = "SELECT * FROM docentes WHERE usuario = '".encrypt($_POST['txtuserid'], $key)."'";

if ($resultado = $conexion -> query($consulta))
{
	if ($lista = mysqli_fetch_array($resultado))
	{
		$_SESSION['user_id'][0] = decrypt($lista['usuario'], $key);
		$_SESSION['docente_nombre'][0] = decrypt($lista['nombre'], $key);
		$_SESSION['docente_apellidos'][0] = decrypt($lista['apellidos'], $key);
		$_SESSION['docente_curp'][0] = decrypt($lista['curp'], $key);
		$_SESSION['docente_rfc'][0] = decrypt($lista['rfc'], $key);
		$_SESSION['docente_domicilio'][0] = decrypt($lista['domicilio'], $key);
		$_SESSION['docente_telefono'][0] = decrypt($lista['telefono'], $key);
		$_SESSION['docente_nivel_estudios'][0] = decrypt($lista['nivel_estudios'], $key);
		$_SESSION['docente_documentacion'][0] = decrypt($lista['documentacion'], $key);
		$_SESSION['docente_observacion'][0] = decrypt($lista['observacion'], $key);
	}
}

echo'
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
    </div>
   <div class="body">
        <form name="form-update-users" action="#" method="POST">
            <div class="first">
                <label class="label">Usuario</label>
                <input style="display: none;" type="text" name="btn" value="form_default"/>
                <input class="text" type="text" name="txt" value="'.$_SESSION['user_id'][0].'" disabled/>
                <label class="label">Nombre</label>
				<input class="text" type="text" name="txtnombre" value="'.$_SESSION['docente_nombre'][0].'" autofocus disabled/>
				<label class="label">Apellidos</label>
				<input class="text" type="text" name="txtapellidos" value="'.$_SESSION['docente_apellidos'][0].'" disabled/>
                <label class="label">CURP</label>
                <input class="text" type="text" name="txtcurp" value="'.$_SESSION['docente_curp'][0].'" disabled/>
                <label class="label">RFC</label>
                <input class="text" type="text" name="txtrfc" value="'.$_SESSION['docente_rfc'][0].'" disabled/>
			</div>
			<div class="last">
				<label class="label">Telefono</label>
                <input class="text" type="text" name="txttelefono" value="'.$_SESSION['docente_telefono'][0].'" disabled/>
                <label class="label">Domicilio</label>
                <input class="text" type="text" name="txtdomicilio" value="'.$_SESSION['docente_domicilio'][0].'" disabled/>
				<label class="label">Nivel de estudios</label>
				<select class="select" name="selectnivelestudios" disabled>
				';
					if ($_SESSION['docente_nivel_estudios'][0] == 'Licenciatura')
					{
						echo
						'
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
					}
					elseif ($_SESSION['docente_nivel_estudios'][0] == 'Ingenieria')
					{
						echo
						'
							<option value="Ingenieria">Ingenieria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
					}
					elseif ($_SESSION['docente_nivel_estudios'][0] == 'Maestria')
					{
						echo
						'
							<option value="Maestria">Maestria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Doctorado">Doctorado</option>
						';
					}
					elseif ($_SESSION['docente_nivel_estudios'][0] == 'Doctorado')
					{
						echo
						'
							<option value="Doctorado">Doctorado</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
						';
					}
					echo'
				</select>
				<label class="label">Documentación</label>
				<select class="select" name="selectdocumentacion" disabled>
				';
					if ($_SESSION['docente_documentacion'][0] == 1)
					{
						echo
						'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
					}
					elseif ($_SESSION['docente_documentacion'][0] == 0)
					{
						echo
						'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
					}
					echo'
				</select>
				<label class="label">Observación</label>
				<input class="text" type="text" name="txtobservacion" value="'.$_SESSION['docente_observacion'][0].'" disabled/>
			</div>
			<button class="btn icon icon-confirm" type="submit"></button>
        </form>
    </div>
</div>
<div class="form-options">
	<div class="search">
		<form name="form-search" action="#" method="POST">
			<p>
				<input type="text" class="text" name="search" placeholder="Buscar . . ." maxlength="50">
				<button class="btn-search icon  icon-search" type="submit"></button>
			</p>
		</form>
	</div>
	<div class="options">
		<form action="#" method="POST">
			<button class="btn disabled icon icon-plus" name="btn" value="form_add" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-coding" name="btn" value="form_coding" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btn disabled icon icon-printer" name="btn" value="form_printer" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btnexit icon icon-exit" name="btn" value="form_default" type="submit"></button>
		</form>
    </div>
</div>
';
?>