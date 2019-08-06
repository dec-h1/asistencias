<?php
	if ($_SESSION['codautentificado'] != 'si23//PBrazZerS//XxX'.$_SESSION['usuario'])
	{
		header('Location: /');
		exit();
	}
?>