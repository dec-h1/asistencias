<?php
session_start();

if ($_SESSION['permisos'] != 'admin')
{
	header('Location: /');
	exit();
}

$_SESSION['materia'] = array();
$_SESSION['nombre_materia'] = array();
$_SESSION['semestre_materia'] = array();

$consulta = "SELECT * FROM materias WHERE materia = '".encrypt($_POST['txtmateria'], $key)."'";

if ($resultado = $conexion -> query($consulta))
{
	if ($lista = mysqli_fetch_array($resultado))
	{
		$_SESSION['materia'][0] = decrypt($lista['materia'], $key);
		$_SESSION['nombre_materia'][0] = decrypt($lista['nombre'], $key);
		$_SESSION['semestre_materia'][0] = decrypt($lista['semestre'], $key);
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
				<label class="label">ID Materia</label>
				<input style="display: none;" type="text" name="txtmateria" value="'.$_SESSION['materia'][0].'"/>
				<input class="text" type="text" name="txtmateria" value="'.$_SESSION['materia'][0].'" disabled/>
				<label class="label">Nombre</label>
				<input class="text" type="text" name="txtnombremateria" value="'.$_SESSION['nombre_materia'][0].'" maxlength="50" required autofocus/>
            </div>
			<div class="last">
                <label class="label">Semestre</label>
				<input class="text" type="number" name="txtsemestremateria" value="'.$_SESSION['semestre_materia'][0].'" maxlength="2" min="1" max="12" list="defaultsemestres"/>
				<datalist id="defaultsemestres">
				';
					for($i = 1; $i <= 12; $i ++)
					{
						echo
						'
							<option value="'.$i.'">
						';
					}
				echo
				'
				</datalist>
				<label style="opacity: 0;" class="label">Salto de linea</label>
				<input style="opacity: 0;" class="text" type="text" name="" value="" disabled/>
			</div>
			<button class="btn icon icon-confirm" type="submit"></button>
        </form>
    </div>
</div>
<div class="form-options">
	<div class="search">
		<form name="form-search" action="#" method="POST">
			<p>
				<input type="text" class="text" name="search" placeholder="Buscar...">
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