<?php
	$key = 'passencrypt';

	function encrypt($string, $key)
	{
		$result = '';
		
		for ($i=0; $i<strlen($string); $i++)
		{
			$char = substr($string, $i, 1);
			
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			
			$char = chr(ord($char)+ord($keychar));
			
			$result.=$char;
		}
		return base64_encode($result);
	}

	function decrypt($string, $key)
	{
		$result = '';
		
		$string = base64_decode($string);

		for ($i=0; $i<strlen($string); $i++)
		{
			$char = substr($string, $i, 1);
			
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			
			$char = chr(ord($char)-ord($keychar));
			
			$result.=$char;
		}
		return $result;
	}
	
	function fecha($fecha)
	{
		$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		
		$d = substr($fecha, 0, 2);
		
		$m = substr($fecha, 4, 2);
		
		$a = substr($fecha, 6);
		
		return $d.' de '.$meses[$m - 1].' de 20'.$a;
	}

	function mes($mes)
	{
		$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

		return $meses[$mes - 1];
	}

	function semestre($semestre)
	{
		$semestres = array('Primer', 'Segundo', 'Tercer', 'Cuarto', 'Quinto', 'Sexto');
		
		return $semestres[$semestre - 1];
	}
?>