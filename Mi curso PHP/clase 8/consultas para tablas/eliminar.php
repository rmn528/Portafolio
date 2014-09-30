<?php 
	//creamos una conexion al gestor de bases de datos
	$conexion=mysqli_connect("localhost","root","");
	
	//usamos la base de datos prueba
	mysqli_query($conexion,"USE pruebas");
	
	//intentanmos eliminar los datos
	//DELETE: consulta que permite eliminar registros en una tabla seleccionada
	//sino especificamos el WHERE en esta consulta eliminara todo el campo carrera,
	//por lo tanto hay que especificar a que registros queremos eliminar
	if(!mysqli_query($conexion,"DELETE FROM alumnos WHERE carrera='medicina'")){
		echo "no se pudo realizar la consulta<br/>";
	}
	
	//dejamos de usar la base de datos
	mysqli_query($conexion,"QUIT pruebas");
	
	//cerramos la conexion con el gestor de base de datos
	mysqli_close($conexion)
?>