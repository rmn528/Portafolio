<?php 
	
	//definimos una constante para incriptar (pudimos aver declarado una variable eso es indiferente)
	define("CADENA","pato");
	
	//hay 3 funciones para encriptamientos de cadenas sha1, md5 y el crypt
	
	//encriptamos la cadena por sha1
	$encriptamiento_sha1=sha1(CADENA);
	
	//encriptamos la cadena por md5
	$encriptamiento_md5=md5(CADENA);
	
	//encriptamos la cadena por crypt, cuando no se especifica el segundo 
	//parametro php genera una semilla automatica de forma aleatoria
	$encriptamiento_crypt=crypt(CADENA);
	
	//encriptamos la cadena por crypt, cuando se especifica el segundo parametro 
	//se generara una cadena especifica que nunca cambiara, la longitud que puede 
	//tener la semilla son de uno a dos caracteres, si se le ponen mas de dos los ignorara, 
	//solo tomara los primeros 2
	$encriptamiento_crypt_con_semilla=crypt(CADENA,"NM");
	
	//imprimimos las cadenas encriptadas
	echo $encriptamiento_sha1."<br/>";
	
	echo $encriptamiento_md5."<br/>";
	
	echo $encriptamiento_crypt."<br/>";
	
	echo $encriptamiento_crypt_con_semilla."<br/>";
	
	//estas funciones se pueden combinar para su uso y generar cadenas mas dificiles de desifrar,
	//se pueden usar en cualquiera de sus posibles combinaciones
	$hibridacion=crypt(md5(sha1(CADENA)),"RP");
	
	//imprimimos la cadena encriptada
	echo $hibridacion."<br/>";
?>