<?php
	//definimos una constante para el salto de linea
	define("BR","<br/>");
	
	//Concatenaciones
	
	//declaro una variable para guardar una cadena
	$miEjemplo="hola";
	
	echo $miEjemplo." como estas".BR;//punto (recomendado)
	echo $miEjemplo," como estas",BR;//coma
	
	//acomular texto
	$miEjemplo.=" y adios :3!!!!";
	echo $miEjemplo.BR;
	
	echo "<hr/>";
	
	//Aritmeticos
	echo (5+6).BR;//suma
	echo (2-1).BR;//resta
	echo (3*3).BR;//multiplicacion
	echo (4/2).BR;//divicion
	echo (9%2).BR;//residuo (modulo)
	
	echo "<hr/>";
	
	//Unitarios
	$num=0;
	echo ($num++).BR; 	//notacion posfija
	echo (++$num).BR;	//notacion prefija
	echo ($num--).BR;	//notacion posfija
	echo (--$num).BR;	//notacion prefija
	
	echo "<hr/>";
	
	//Acomuladores(Asignacion)
	echo ($num=0).BR;	
	echo ($num+=5).BR;	//$num=$num+5
	echo ($num-=3).BR;	//$num=$num-3
	echo ($num*=2).BR;	//$num=$num*2
	echo ($num/=4).BR;	//$num=$num/4
	echo ($num%=2).BR;	//$num=$num%2
	
	echo "<hr/>";
	
	//Relacionales
	echo (1>0).BR;					//mayor que
	echo (2<1).BR;					//menor que
	echo (3>=2).BR;					//mayor igual que
	echo (5<=5).BR;					//menor igual que
	echo (true<>false).BR;			//diferente a
	echo (0!=false).BR;				//diferente a
	echo (0!==false).BR;			//diferente a (conservando identidad)
	echo (0==false).BR;				//igual a
	echo (0===false).BR;			//igual a (conservando identidad)
	
	echo "<hr/>";
	
	//Logicos
	echo (false and false).BR;
	echo (true && true).BR;
	echo (false or true).BR;
	echo (false || false).BR;
	echo (true xor true).BR;
	echo (!false).BR;
	
	echo "<hr/>";
	
	//Ternario
	echo (1>=0 && 3==2)?"ok".BR:"bad".BR;
?>