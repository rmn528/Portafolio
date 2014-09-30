<?php

	class Carrito{
		
		protected $articulos=array();
		
		public function __construct($user){
			
			//incluimos las variables globales
			include("datos.php");
			
			//nos conectamos al gestor de base de datos
			$conexion=mysqli_connect($host,$usuario,$passwordBD);
			
			//usamos la base de datos carrito
			mysqli_query($conexion,"USE carrito");
			
			//traemos todo del carrito del usuario y verificamos que haya podido traer filas
			if($qry=mysqli_query($conexion,"SELECT * FROM carrito".$user."")){
				
				//agregamos los articulos al vector
				while($art=mysqli_fetch_assoc($qry)){
				
					$this->articulos[$art['idItem']."|".$art['usuario']]=$art['cantidad'];
				}
				
			}else{
			
				//creamos la base de datos para almacenar los articulos del usuario
				@mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS carrito".$user."(id INT NULL AUTO_INCREMENT PRIMARY KEY,
				usuario VARCHAR(100) DEFAULT NULL,
				idItem INT DEFAULT NULL,
				cantidad INT DEFAULT NULL)");
			}
			
			//dejamos de usar la base de datos carrito
			mysqli_query($conexion,"QUIT carrito");
			
			//nos desconectamos del gestor de base de datos
			mysqli_close($conexion);
		}
		
		public function agregarArticulo($id,$usuarioItem,$cantidad,$user,$conexion){
			
			//verificamos que no exista el articulo
			if(!isset($this->articulos[$id.'|'.$usuarioItem])){
				
				//agregamos un articulo al carrito
				$this->articulos[$id.'|'.$usuarioItem]=$cantidad;
				
				//insertarmos el producto al carrito del usuario
				mysqli_query($conexion,"INSERT INTO carrito".$user."(usuario,idItem,cantidad) 
				VALUES('".$usuarioItem."',".$id.",".$cantidad.")");
				
			}else{
				
				//agregamos un articulo al carrito
				$this->articulos[$id.'|'.$usuarioItem]+=$cantidad;
				
				//actualizamos el campo cantidad del carrito del usuario
				mysqli_query($conexion,"UPDATE carrito".$user." 
				SET cantidad=".$this->articulos[$id.'|'.$usuarioItem]." WHERE idItem=".$id." AND usuario='".$usuarioItem."'");
			}
		}
		
		
		public function getArticulos(){
			
			//regresamos el vertor	
			return $this->articulos;	
		}
	}
?>