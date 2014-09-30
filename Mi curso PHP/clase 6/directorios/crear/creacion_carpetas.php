<?php
	//ruta donde queremos crear la carpeta
	//al anteponer ".." en una ruta lo que hace es salirse un nivel de carpeta
	//por cada ".." que pongas en la ruta te saldras un nivel
	$dir="../crear/Nuevo_directorio";
	
	//intentamos crear una carpeta en el servidor
	//mkdir:crea una carpeta en la URL proporcionada
	//mkdir(ruta,modo de permisos otorgados a la carpeta(ignorado en windows),
	//creacion recursiva de carpetas(valor predeterminado 'FALSE'))
	if(mkdir($dir)){
		
		//cambiamos de carpeta
		//chdir:cambia de carpeta proporcionandole una ruta
		chdir("Nuevo_directorio");
		
		//intentamos crear carpetas de forma recursiva
		//especificamos el orden en que se crearan las carpetas
		// el "." especifica el directorio actual
		$dir="./carpeta1/carpeta2/carpeta3";
		
		//checamos si pudo crear las carpetas
		if(!mkdir($dir,0,true)){
			
			//mostramos mensaje de error
			echo "no se pudo crear las carpetas"."<br/>";
		}
		
	}else{
		
		//mostramos mensaje de error
		echo "no se pudo crear la carpeta"."<br/>";
	}
	
	
?>