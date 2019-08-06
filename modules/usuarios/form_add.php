<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
    </div>
   <div class="body">
        <form name="form-add-users" action="insert.php" method="POST">
            <div class="first">
                <label class="label">Usuario</label>
                <input class="text" type="text" name="txtuserid" value="" autofocus required/>
                <label class="label">Permisos</label>
                <input class="text" type="text" name="txtusertype" value="" required/>			</div>
			<div class="last">
                <label class="label">Contraseña</label>
                <input class="text" type="text" name="txtuserpass" value="" required/>
                <label class="label">Imagen</label>
                <input class="text" type="text" name="txtuserimage" value="" required/>
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