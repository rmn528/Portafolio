<?php 
	//funcion para un contador de visitas con archivos
	function conVisitas(){
		//declaramos la ruta del archivo
		$archivo="visitas.txt";
		
		//declaramos un contador inicializado en 0
		$contador=0;
		
		//verificamos si el archivo existe
		if(is_file($archivo)){
			
			//abrimos el archivo en modo lectura
			$abre=fopen($archivo,"r");
			
			//obtenemos el contador actual
			$contador=fgets($abre,"4093");
		}
		
		//incrementamos el contador
		$contador++;
		
		//abrimos el archivo en modo escritura
		$abre=fopen($archivo,"w");
		
		//escribimos el contador en el archivo
		fwrite($abre,$contador);
		
		//cerramos el archivo
		fclose($abre);
	}
	
	//funcion para validar campos
	function validarCampos($arreglo){
		//verificamos si es un arreglo
		if(is_array($arreglo)){
			
			//declaramos un arreglo donde guardaremos los resultados
			$validacion=array();
			
			//interpreto cada elemento del arreglo como valor
			foreach($arreglo as &$valor){
				
				//saco el tamaño en caracteres del valor
				$tamaño=strlen($valor);
				
				//verificamos que exista, que no este vacio, que si tamaño sea menor o igual a 200
				//que no contenga caracteres de escape, quitamos barras y escapamos comillas
				if(isset($valor) && $valor!="" && $tamaño<=200 && $tamaño==strlen($valor=trim($valor))
				&& $tamaño==strlen($valor=stripslashes($valor)) && $tamaño==strlen($valor=addslashes($valor)) &&
				$tamaño==strlen($valor=strip_tags($valor))){
					
					  //Arreglo (asociativo) que ayuda a limpiar acentos
					  $fix=array('&Aacute;' => 'A' , '&Eacute;' => 'E' , '&Iacute;' => 'I' , '&Oacute;' => 'O' , '&Uacute;' => 'U' ,
					  '&Ntilde;' => 'N','&aacute;' => 'a' , '&eacute;' => 'e' , '&iacute;' => 'i' , '&oacute;' => 'o' , '&uacute;' => 'u' 
					  ,'&ntilde;' => 'n','Á' => 'A' , 'É' => 'E' , 'Í' => 'I' , 'Ó' => 'O' , 'Ú' => 'U' , 'Ñ' => 'N','á' => 'a' , 
					  'é' => 'e' , 'í' => 'i' , 'ó' => 'o' , 'ú' => 'u' , 'ñ' => 'n');
					  
					  //remplazamos caracteres extraños
					  $valor=strtr($valor,$fix);
					  
					  //cambiamos todo a mayusculas
					  $valor=strtoupper($valor);
					  
					  //empujamos el resultado
					  array_push($validacion,true);
				}else{
					
					//empujamos el resultado
					array_push($validacion,false);
				}
			}
			
			//retornamos el arreglo con los resultados
			return $validacion;
			
		}else{
			
			//creamos un arreglo con ese elemento
			$nuevoArreglo=array($arreglo);
			
			//lo mandamos como un arreglo a la funcion de validacion
			return validarCampos($nuevoArreglo);
		}
	}
	
	//funcion para validar las respuestas de funciones
	function validarRespuesta($arreglo){
		//verificamos si es un arreglo
		if(is_array($arreglo)){
			
			//recorremos el arreglo para verificar sus respuestas
			foreach($arreglo as $valor){
				
				//como es un arreglo con valores booleanos simplemente evaluamos
				if(!$valor){
					
					//si llega hasta este punto significa hay algo mal
					//con uno de los campos evaluados
					return false;
				}
			}
			
			//si llega hasta este punto significa que todo esta correcto
			return true;
			
		}else{
			
			//declaramos un nuevo arreglo
			$nuevoArreglo=array($arreglo);
			
			//lo mandamos como un arreglo a la funcion de validacion
			return validarRespuesta($nuevoArreglo);
		}
	}
	
	//funcion para validar correos
	function validaCorreo($correo){
		//lo evaluamos con un filtro para saber si esta bien estructurado
		if(isset($correo) && filter_var($correo,FILTER_VALIDATE_EMAIL)){
			
			return true;
		}else{
			
			return false;
		}
	}
	
	//funcion para generar filas para una tabla apartir de un arreglo
	function generarFilas($arreglo){
		//verificamos si es un arreglo
		if(is_array($arreglo)){
			
			//declaramos un variable donde guardaremos la fila
			$fila="<tr>";
			
			//recorremos el arreglo para verificar sus respuestas
			foreach($arreglo as $valor){
				
				//cada elemento del arreglo sera una celda
				$fila.="<td>".$valor."</td>";
			}
			
			//cerramos la etiqueta de la fila 
			$fila.="</tr>";
			
			//retornamos la fila
			return $fila;
		}else{
			
			//declaramos un nuevo arreglo
			$nuevoArreglo=array($arreglo);
			
			//lo mandamos como un arreglo a la funcion de validacion
			return validarRespuesta($nuevoArreglo);
		}
	}
?>