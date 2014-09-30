<?php 

	//declaramos la ruta del archivo
	$archivo="elCaballo.html";
	
	//verificamos que el archivo de texto exista
	if(is_file($archivo)){
	
		//abrimos el archivo en modo lectura ('r')
		$abre=fopen($archivo,'r');
		
		//inicialisamos contenido
		$contenido="";
		
		//leeremos todo el archivo pero solo una cierta cantidad de caracteres por vuelta
		//mientras no sea el final del archivo
		while(!feof($abre)){
			
			//leemos caracteres del archivo
			//fgets:lee la cantidad de caracteres que se le especifiquen menos 1
			$contenido.=fgets($abre,4093);
			
		}
		
		//imprimimos el contenido obtenido
		echo $contenido;
		
		//cerramos el archivo
		fclose($abre);
	}
?>