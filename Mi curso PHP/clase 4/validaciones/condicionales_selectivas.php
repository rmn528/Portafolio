<?php
	//declaramos constantes
	define("BR","<br/>");
	define("HR","<hr/>");
	
	//selectiva simple "if"
	if(30<50)
		echo "30 es menor".BR;
	
	//selectiva simple condicional multiple(usar operadores relacionales y unirlos con los operadores logicos)
	if(30<50 && 50>40)
		echo "50 es mayor".BR;
		
	echo HR;
	
	//selectiva doble "if/else"
	if(30>50)
		echo "30 es menor".BR;
	else
		echo "50 es mayor".BR;
	
	//selectiva doble condicional multiple(usar operadores relacionales y unirlos con los operadores logicos)
	if(30<50 && 50>40)
		echo "50 es mayor".BR;
	else
		echo "el 40 es mayor".BR;
	
	echo HR;
		
	//selectiva multiple "switch"
	switch(1){
		
		//casos
		case 1:
			echo "hola".BR;
			break;
			
		case 2:
			echo "esto es".BR;
			break;
		
		//caso por defecto
		default: 
			echo "selectiva multiple".BR;
			break;
	}
	
	
?>