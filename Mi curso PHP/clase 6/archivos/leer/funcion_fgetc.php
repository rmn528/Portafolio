<?php 

	//declaramos la ruta del archivo
	$archivo="elCaballo.html";
	
	//verificamos que el archivo de texto exista
	if(is_file($archivo)){
	
		//abrimos el archivo en modo lectura ('r')
		$abre=fopen($archivo,'r');
		
		//inicialisamos contenido
		$contenido="";
		
		//leeremos todo el archivo caracter por caracter en cada vuelta
		//mientras no sea el final del archivo
		while(!feof($abre)){
			
			//leemos caracter por caracter del archivo
			//fgetc:lee solo un caracter a la ves
			$contenido.=fgetc($abre);
			
		}
		
		//imprimimos el contenido obtenido
		echo $contenido;
		
		//cerramos el archivo
		fclose($abre);
	}
?>