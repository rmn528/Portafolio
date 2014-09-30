<?php
	//declaramos una clase
	class Padre{
			
		//atributos de la clase
		public  $atributoPadre;
		
		//metodo constructor
		public function __construct($valor=0){
			$this->setAtributo($valor);
		}
		
		//metodos de interfaz
		public function setAtributo($valor){
			if(is_numeric($valor))
				$this->atributoPadre=$valor;
			else
				$this->atributoPadre=0;
		}
		
		public function getAtributo(){
			return $this->atributoPadre;
		}
	}
?>