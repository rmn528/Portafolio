<?php

	//ruta del archivo
	$archivo="elCaballo.html";
	
	//verificamos que el archivo de texto exista
	if(is_file($archivo)){
	
		//a $lineas lo convertimos en una matriz con tantas celdas como lineas(renglones) tenga el archivo a leer
		$lineas=file($archivo);
		
		//imprimimos el archivo con el ciclo que mas les guste
		
		//inicializamos un limite
		$limite=count($lineas);
		
		//declaramos un ciclo con sus respectivos parametros
		for($i=0;$i<$limite;$i++){
			
			//imprimimos linea por linea de la matris $lineas
			echo "<p> La linea ".($i+1)." contiene: ".$lineas[$i]."</p>"; 
		}
	}
?>