<?php 
	//especificamos la ruta del directorio que queremos intentar eliminar
	$dir="../crear/Nuevo_directorio/carpeta1/carpeta2/carpeta3";
	
	//intentamos eliminar la carpeta
	//rmdir:eliminar la carpeta de la ruta especificada
	//para poder eliminar la carpeta esta debe estar totalmente vacia
	if(!rmdir($dir)){
		
		//mostramos mensaje de error
		echo "no se pudo eliminar la carpeta"."<br/>";
	}
	
	//especificamos la ruta del directorio que queremos intentar eliminar
	$dir="../crear/Nuevo_directorio/carpeta1/carpeta2";
	
	//intentamos eliminar la carpeta
	if(!rmdir($dir)){
		
		//mostramos mensaje de error
		echo "no se pudo eliminar la carpeta"."<br/>";
	}
	
	//especificamos la ruta del directorio que queremos intentar eliminar
	$dir="../crear/Nuevo_directorio/carpeta1";
	
	//intentamos eliminar la carpeta
	if(!rmdir($dir)){
		
		//mostramos mensaje de error
		echo "no se pudo eliminar la carpeta"."<br/>";
	}
	
	//especificamos la ruta del directorio que queremos intentar eliminar
	$dir="../crear/Nuevo_directorio";
	
	//intentamos eliminar la carpeta
	if(!rmdir($dir)){
		
		//mostramos mensaje de error
		echo "no se pudo eliminar la carpeta"."<br/>";
	}
?>