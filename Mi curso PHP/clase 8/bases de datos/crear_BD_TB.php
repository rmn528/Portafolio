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
			
			//verificamos si podemos crear la tabla ejemplo
			if(mysqli_query($conexion,"CREATE TABLE ejemplo(id INT NOT NULL AUTO_INCREMENT, usuario VARCHAR(50), edad TINYINT(3), comentario VARCHAR(4093), PRIMARY KEY(id))")){
				
				//insertamos un registro a la base de datos
				mysqli_query($conexion,"INSERT INTO ejemplo(usuario,edad,comentario) VALUES('ramon',19,'hola esto lo inserto php')");
				
			}
		}
		
		//dejamos de usar la base de datos nueva
		mysqli_query($conexion,"QUIT nueva");
	}else{
		
		//creamos la base de datos nueva
		mysqli_query($conexion,"CREATE DATABASE nueva DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci");
		
		?>
        	<script language="javascript" type="text/javascript">
				document.location.href="crear_BD_TB.php";
			</script>
		<?php
	}
	
	//cerramos la conexion
	mysqli_close($conexion);
?>