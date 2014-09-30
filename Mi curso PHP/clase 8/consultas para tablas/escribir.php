<?php 
	//creamos una conexion al gestor de bases de datos
	$conexion=mysqli_connect("localhost","root","");
	
	//usamos la base de datos prueba
	mysqli_query($conexion,"USE pruebas");
	
	//agregamos el juego de caracteres a usar
	//'utf8' es el juego de caracteres que contiene por ejemplo la eñe(ñ) o acentos
	@mysqli_query($conexion,"SET NAMES 'utf8'");
	
    //valores a insertar en una consulta
	$nombre="'panfilo mendigo";
	$edad=20;
	$carrera="industrial";
	
	//intentanmos insertar los datos
	//INSERT INTO: consulta que permite insertar valores a una tabla especificando que campos y que valores para dichos campos
	if(!mysqli_query($conexion,"INSERT INTO alumnos(nombre,edad,carrera) VALUES('".$nombre."',".$edad.",'".$carrera."')")){
		echo "no se pudo realizar la consulta<br/>";
	}
	
	//mysqli_real_escape_string:escapa los caracteres que pueden fallar al momento de una consulta
	//campos: (conexion al gestor de base de datos, cadena a escapar)
	//Las cadenas a escapar codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
	//retorna una cadena escapada como valor izquierdo
	$nombre=mysqli_real_escape_string($conexion,$nombre);
	
	//intentanmos insertar los datos
	if(!mysqli_query($conexion,"INSERT INTO alumnos(nombre,edad,carrera) VALUES('".$nombre."',".$edad.",'".$carrera."')")){
		echo "no se pudo realizar la consulta<br/>";
	}
	
	//dejamos de usar la base de datos
	mysqli_query($conexion,"QUIT pruebas");
	
	//cerramos la conexion con el gestor de base de datos
	mysqli_close($conexion)
?>
