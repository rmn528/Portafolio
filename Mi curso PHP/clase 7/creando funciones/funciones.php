<?php
	/*
		la necesidad de crear funciones en php seda por lo complicado que era realizar y dar mantenimiento a procesos
		complicados, asi que con esta utilidad se empesaron a separar en pequeñas tareas que resolvian cosas especificas
		y con un bajo grado de cohesión para poder adaptarlas a cualquier proyecto.
		
		tipos de funciones:
			-sin parametros que no retornan
			-con parametros que no retornas
			-sin parametros y que retornan
			-con parametros y que retornan
			-arreglos como parametros (puede o no retornar)
			-que retornen paquetes de datos (arreglos, consultas a una base de datos, etc.)
			 (puede o no llevar parametros)
		
		Recomendacion: se recomienda que las funciones sean mudas (no hacer echo o print dentro de ellas),
		al omitir esto es mas facil su uso y discresion, si las funciones estan destinadas a no regresar nada
		se recomienda que regresen un valor booleano (true o false) para asi poder evaluar si pudo realizar su
		funcionamiento y las funciones que retornan datos se recomienda que tenga como valor de retorno por defecto
		el booleano false, ya que haci podemos hacer validaciones (recuerde que el if toma como verdadero cualquier
		cosa que sea diferente de 0, false y NULL)
	*/
	
	//-sin parametros que no retornan
	function imprimeHola(){
		
		//imprimimos el mensaje
		echo "hola<br/>";
	}
	
	//-con parametros que no retornas
	function imprimeVariable($variable){
		
		//imprimimos la variable
		echo $variable."<br/>";
	}
	
	//-sin parametros y que retornan
	function generaTabla(){
		
		//guadamos una tabla en la variable
		$tabla='<table border="2"><tr><td></td></tr></table>';
		
		//retornamos la tabla
		return $tabla;
	}
	
	//-con parametros y que retornan
	function creaTabla($campo){
		
		//guardamos la tabla que mostrara la variable $campo en la variable
		$tabla='<table border="2"><tr><td>'.$campo.'</td></tr></table>';
		
		//retornamos la tabla
		return $tabla;
	}
	
	//-arreglos como parametros
	function imprimeArreglo($arreglo){
		
		//interpretamos cada campo del arreglo como un valor individual
		foreach($arreglo as $valor){
			
			//llamamos a la funcion imprimeVariable anteriormente definida
			imprimeVariable($valor);
		}
	}
	
	//-que retornen paquetes de datos
	function validaCampos($arreglo){
		
		//creamos el vector de comfirmacion
		$comfirmacion=array();
		
		//interpretamos cada campo del arreglo como un valor individual
		foreach($arreglo as $valor){
			
			//verificamos que el valor exista y que no este vacia
			if(isset($valor) && $valor!=""){
			
				//empujamos el booleano true dentro del arreglo
				array_push($comfirmacion,true);
				
			//sino cumple con alguna de esas condiciones
			}else{
				
				//empujamos el booleano false dentro del arreglo
				array_push($comfirmacion,false);
			}
		}
		
		//retornamos el vector con los resultados de cada campo
		return $comfirmacion;
	}
?>