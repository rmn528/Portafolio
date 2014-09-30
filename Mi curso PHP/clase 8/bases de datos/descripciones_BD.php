<?php 
	//creamos la conexion
	$conexion=mysqli_connect("localhost","root","");
	
	//jalamos las bases de datos que tenga el gestor phpMyAdmind
	$query=mysqli_query($conexion,"SHOW DATABASES");
	
	//interpretamos la consulta como arreglo
	while($consulta=mysqli_fetch_array($query)){
			
			//imprimimos el nombre de la base de datos
			echo "Nombre de la BD: ".$consulta[0]."<br/>";
			
			//usamos la base de datos
			mysqli_query($conexion,"USE ".$consulta[0]);
			
			//jalamos las tablas que tenga la base de datos
			$query1=mysqli_query($conexion,"SHOW TABLES");
			
			//interpretamos la consulta como arreglo
			while($consulta1=mysqli_fetch_array($query1)){
				
				//imprimimos el nombre de la tabla
				echo "Nombre de la tabla: ".$consulta1[0]."<br/>";
				
				//jalamos los campos que contengan las tablas de la $query1
				$query2=mysqli_query($conexion,"DESCRIBE ".$consulta1[0]);
				
				//interpretamos la consulta como arreglo
				while($consulta2=mysqli_fetch_array($query2)){
					
					//esta imprimiendo 2 veces la propiedad asi que hare un pequeño filtro para solucionarlo
					$bandera=true;
					
					//jalamos cada propiedad de cada campo de la tabla de la base de datos seleccionada
					foreach($consulta2 as $propiedad){
						
						//filtramos las propiedades que esten vacias
						if($propiedad!=""){
							
							//filtro para que no imprima 2 veces la propiedad
							if($bandera){
								
								//imprimimos el nombre de las propiedades de cada campo de la tabla
								echo "Propiedad: ".$propiedad."|";
								
								//cambiamos la bandera a false
								$bandera=false;
							}else{
							
								//regresamos la bandera a true para el filtro
								$bandera=true;
							}
						}
					}
					echo "<br/>";
				}
				
				echo "<hr/>";
			}
			
			//dejamos de usar la base de datos
			mysqli_query($conexion,"QUIT ".$consulta[0]);
	}
	
	//cerramos la conexion
	mysqli_close($conexion);
?>