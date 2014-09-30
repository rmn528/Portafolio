<?php 
	//declaramos una variable con el archivo
	$archivo=$_FILES['archivo'];
	
	//verificamos si existe el archivo a subir al servidor
	//is_uploaded_file:verifica si se a enviado un archivo al servidor por metodo POST
	//pero para saber si a sido cargado no se verifica con el campo 'name' del arreglo 
	//asociativo del $archivo por que simplemente no funciona la funcion, tiene que ser
	//con el nombre temporal del archivo que actualmente existe en la maquina del usuario
	if(is_uploaded_file($archivo['tmp_name'])){
		
		//mostramos el nombre del archivo
		echo $archivo['name']."<br/>";
		
		//mostramos el nombre temporal delarchivo
		echo $archivo['tmp_name']."<br/>";
		
		//mostramos el tipo del archivoarchivo
		echo $archivo['type']."<br/>";
		
		//mostramos si el archivo tiene algun error
		echo $archivo['error']."<br/>";
		
		//mostramos el tamaño del archivo en bytes
		echo $archivo['size']."<br/>";
		
		//Movemos el archivo a la carpeta
		//move_uploaded_file:mueve un archivo cargado hacia el servidor
		//move_uploaded_file(nombre_temporal,ruta+nombre_y_extencion(donde quiero guardar el archivo en servidor y
		//con cual nombre y extencion lo quiero guardar));
		//validamos si no lo pudo mover
		//en si no se mueve el archivo real, sino que se mueve el temporal del archivo que se crea en la maquina del usuario
		//al abrir el archivo con esta funcion, por eso hay que renombrarla
		if(!move_uploaded_file($archivo['tmp_name'],getcwd().'/'.$archivo['name'])){
			
			//mostramos mensaje de error
			echo "No se pudo cargar el archivo al servidor";
		}
	}else{
		
		//mostramos mensaje de error
		echo "no se recibio archivo alguno";
		
		//creamos la copia de una imagen de fuera de servicio en su lugar
		copy(getcwd()."/images.jpg",getcwd()."/fuera_sevicio.jpg");
	}
?>