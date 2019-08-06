<?php
    session_start();

    if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}

	function unique_id($l = 8)
	{
		return substr(md5(uniqid(mt_rand(), true)), 0, $l);
	}
	
	$periodo_generate = strtoupper('pe/'.date('Y').'/'.unique_id(4));
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-users" action="insert.php" method="POST">
            <div class="first">
                <label class="label">Periodo escolar</label>
                <input style=" display: none;" class="text" type="text" name="txtperiodoescolar" value="<?php echo $periodo_generate; ?>"/>
				<input class="text" type="text" name="txt" value="<?php echo $periodo_generate; ?>" disabled/>
				<label class="label">Activo</label>
				<select class="select" name="selectactivo" autofocus>
					<option value="0">Seleccionar</option>
					<option value="1">Si</option>
					<option value="0">No</option>
				</select>
			</div>
			<div class="last">
                <label class="label">Inicia</label>
				<input class="date" type="date" name="dateinicia" value="" required/>
                <label class="label">Termina</label>
				<input class="date" type="date" name="datetermina" value="" required/>
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