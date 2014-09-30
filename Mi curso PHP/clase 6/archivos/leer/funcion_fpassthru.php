<?php 

	//declaramos la ruta del archivo
	$archivo="elCaballo.html";
	
	//verificamos que el archivo de texto exista
	if(is_file($archivo)){
	
		//abrimos el archivo en modo lectura ('r')
		$abre=fopen($archivo,'r');
		
		//imprimimos todo el archivo de golpe
		fpassthru($abre);
		
		//cerramos el archivo
		fclose($abre);
	}
?>