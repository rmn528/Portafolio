<?php
	//Variables
	$miVariable="ramon lozano";
	
	//imprimo lo que hay en la variable
	echo $miVariable."<br/>";
	
	//le asigno un numero a la variable
	$miVariable=5;
	
	//imprimo la suma de lo que tenga mi variable +3
	echo ($miVariable+3)."<br/>"; 
	
	echo "<hr/>";
	
	//Constantes
	define("BR","<br/>");
	define("NOMBRE","Ramon Lozano");
	define("PI",3.1416);
	
	//imprimo las constantes
	echo NOMBRE.BR;
	echo PI.BR;
	
	echo "<hr/>";
	
	//Arreglos
	
	//inmediatos
	$Ciudades[]="mexico";//declaracion inmediata de la posicion '0' $Ciudades[0]="mexico"
	$Ciudades[1]="USA";
	
	//imprimimos las posiciones del arreglo
	echo $Ciudades[0].BR.$Ciudades[1].BR;
	
	//damos de baja la variable Ciudades
	//unset elimina rastro del identificador (junto con el valor(es) que haya tenido dicho identificador)
	unset($Ciudades);
	
	echo "<hr/>";
	
	//indices en desorden inmediatos
	$Ciudades[50]="mexico";
	$Ciudades[15]="USA";
	
	//imprimimos las posiciones del arreglo
	echo $Ciudades[15].BR.$Ciudades[50].BR;
	
	//damos de baja la variable Ciudades
	unset($Ciudades);
	
	echo "<hr/>";
	
	//funcion Array
	
	//precomputada
	$Ciudades=array("mexico","USA");
	
	//imprimimos las posiciones del arreglo
	echo $Ciudades[0].BR.$Ciudades[1].BR;
	
	//damos de baja la variable Ciudades
	unset($Ciudades);
	
	echo "<hr/>";
	
	//precomputada con clave inicial
	//el operador '=>' sirve para cambiar la clave de inicio de un arreglo
	$Ciudades=array(1=>"mexico","USA");
	
	//imprimimos las posiciones del arreglo
	echo $Ciudades[1].BR.$Ciudades[2].BR;
	
	//damos de baja la variable Ciudades
	unset($Ciudades);
	
	echo "<hr/>";
	
	//precomputada con diferentes claves para los elementos del arreglo
	$Ciudades=array(1=>"mexico",5,43=>"USA",10);
	
	//imprimimos las posiciones del arreglo
	echo $Ciudades[1].BR.$Ciudades[43].BR;
	
	//damos de baja la variable Ciudades
	unset($Ciudades);
	
	echo "<hr/>";
	
	//Arreglos como vectores
	
	//declaramos el arreglo
	$Ciudades=array();
	
	//insertar dato al final del vector
	array_push($Ciudades,"mexico");
	
	//imprimimos el valor
	echo BR.$Ciudades[0].BR;
	
	//insertar dato al principio del arreglo
	array_unshift($Ciudades,"USA");
	
	//imprimimos los valores
	echo $Ciudades[0].BR.$Ciudades[1].BR;
	
	//eliminar dato al final del arreglo
	array_pop($Ciudades);
	
	//imprimimos el valor
	echo $Ciudades[0].BR.$Ciudades[1].BR;
	
	//eliminar dato al principio del arreglo
	array_shift($Ciudades);
	
	//imprimimos el valor
	echo $Ciudades[0].BR;
	
	//damos de baja la variable Ciudades
	unset($Ciudades);
	
	echo "<hr/>";
	
	//declaramos una matriz
	$Ciudades=array(array("guadalajara","toluca","zapopan"),"rio de janeiro",array("mexico","tuxpan"));
	
	echo BR;
	
	//imprimimos la matriz
	echo $Ciudades[0][0].BR;
	echo $Ciudades[0][1].BR;
	echo $Ciudades[0][2].BR;
	echo $Ciudades[1].BR;
	echo $Ciudades[2][0].BR;
	echo $Ciudades[2][1].BR;
?>