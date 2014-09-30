<?php
	//declaramos una clase
	abstract class Padre{
			
		//atributos de la clase
		public  $atributoPadre;
		
		//metodo constructor
		public function __construct($valor=0){
			$this->setAtributo($valor);
		}
		
		//metodos de interfaz
		//cuando una clase es abstracta por lo menos 
		//debe de haber un metodo abstracto
		abstract public function setAtributo($valor);
		
		public function getAtributo(){
			return $this->atributoPadre;
		}
	}
?>