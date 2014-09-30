<?php
	//class: permite definir una clase concreta
	//el nombre de la clase debe ser el mismo que el del archivo empesando la primera con mayuscula
	class MiClase{
		
		//const: permite declarar constantes (no ocupa ponerse la visibilidad)
		const HOLA="hola";
		
		//static: permite declarar atributos y metodos estaticos (puede llevar visibilidad)
		//pueden guardar constantes y arreglos, mas no puede ser inicializada con una variable,
		//valor de devolucion de una funcion o con un objeto,
		//esta pueden ser utilizadas sin necesidad de instanciar un objeto de la clase que las contenga
		static $estatico="esta es una variable estatica";
		
		//niveles de visibilidad
		/*
			private: los atributos y metodos que esten declaradas con esta visibilidad solo podran
			ser usados por la clase que los contenga (no aplica para herencia)
			
			protected: los atributos y metodos que esten declaradas con esta visibilidad solo podran
			ser usadas por la clase misma, por herencia y clases padres
			
			public: los atributos y metodos que esten declaradas con esta visibilidad podran ser 
			usadas en cualquier y por cualquier lado
			
			NOTA: si no se especifica la visibilidad se tomara como publico
		*/
		
		//atributos
		private $privada;
		protected $protegida;
		public $publica;
		
		//metodos
		
		//metodo constructor (sirve para reservar en memoria una instancia de esta clase)
		//este tipo de argumentos aplica para funciones y metodos,
		//lo que estamos diciendo aqui es "si no te llega ningun argumento para recibirlo
		// en los paramentros pues asignales un valor (en este caso 0), pero si te llega
		//algun argumento pues ignoramos la asignacion y trabajamos con lo que llego"
		public function __construct($valor1=0,$valor2=0,$valor3=0){
			//para usar atributos o metodos dentro de la misma clase se necesita anteponer la pseudo variable
			//$this seguido del operador flecha (->)
			$this->setPrivada($valor1);
			$this->setProtegida($valor2);
			$this->setPublica($valor3);
		}
		
		//en programacion orientada a objetos debemos de cuidar en como exibimos los
		//atributos de la clase, la recomendacion de como se deve acceder a ellas es por
		//funciones de envoltura llamadas getter and setter, una de cada una para cada atributo,
		//estas funciones tambien son llamadas metodos de interfaz
		
		//los metodos setter sirver para restablecer valores a los atributos
		//y tambien pueden hacer validaciones a dichos valores para no dejar entrar cualquier cosa
		//y si el valor es algo no permitido se le asigna al atributo un valor por defecto
		public function setPrivada($valor){
			if($valor>=0 && $valor<10)
				$this->privada=$valor;
			else
				$this->privada=0;
		}
		
		public function setProtegida($valor){
			if($valor>=0 && $valor<10)
				$this->protegida=$valor;
			else
				$this->protegida=0;
		}
		
		public function setPublica($valor){
			if($valor>=0 && $valor<10)
				$this->publica=$valor;
			else
				$this->publica=0;
		}
		
		//los metodos getter simplemente se limitan a mostrar el contenido de los atributos
		public function getPrivada(){
			return $this->privada;
		}
		
		public function getProtegida(){
			return $this->protegida;
		}
		
		public function getPublica(){
			return $this->publica;
		}
		
		//metodos de la clase
		public function sumar($valor1,$valor2){
			return $this->privada+$valor1+$valor2+$this->getPublica();
		}
		
		//metodos estaticos
		//dentro de los metodos estaticos no puede existir la pseudo variable $this, por el motivo
		//que los elementos estaticos existen sin necesidad de que se instancie la clase
		public static function multiplicar($valor){
			
			//cuando se quiere usar un atributo estatico o una constante dentro de los metodos de
			//una clase (independientemente que sea estatico o no) se necesita anteponer la palabra
			//reservada self seguido del operador de resolucion de ambito (::)
			return self::$estatico*$valor;
		}
		
		public static function setEstatico($valor){
			//no se puede inicializar una variable estatica con una variable y con 
			//lo anterior mensionado, pero si se puede asignar esas cosas ya despues de definida
			self::$estatico=$valor;
		}
		
		//las variables estaticas pueden o no tener metodos de interfaz
		public static function getEstatico(){
			return self::$estatico;
		}
		
		//las constantes para poderlas usar fuera de la clase necesitan metodo de interfaz
		//por que solo existen dentro de las instancias de la clase
		public function getConstante(){
			return self::HOLA;
		}
		
		//las clases en php pueden tener metodo destructor y se ejecuta cuando dejamos de referenciar
		//una instancia de la clase, no se necesita como tal poner un destructor por que cuando
		//se deja de refenciar una instancia automaticamente se libera la memoria
		public function __destruct(){
			//se recomienda que las clases sean mudas, pero por fines didacticos se hara una exepcion
			echo "destruyendo<br/>";
		}
	}
?>