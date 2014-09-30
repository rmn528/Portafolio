<?php
	//incluimos la clase padre
	include("Padre.class.php");
	
	//declaramos una clase hija que herede de los atributos y metodos de la padre
	class Hija extends Padre{
		
		//atributos
		public $atributoHijo;
		
		//metodo constructor
		public function __construct($valor=0){
			//mandamos llamar el constructor del padre, cuando llamamos un metodo de la clase
			//padre, esa llamada debe ser lo primero que se debe de ejecutar
			//para acceder a los atributos y metodos del padre se hace con la palabra reservada
			//parent seguido del operador de resolucion de ambito (::) y el nombre del metodo o atributo
			//del padre
			parent::__construct($valor);
			$this->setAtributo($valor);
		}
			
		//metodos de interfaz
		//forsosamente hay que implementar el metodo que se etiqueto
		//como abstracto, sino se implementa automaticamente esta clase
		//seria abstracta y marcaria error por que la misma no se a declarado
		//como tal
		public function setAtributo($valor){
			if(is_numeric($valor))
				$this->atributoPadre=$this->atributoHijo=$valor;
			else
				$this->atributoPadre=$this->atributoHijo=0;
		}
		
		//si no utilizamos el metodo del padre y creamos una funcion que tenga
		//el mismo nombre automaticamente se sobre escribe por la del hijo
		public function getAtributo(){
			return $this->atributoHijo;
		}
		
		public function getAtributoPadre(){
			return parent::getAtributo();
		}
	}
?>