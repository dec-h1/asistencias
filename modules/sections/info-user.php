<div class="info-user">
	<div class="wrapper">
		<img src="/images/<?php echo $_SESSION['imagen'];?>" />
		<span class="name-user"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellidos'].' ('.$_SESSION['usuario'].') | '.'<a id="modal-elegir-periodo-escolar" href="#" class="periodo-escolar">'.$_SESSION['periodo_escolar']."</a>"; ?></span>
		<span class="logout"><a href="/modules/logout.php">Cerrar Sesión</a></span>
		<span class="fecha"><?php echo fecha(date('d-m-y')); ?></span>
	</div>
</div>