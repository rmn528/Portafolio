<?php
	//incluimos la clase hija
	include("Hija.class.php");
	
	//creamos una instancia
	$miObjeto=new Hija(10);
	
	//imprimimos el atributo del padre
	echo "este atributo es del padre: ".$miObjeto->getAtributoPadre()."<br/>";
	
	//imprimimos el atributo del hijo
	echo "este atributo es del hijo: ".$miObjeto->getAtributo()."<br/>";
	
	//escribimos un nuevo valor para los atributos de padre e hijo
	$miObjeto->setAtributo(20);
	
	//imprimimos el atributo del padre
	echo "este atributo es del padre: ".$miObjeto->getAtributoPadre()."<br/>";
	
	//imprimimos el atributo del hijo
	echo "este atributo es del hijo: ".$miObjeto->getAtributo()."<br/>";
	
	//asignamos un valor al atributo del padre y otro valor al atributo del hijo
	//esto no se debe de hacer, para eso estan los metodos de interfaz, solo es para
	//medios didacticos
	$miObjeto->atributoPadre=30;
	$miObjeto->atributoHijo=40;
	
	//imprimimos el atributo del padre
	echo "este atributo es del padre: ".$miObjeto->getAtributoPadre()."<br/>";
	
	//imprimimos el atributo del hijo
	echo "este atributo es del hijo: ".$miObjeto->getAtributo()."<br/>";
?>