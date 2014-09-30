<?php
	//creamos una conexion al gestor de bases de datos
	//mysqli_connect(): te permite crear una conexion con algun gestor de bases de datos
	//campos: (nombre del host o direccion IP, nombre de usiario MySql,contraseña del usuario)
	//tiene dos campo mas, investigar de ellos en el api de php
	$conexion=mysqli_connect("localhost","root","");
	
	//usamos la base de datos prueba
	//mysqli_query(): te permite hacer una consulta al gestor de bases de datos
	//campos:(conexion al gestor, la consulta)
	mysqli_query($conexion,"USE pruebas");
	
	//traemos toda la informacion de la tabla alumnos
	//el asterisco (*) es un comodin que hace referencia a "todo"(todos los campos)
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos");//otra forma "SELECT campo1,campo2,campo3 FROM nombre_tabla"
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		//las claves van de 0 a n-1, n=al numero de campo que se solicito en la consulta
		//mysqli_fetch_array():interpreta una linea traida de una consulta como un arreglo
		//para poder leer cada fila de la consulta con esta funcion hay que hacerlo con un
		//bucle como lo haciamos para leer archivos y/o leer directorios
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//condicional WHERE sirve para filtrar datos dentro de una consulta realizada(consultas mas especificas)
	/*
		-----------------Operadores para utilizar con WHERE------------------------
		
		= __________________ igual a
		> __________________ mayor que
		< __________________ menor que
		>= _________________ mayor o igual
		<= _________________ menor o igual
		<> _________________ distinto de
		LIKE _______________ que incluya
		
		Casos incluyentes de LIKE
		//simbolo de porcentaje (%) hace referencia al "resto de la cadena"
		...WHERE carrera LIKE 'c%'); traera solo las carreras que empiecen con 'c'
		...WHERE carrera LIKE '%c'); traera solo las carreras que terminen con 'c'
		...WHERE carrera LIKE '%c%'); traera solo las carreras que contengan la 'c'
		
		----------------------------------------------------------------------------
	*/
	
	//traemos toda la informacion de la tabla alumnos que su carrera empiece con 'c'
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos WHERE carrera LIKE 'c%'");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos el nombre y la edad de la tabla que su edad este entre 19 y 23 años
	//AND: es la conjuncion
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos WHERE edad BETWEEN 19 AND 23");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos el nombre y la edad de la tabla que su edad no este entre 19 y 23 años
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos WHERE edad NOT BETWEEN 19 AND 23");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos el nombre y la edad de la tabla que su carrera sea de computacion o de informatica
	//OR: la disyuncion
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos WHERE carrera='computacion' OR carrera='informatica'");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos el nombre y la edad de la tabla que su carrera sea de computacion o de informatica
	//IN: busqueda de concidencias
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos WHERE carrera IN ('informatica','administracion de empresas')");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos toda la informacion de la tabla alumnos ordenada desendentemente
	//ORDER BY: ordenas los datos de una consulta, valor por defecto ASC (ascendente)
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos ORDER BY edad DESC");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos toda la informacion de la tabla alumnos limitando la cantidad de filas a traer
	//LIMIT: limita la consulta a cierta cantidad de resultados
	//se especifican dos valores: "apartir de que numero de resultado devolver" y "cuantos resultados devolvera"
	$qry=mysqli_query($conexion,"SELECT * FROM alumnos LIMIT 0,3");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		while($arreglo=mysqli_fetch_array($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo[0]."<br/>";
			echo $arreglo[1]."<br/>";
			echo $arreglo[2]."<br/>";
			echo $arreglo[3]."<br/>";
		}
	}
	
	echo "<hr/>";
	
	//traemos las carreras de la tabla alumnos seleccionando valores no repetidos
	//DISTINCT: solo seleciona valores unicos de un campo
	$qry=mysqli_query($conexion,"SELECT DISTINCT carrera FROM alumnos");
	
	//preguntamos cuantos datos trajo de la consulta
	$filas=mysqli_num_rows($qry);
	
	//validamos si trajo alguna fila la consulta
	if($filas>0){
		
		//interpretamos cada fila de la consulta como un arreglo de claves numericas
		//mysqli_fetch_assoc(): interpreta una consulta como un arreglo asociativo
		while($arreglo=mysqli_fetch_assoc($qry)){
			
			//imprimimos los campos de la consulta
			echo $arreglo['carrera']."<br/>";
		}
	}
	
	echo "<hr/>";
	
	/*
		-----------------------Funciones Estadisticas------------------------------
		
		Funcion --------- Que devuelve
		
		COUNT ___________ la cantidad de registros seleccionador por una consulta
		MIN _____________ el valor minimo almacenado en ese campo
		MAX _____________ el valor maximo almacenado en ese campo
		SUM _____________ la sumatoria de ese campo
		AVG _____________ el promedio de ese campo
		
		--------------------------------------------------
	*/
	
	//sacamos la cantidad de campos que cumplen con la consulta
	$qry=mysqli_query($conexion,"SELECT COUNT(*) FROM alumnos WHERE id BETWEEN 1 AND 3");
	
	//interpretamos la consulta como un arreglo
	$arreglo=mysqli_fetch_array($qry);
	
	//imprimimos la cantidad de campos que cumplen con las caracteristicas de la consulta
	echo $arreglo[0]."<br/>";
	
	//sacamos el promedio del campo edad de la tabla alumnos
	$qry=mysqli_query($conexion,"SELECT AVG(edad) FROM alumnos");
	
	//interpretamos la consulta como un arreglo
	$arreglo=mysqli_fetch_array($qry);
	
	//imprimimos el promedio del campo edad de la tabla alumnos
	echo $arreglo[0]."<br/>";
	
	//dejamos de usar la base de datos
	mysqli_query($conexion,"QUIT pruebas");
	
	//cerramos la conexion con el gestor de base de datos
	mysqli_close($conexion)
?>