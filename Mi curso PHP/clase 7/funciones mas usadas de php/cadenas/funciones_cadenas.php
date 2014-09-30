<?php
	/*
		en php surgio la necesidad de hacer validaciones mas extremas por la gran incompetencia que
		presentaba el usuario para manejar este tipo de aplicaciones; por lo tanto eso le dio entrada
		a las funciones para el manejo de cadenas
	*/ 
	
	//----------SECUENCIAS DE ESCAPE EN PHP--------------
	// "\r": secuencia de escape para retorno de carro
	// "\n": secuencia de escape para salto de linea
	// " ": secuencia de escape espacio
	// "\t": secuencia de escape para tabulacion
	// "\0": secuencia de escape byte NULL
	// "\x0B": secuencia de escape tabulador vertical
	//---------------------------------------------------
	
	//creamos una variable que acomule una cadena de texto
	$variable="\\hola, este mensaje sera manipulado \r\n por ' las funciones de php\r\n, una cadena mas";
	
	//limpiamos la variable de caracteres de escape
	//trim: elimina los caracteres de escape que se puedan encontrar en una cadena 
	//y retorna la cadena limpia de estos
	$variable=trim($variable);
	
	echo $variable."<br/>"."<br/>";
	
	//stripslashes: Devuelve un string con las barras invertidas retiradas. 
	//(\' se convierte en ' y así sucesivamente.) Barras invertidas dobles (\\) se convierten en una sencilla (\). 
	$variable=stripslashes($variable);
	
	echo $variable."<br/>"."<br/>";
	
	//addslashes: Devuelve una cadena con barras invertidas delante de los carácteres que necesitan escaparse 
	//en situaciones como consultas de bases de datos, etc. Los carácteres que se escapan son la 
	//comilla simple ('), comilla doble ("), barra invertida (\) y NUL (el byte NULL). 
	$variable=addslashes($variable);
	
	echo $variable."<br/>"."<br/>";
	
	//cambiamos el texto a mayusculas
	//strtoupper: regresa la cadena que le pasen como parametro en mayusculas
	$variable=strtoupper($variable);
	
	echo $variable."<br/>"."<br/>";
	
	//cambiamos el texto a minusculas
	//strtolower: regresa la cadena que le pasen como parametro en minusculas
	$variable=strtolower($variable);
	
	echo $variable."<br/>"."<br/>";
	
	//sacamos la longitud de la cadena
	//strlen: te regresa la longitud de la cadena numericamente
	$numCaracteres=strlen($variable);
	
	echo $numCaracteres."<br/>"."<br/>";
	
	//tomamos un segmento de la cadena
	//substr: regresa una parte seccionada de la cadena
	//campos:(cadena a seccionar, a partir de cual caracter voy a seccionar(las cadenas inician desde 0),
	// cuantos caracteres voy a tomar)
	$troso=substr($variable,6,4);
	
	echo $troso."<br/>"."<br/>";
	
	//strpos: sirve para saber en que posicion aparece por primera vez un caracter o cadena de caracteres buscados
	//campos: (cadena donde buscare, cadena a buscar)
	//regresa la posicion numericamente de la primera aparicion
	$posicion=strpos($variable,"hola");
	
	echo $posicion."<br/>"."<br/>";
	
	//strstr: devuelve como resultado toda la cadena de texto hasta su final a partir del caracter especificado
	//campos: (cadena, caracter especificado, modo invertido)
	$resto=strstr($variable,",");
	
	echo $resto."<br/>"."<br/>";
	
	//modo invertido activado: regresara la cadena de donde empiesa hasta llegar al caracter especificado
	$restoInvertido=strstr($variable,",",true);
	
	echo $restoInvertido."<br/>"."<br/>";
	
	//strtr: Traduce ciertos caracteres o reemplaza substrings
	//campos:(cadena donde buscara para hacer reemplazos, cadena que quiero que reemplaze, con que cadena quiero que reemplaze)
	//otro modo:(cadena donde buscara para hacer reemplazos,arreglo de la forma clave=>valor)
	$cadenaReemplazada=strtr($variable,"a","A");
	
	echo $cadenaReemplazada."<br/>"."<br/>";
	
	//otro modo
	//OJO: se le puede poner mas claves y valores al arreglo y la funcion strtr reemplazara todas las coincidencias
	//que encuentre en el texto de golpe
	$reemplazos=array("e"=>"E");
	$otraCadenaReemplazada=strtr($variable,$reemplazos);
	
	echo $otraCadenaReemplazada."<br/>"."<br/>";
	
	//dividimos una cadena por un delimitador
	//explode: divide una cadena especificando el delimitador de cada divicion y retorna un arreglo con tantos campos como 
	//cantidad de delimitadores mas uno haya encontrado
	//campos: (caracter delimitador, cadena a dividir)
	$cadenas=explode(",",$variable);
	
	foreach($cadenas as $valor){
		echo $valor."<br/>"."<br/>";
	}
	
	//ensamblamos un arreglo a cadena con un delimitador
	//implode: ensambla un arreglo uniendolo cada campo con un delimitador y lo regresa como una sola cadena
	$cadena=implode(",",$cadenas);
	
	echo $cadena."<br/>"."<br/>";
	
	//damos de baja a $variable
	unset($variable);
	
	//declaramos una variable con texto
	$variable="gerardo528-1@hotmail.com";
	
	//verificamos si es una direccion de correo electronico valida
	//investigar mas sobre filter_var
	if(filter_var($variable,FILTER_VALIDATE_EMAIL)){
		echo "correo valido <br/>"."<br/>";
	}else{
		echo "correo no valido <br/>"."<br/>";
	}
	
	//damos de baja a $variable
	unset($variable);
	
	//declaramos una variable con texto
	$variable="hola\n\n";
	
	//comvertimos los daltos de lineas a tags <br/>
	$variable=nl2br($variable);
	
	echo $variable;
	
?>