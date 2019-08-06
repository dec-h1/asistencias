<?php
session_start();

if ($_SESSION['permisos'] != 'admin')
{
	header('Location: /');
	exit();
}

$_SESSION['user_id'] = array();
$_SESSION['alumno_nombre'] = array();
$_SESSION['alumno_apellidos'] = array();

$consulta = "SELECT * FROM alumnos WHERE usuario = '".encrypt($_POST['txtuserid'], $key)."'";

if ($resultado = $conexion -> query($consulta))
{
	if ($lista = mysqli_fetch_array($resultado))
	{
		$_SESSION['user_id'][0] = decrypt($lista['usuario'], $key);
		$_SESSION['alumno_nombre'][0] = decrypt($lista['nombre'], $key);
		$_SESSION['alumno_apellidos'][0] = decrypt($lista['apellidos'], $key);
		$_SESSION['alumno_curp'][0] = decrypt($lista['curp'], $key);
		$_SESSION['alumno_rfc'][0] = decrypt($lista['rfc'], $key);
		$_SESSION['alumno_domicilio'][0] = decrypt($lista['domicilio'], $key);
		$_SESSION['alumno_telefono'][0] = decrypt($lista['telefono'], $key);
		$_SESSION['alumno_especialidad'][0] = decrypt($lista['especialidad'], $key);
		$_SESSION['alumno_documentacion'][0] = decrypt($lista['documentacion'], $key);
		$_SESSION['alumno_observacion'][0] = decrypt($lista['observacion'], $key);
	}
}

echo'
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
   <div class="body">
        <form name="form-update-users" action="update.php" method="POST">
            <div class="first">
                <label class="label">Usuario</label>
                <input style="display: none;" type="text" name="txtuserid" value="'.$_SESSION['user_id'][0].'"/>
                <input class="text" type="text" name="txt" value="'.$_SESSION['user_id'][0].'" disabled/>
                <label class="label">Nombre</label>
				<input class="text" type="text" name="txtnombre" value="'.$_SESSION['alumno_nombre'][0].'" autofocus maxlength="25" required/>
				<label class="label">Apellidos</label>
                <input class="text" type="text" name="txtapellidos" value="'.$_SESSION['alumno_apellidos'][0].'" maxlength="50" required/>
				<label class="label">CURP</label>
                <input class="text" type="text" name="txtcurp" value="'.$_SESSION['alumno_curp'][0].'" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required/>
                <label class="label">RFC</label>
                <input class="text" type="text" name="txtrfc" value="'.$_SESSION['alumno_rfc'][0].'" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required/>
			</div>
			<div class="last">
				<label class="label">Telefono</label>
				<input class="text" type="text" name="txttelefono" value="'.$_SESSION['alumno_telefono'][0].'" maxlength="10" required/>
                <label class="label">Domicilio</label>
                <input class="text" type="text" name="txtdomicilio" value="'.$_SESSION['alumno_domicilio'][0].'" maxlength="100" required/>
				<label class="label">Especialidad</label>
                <input class="text" type="text" name="txtespecialidad" value="'.$_SESSION['alumno_especialidad'][0].'" maxlength="20" required/>
				<label class="label">Documentación</label>
				<select class="select" name="selectdocumentacion">
				';
					if ($_SESSION['alumno_documentacion'][0] == 1)
					{
						echo
						'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
					}
					elseif ($_SESSION['alumno_documentacion'][0] == 0)
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
				<input class="text" type="text" name="txtobservacion" value="'.$_SESSION['alumno_observacion'][0].'" maxlength="200"/>
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