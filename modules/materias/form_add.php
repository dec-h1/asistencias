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
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-users" action="insert.php" method="POST">
            <div class="first">
                <label class="label">ID Materia</label>
                <input class="text" type="text" name="txtmateria" value="" maxlength="10" required autofocus/>
                <label class="label">Nombre</label>
				<input class="text" type="text" name="txtnombremateria" value="" maxlength="50" required/>
			</div>
			<div class="last">
                <label class="label">Semestre</label>
				<input class="text" type="number" name="txtsemestremateria" maxlength="2" min="1" max="12" list="defaultsemestres"/>
				<datalist id="defaultsemestres">
					<?php
						for($i = 1; $i <= 12; $i ++)
						{
							echo
							'
								<option value="'.$i.'">
							';
						}
					?>
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