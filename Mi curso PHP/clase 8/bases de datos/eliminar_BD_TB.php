<?php
	//creamos la conexion al gestor de base de datos
	$conexion=mysqli_connect("localhost","root","");
	
	//verificamos si se puede usar la base de datos nueva
	if(mysqli_query($conexion,"USE nueva")){
		
		//hacemos la consulta para que nos muestre las caracteristicas de la base de datos
		$qry=mysqli_query($conexion,"SHOW TABLES");
		
		//lo interpretamos como arreglo
		$arreglo=mysqli_fetch_array($qry);
		
		if(!isset($arreglo[0]) && $arreglo[0]!="ejemplo"){
				
				//eliminamos un registro a la base de datos
				mysqli_query($conexion,"DELETE FROM ejemplo WHERE usuario='ramon'");
				
				//eliminamos la tabla
				mysqli_query($conexion,"DROP TABLE ejemplo");
		}
		
		//dejamos de usar la base de datos nueva
		mysqli_query($conexion,"QUIT nueva");
		
		//eliminamos la base de datos
		mysqli_query($conexion,"DROP DATABASE nueva");
	}
	
	//cerramos la conexion
	mysqli_close($conexion);
?>