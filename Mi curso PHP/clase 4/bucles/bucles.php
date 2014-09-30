<?php
	//declaramos un contador
	$contador=0;
	
	//se repetira tantas veces hasta que se deje de cumplir la condicion
	while($contador<10){
		
		//imprimimos en que va el contador
		echo $contador."<br/>"; 
		
		//incrementamos el contador
		$contador++;
	}
	
	//damos de baja la variable (desreferenciamos la variable)
	unset($contador);	
	
	echo "<hr/>";
	
	//declaramos un contador
	$contador=0;
	
	//se repetira tantas veces hasta que se deje de cumplir la condicion
	do{
		
		//imprimimos en que va el contador
		echo $contador."<br/>";
		$contador++;
	}while($contador<10);
	
	//damos de baja la variable (desreferenciamos la variable)
	unset($contador);
	
	echo "<hr/>";
	
	//declaracion inmediata de un contador
	//se repetira tantas veces hasta que se deje de cumplir la condicion
	//incrementamos el contador
	for($contador=0;$contador<10;$contador++){
	
		//imprimimos en que va el contador
		echo $contador."<br/>";
	}
		
	//damos de baja la variable (desreferenciamos la variable)
	unset($contador);
	
	echo "<hr/>";
		
	//declaramos un arreglo
	$arreglo=array(5,4,8,3,6); 
	
	//count: esta funcion regresa cuantos elementos contiene un arreglo
	$limite=count($arreglo);
	
	//declaracion inmediata de un contador
	//se repetira tantas veces hasta que se deje de cumplir la condicion
	//incrementamos el contador
	for($contador=0;$contador<$limite;$contador++)
		echo $arreglo[$contador]."<br/>";
		
	//damos de baja las variables (desreferenciamos las variables)
	unset($contador);
	unset($limite);
	unset($arreglo);
	
	echo "<hr/>";
	
	//declaramos un arreglo con claves acomodados de forma aleatoria
	$arreglo=array(43=>5,50=>4,1=>8,32=>3,69=>6); 
	
	//tipo especial de bucle para cuando no se sabe cuantos elementos hay en un arreglo
	//y cuando tambien se desconoce el orden de las claves
	//primera forma: solo obteniendo el valor de cada elemento del arreglo
	foreach($arreglo as $valor){
		
		//imprimimos el valor en esta vuelta del ciclo
		echo $valor."<br/>";
	}
	
	echo "<hr/>";
	
	//segunda forma: obteniendo clave y valor de cada elemento del arreglo
	foreach($arreglo as $clave=>$valor){
		
		//imprimimos la clave y el valor en esta vuelta del ciclo
		echo $clave." => ".$valor."<br/>";
	}
?>