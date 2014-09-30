<?php 
	//declaramos una variable con la ruta del archivo a eliminar
	$archivo="hola.txt";
	
	//eliminamos el archivo
	//unlink: elimina un archivo (no importa la extencion del archivo) del servidor
	unlink($archivo);
?>