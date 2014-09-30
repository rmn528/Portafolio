<?php
	//Variables de texto
	$nombre="Ramon Gerardo Lozano Franco";
	
	/*	FUNCIONES DE TEXTO (CADENA)	*/
	echo strtoupper($nombre)."<br/>";  //Mayusculas
	echo strtolower($nombre)."<br/>";  //Minusculas
	echo strlen($nombre)."<br/>";	   //Longitud de caracteres
	echo substr($nombre,1,3)."<br/>";  //Obtener subcadena
	
	echo "<hr/>";
	
	//Variable numerica
	$numero=3.1416;
	
	/*	FUNCIONES MATEMATICAS	*/
	echo floor($numero)."<br/>";	//Redondeo hacia abajo
	echo ceil($numero)."<br/>";		//Redondeo hacia arriba
	echo round($numero)."<br/>";	//Redondeo al entero proximo
	echo round($numero,2)."<br/>";	//Redondeo con precisión decimal
	echo rand(1,4)."<br/>";			//Aleatorio
	echo (int)$numero."<br/>";		//Conversión de tipo de dato
									//(devuelve solo enteros)
									
	//Definimos la zona horaria
	date_default_timezone_set("America/Mexico_City");
	
	/*	FUNCIONES DE FECHA	*/
	
	/*	@=void, te libra de errores en tiempo de ejecucion y la omite	*/
	//echo date("d/m/y h:i:s")."<br/>";	//Fecha actual con formato
	
	echo date("d/m/y h:i:s")."<br/>";
?>