<?php
	//obtenemos el timeStamp hasta este momento 
	//time(): regresa el timeStamp transcurrido desde las 0 
	//horas del 01/01/1970 hasta nuestros dias en segundos
	$timeStamp=time();
	
	echo $timeStamp."<br/>";
	
	//convertimos el timeStamp a un formato mas humano
	//getdate(): obtenemos un formato mas entendible del timeStamp y lo regresa como arreglo
	//campos: (timeStamp)
	$detalles=getdate($timeStamp);
	
	//hora
	echo $detalles['hours']."<br/>";
	
	//minutos
	echo $detalles['minutes']."<br/>";
	
	//segundos
	echo $detalles['seconds']."<br/>";
	
	//dia del mes, en numero
	echo $detalles['mday']."<br/>";
	
	//mes, en numero
	echo $detalles['mon']."<br/>";
	
	//año, en numero
	echo $detalles['year']."<br/>";
	
	//dia de la semana, en numero (comienza en 0 para el domingo, el 1 para el lunes, etc.)
	echo $detalles['wday']."<br/>";
	
	//dias transcurridos desde el principio del año, en numero
	echo $detalles['yday']."<br/>";
	
	//dia de la semana, la palabra completa, en ingles
	echo $detalles['weekday']."<br/>";
	
	//mes, la palabra completa, en ingles
	echo $detalles['month']."<br/>";
	
	//otra forma de mostrar fechas
	/*
		date(): muestra una fecha con un formato especifico dado
		parametros:(formato de fecha o hora,un timeStamp 
		(segundo parametro es opcional, si no se especifica la funcion
		entiende que se quiere el timeStamp actual))
	*/
	
	/*
		-------------Formatos para la funcion date()-------------------
		
		hora, de 01 a 12 ____________________________________________ h
		hora, de 00 a 23 ____________________________________________ H
		hora, sin ceros, de 1 a 12 __________________________________ g
		hora, sin ceros, de 0 a 23 __________________________________ G
		minutos, de 00 a 59 _________________________________________ i
		segundos, de 00 a 59 ________________________________________ s
		dia del mes, con ceros, de 01 a 31 __________________________ d
		dia del mes, sin ceros, de 1 a 31 ___________________________ j
		mes, con ceros, de 01 a 12 __________________________________ m
		mes, sin ceros, de 1 a 12 ___________________________________ n
		nombre completo del mes, en ingles __________________________ F
		abreviatura del mes, 3 letras, en ingles ____________________ M
		año, cuatro cifras __________________________________________ Y
		año, dos cifras _____________________________________________ y
		dia de la semana, en numero(comienza en 0 para domingo)______ w
		dias trancurridos desde el principio del año, en numero _____ z
		dia de la semana, la palabra completa, en ingles ____________ l (es "ele" minuscula)
		abreviatura del dia de la semana, 3 letras, en ingles _______ D
		numero de dias del mes, de 28 a 31 __________________________ t
		segundos desde el 1ro de enero de 1970(timeStamp) ___________ U
		diferencia horaria en segundos (de -43200 a 432000) _________ Z
		am o pm _____________________________________________________ a
		AM o PM _____________________________________________________ A
		si el años es bisiesto ("1") o no ("0") _____________________ L
		Sufijo ordinal para los dias, en ingles, 2 caracteres _______ S
		
		---------------------------------------------------------------
		dentro de la funcion date se pueden especificar separadores o palabras
		(con la unica excepcion de las lestras del listado precente, ya que
		si las incluimos, serian reemplazadas por su valor de fecha u hora).
	*/
	
	//guardamos la cadena formateada de fecha
	$fecha=date("d-m-Y H:i:s");
	
	echo $fecha."<br/>";
	
	//guardamos la cadena formateada de fecha con un timeStamp especificado
	$fecha=date("D/M/y h:i:s",1451606399);
	
	echo $fecha."<br/>";
	
	//especificar una zona horaria
	//ver las zonas horarias soportadas pos php en http://php.net/manual/es/timezones.php
	date_default_timezone_set("America/Mexico_City");
	
	//dia, mes y año a valor de timestamp
	//mktime(): toma como parametros una fecha y hora dadas y 
	//nos devuelve un numero entero en formato de timeStamp
	//campos: (hora,minutos,segundos,mes,dia,año,
	//horario de verano(1 horario de verano, 0 horario de invierno, -1 si se desconoce))
	//el ultimo argumento es opcional
	$momentoFecha=mktime(23,59,59,12,24,2020);
	
	echo $momentoFecha."<br/>";
	
	//verificamos si una fecha es correcta o no
	//checkdate(): te dice si es una fecha valida o no (true o false)
	//campos: (mes,dia,año)
	//esta funcion dara como validas las fechas entre el año 0 y el 32767 inclusive,
	//meses del 1 al 12 y dias entre el 1 y el 28 a 31
	$fecha=checkdate(12,32,2020);
	if($fecha){
		echo "fecha correcta<br/>";
	}else{
		echo "fecha incorrecta<br/>";
	}
?>