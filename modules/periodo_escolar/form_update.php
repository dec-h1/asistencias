<?php
session_start();

if ($_SESSION['permisos'] != 'admin')
{
	header('Location: /');
	exit();
}
	
$periodo_escolar = $_POST['txtperiodoescolar'];

$_SESSION['perido_escolar'] = array();
$_SESSION['pe_activo'] = array();
$_SESSION['pe_inicia'] = array();
$_SESSION['pe_termina'] = array();

$consulta = "SELECT * FROM periodos_escolares WHERE periodo_escolar = '".encrypt($periodo_escolar, $key)."'";

if ($resultado = $conexion -> query($consulta))
{
	if ($lista = mysqli_fetch_array($resultado))
	{
		$_SESSION['periodo_escolar'][0] = decrypt($lista['periodo_escolar'], $key);
		$_SESSION['pe_activo'][0] = decrypt($lista['activo'], $key);
		$_SESSION['pe_inicia'][0] = decrypt($lista['fecha_inicio'], $key);
		$_SESSION['pe_termina'][0] = decrypt($lista['fecha_fin'], $key);
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
                <label class="label">Periodo escolar</label>
                <input style="display: none;" type="text" name="txtperiodoescolar" value="'.$_SESSION['periodo_escolar'][0].'"/>
                <input class="text" type="text" name="txt" value="'.$_SESSION['periodo_escolar'][0].'" disabled/>
				<label class="label">Activo</label>
				<select class="select" name="selectactivo" autofocus>
				';
					if ($_SESSION['pe_activo'][0] == 1)
					{
						echo
						'
							<option value="1">Si</option>
							<option value="0">No</option>
						';
					}
					else
					{
						echo
						'
							<option value="0">No</option>
							<option value="1">Si</option>
						';
					}
				echo '
				</select>
            </div>
			<div class="last">
                <label class="label">Inicia</label>
                <input class="date" type="date" name="dateinicia" value="'.$_SESSION['pe_inicia'][0].'" required/>
                <label class="label">Termina</label>
                <input class="date" type="date" name="datetermina" value="'.$_SESSION['pe_termina'][0].'" required/>
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