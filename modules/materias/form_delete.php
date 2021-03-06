<?php
    session_start();

    if ($_SESSION['permisos'] != 'admin')
	{
		header('Location: /');
		exit();
    }
    
    echo'
        <div class="form-data">
            <div class="head">
                <h1>Atención</h1>
            </div>
            <div class="delete">
                <form name="form-delete-users" action="delete.php" method="POST">
                    <input style="display: none;" type="text" name="txtmateria" value="'.$_POST['txtmateria'].'" />
                    <h1>¿Eliminar registro?</h1>
                    <button class="btn-si icon icon-confirm" type="submit"></button>
                </form>
                <form action="#" method="POST">
                    <button class="btn-no icon icon-delete" name="btn" value="form_default" type="submit"></button>
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