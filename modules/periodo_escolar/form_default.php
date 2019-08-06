<?php
    session_start();

    if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
	}
?>
<div class="form-table-data">
	<div class="head">
		<h1 class="titulo">Periodo Escolar</h1>
    </div>
	<table>
		<tr>
			<th>Periodo Escolar</th>
			<th>Activo</th>
			<th>Inicia</th>
			<th>Termina</th>
			<th class="edit center"><a class="icon icon-edit"></a></th>
			<th class="delete center"><a class="icon icon-trash"></a></th>
    	</tr>
		<?php
			for ($i = 0; $i < $_SESSION['total_periodos_escolares']; $i++)
			{ 
	    	    echo'
		    		<tr>
		    			<td>'.$_SESSION["periodo_escolar"][$i].'</td>
						<td>'.$_SESSION["pe_activo"][$i].'</td>
						<td>'.$_SESSION["pe_inicia"][$i].'</td>
						<td>'.$_SESSION["pe_termina"][$i].'</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtperiodoescolar" value="'.$_SESSION["periodo_escolar"][$i].'"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
								<input style="display:none;" type="text" name="txtperiodoescolar" value="'.$_SESSION["periodo_escolar"][$i].'"/>
								<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
							</form>
						</td>
					</tr>
				';
			}
		?>
	</table>
	<div class="pages">
		<ul>
			<?php
			    for	($n = 1; $n <= $tpages; $n++)
				{
					if ($page == $n)
					{
						echo '<li class="active"><form name="form-pages" action="#" method="POST"><button type="submit" name="page" value="'.$n.'">'.$n.'</button></form></li>';
					}
					else
					{
						echo '<li><form name="form-pages" action="#" method="POST"><button type="submit" name="page" value="'.$n.'">'.$n.'</button></form></li>';
					}
				}
			?>
	    </ul>
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
			<button class="btn icon icon-plus" name="btn" value="form_add" type="submit"></button>
		</form>
		<form action="#" method="POST">
			<button class="btncoding icon icon-coding" name="btn" value="form_coding" type="submit" disabled></button>
		</form>
		<form action="#" method="POST">
			<button class="btnprinter icon icon-printer" name="btn" value="form_printer" type="submit" disabled></button>
		</form>
		<form action="/">
			<button class="btnexit icon icon-exit" type="submit"></button>
		</form>
    </div>
</div>