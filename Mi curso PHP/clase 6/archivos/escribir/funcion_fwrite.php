<?php
	//ruta del archivo
	$archivo="info.txt";
	
	//abrimos el archivo en modo escritura
	$abrir=fopen($archivo,"w");
	
	//creamos un mensaje para el archivo
	$mensaje="esto fue escrito desde php";
	
	//escribimos en el archivo
	//fwrite: escribimos en un archivo de texto, si el archivo no existe lo crea
	fwrite($abrir,$mensaje);
	
	//cerramos el archivo
	fclose($abrir); 
?>