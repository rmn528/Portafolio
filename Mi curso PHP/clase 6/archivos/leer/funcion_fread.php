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
		//feof: regresa true si es el final del archivo
		while(!feof($abre)){
			
			//leemos caracteres del archivo
			//4093 son la cantidad de caracteres que puede contener un renglon de un archivo de texto
			$contenido.=fread($abre,4093);
			
		}
		
		//imprimimos el contenido obtenido
		echo $contenido;
		
		//cerramos el archivo
		fclose($abre);
	}
?>