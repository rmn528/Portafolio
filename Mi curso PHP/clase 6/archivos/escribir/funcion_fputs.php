<?php
	//ruta del archivo
	$archivo="info.txt";
	
	//abrimos el archivo en modo escritura
	$abrir=fopen($archivo,"w");
	
	//creamos un mensaje para el archivo
	$mensaje="esto fue escrito desde otro archivo por php";
	
	//escribimos en el archivo
	//fputs: es un alias del fwrite
	fputs($abrir,$mensaje);
	
	//cerramos el archivo
	fclose($abrir); 
?>