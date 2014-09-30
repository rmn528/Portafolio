<?php 
	//declaramos una variable con la ruta
	//getcwd: regresa el directorio actual donde se esta trabajando
	$dir=getcwd();
	
	//verificamos que realmente sea una carpeta
	if(is_dir($dir)){
		
		//abrimos el directorio
		$abreDir=opendir($dir);
		
		//declaramos un ciclo donde empesaremos a leer cada elemento del directorio dado
		//"barrido de carpeta"
		while(($archivos=readdir($abreDir))!==false){
			
			//filtramos todo aquel archivo que sea carpeta
			if(!is_dir($archivos)){
				
				//obtenemos la informacion del archivo
				//pathinfo:Devuelve información acerca de una ruta de archivo, 
				//devuelve un array asosiativo con los campos 'dirname','basename','extension','filename'
				$info=pathinfo($archivos);
				
				//mostramos el nombre del directorio donde se encuentra el archivo
				echo $info['dirname']."<br/>";
				
				//mostramos el nombre y extension del archivo
				echo $info['basename']."<br/>";
				
				//mostramos la extension del archivo
				echo $info['extension']."<br/>";
				
				//mostramos el nombre del archivo
				echo $info['filename']."<br/>";
			}
		}
	}
?>