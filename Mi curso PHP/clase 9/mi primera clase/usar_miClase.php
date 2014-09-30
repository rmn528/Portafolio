<?php
	//las clases deben tener sus propios archivos .php, asi que para instanciarlas
	//es necesario hacerlo en otro archivo
	
	//incluimos la clase
	include("MiClase.class.php");
	
	//creamos una instancia de la clase (un objeto)
	//new: es el encargado de reservar la memoria para el objeto y 
	//ejecutar el constructor del mismo
	
	//en la clase anterior echa el constructor tiene parametros y en php no
	//existe la sobrecarga como tal, pero con la asignacion echa a los argumentos del 
	//constructor es posible simular la sobrecarga
	$miObjeto=new MiClase();
	
	//asignamos valores a los atributos de la clase
	$miObjeto->setPrivada(5);
	$miObjeto->setProtegida(11);
	$miObjeto->setPublica(9);
	
	//mostramos los valores de los atributos de la clase
	echo $miObjeto->getPrivada()."<br/>";
	echo $miObjeto->getProtegida()."<br/>";
	echo $miObjeto->getPublica()."<br/>";
	
	//usamos el metodo suma de la clase
	$suma=$miObjeto->sumar(5,6);
	
	//imprimimos la suma
	echo $suma."<br/>";
	
	//mostramos la constante definida dentro de la clase
	echo $miObjeto->getConstante()."<br/>";
	
	//destruimos el objeto
	$miObjeto=NULL;
	
	//mostramos la variable estatica
	//esta como ya existe antes de que sea instanciada una clase
	//se puede acceder a las atibutos y metodos estaticos
	//simplemente poniendo primero el nombre de la clase,
	//seguido del operador de resolucion de ambito (::)
	//y luego con el nombre del atributo o metodo estatico
	echo MiClase::$estatico."<br/>";
	
	//ejecutamos los metodos estaticos
	MiClase::setEstatico(9);
	echo MiClase::getEstatico()."<br/>";
	$multiplicacion=MiClase::multiplicar(5);
	echo $multiplicacion."<br/>";
	
	//creamos una instancia del objeto
	$miObjeto=new MiClase(5,6,7);
	
	//mostramos los valores de los atributos de la clase
	echo $miObjeto->getPrivada()."<br/>";
	echo $miObjeto->getProtegida()."<br/>";
	echo $miObjeto->getPublica()."<br/>";
	
	//destruimos el objeto
	$miObjeto=NULL;
?>