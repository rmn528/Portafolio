<?php 
	//creamos una conexion al gestor de bases de datos
	$conexion=mysqli_connect("localhost","root","");
	
	//usamos la base de datos prueba
	mysqli_query($conexion,"USE pruebas");
	
	//agregamos el juego de caracteres a usar
	//'utf8' es el juego de caracteres que contiene por ejemplo la eñe(ñ) o acentos
	@mysqli_query($conexion,"SET NAMES 'utf8'");
	
	//intentanmos actualizar los datos
	//UPDATE: consulta que permite actualizar valores a una tabla especificando que campos y que valores para dichos campos
	//SET: consulta que permite establecer valores a todas las filas en el campo especificado
	//sino especificamos el WHERE en esta consulta actualizaria todo el campo carrera,
	//por lo tanto hay que especificar a que registros queremos actualizar
	if(!mysqli_query($conexion,"UPDATE alumnos SET carrera='informatica' WHERE carrera='computacion'")){
		echo "no se pudo realizar la consulta<br/>";
	}
	
	//dejamos de usar la base de datos
	mysqli_query($conexion,"QUIT pruebas");
	
	//cerramos la conexion con el gestor de base de datos
	mysqli_close($conexion)
?>