<?php
	//cachamos los datos del formulario por metodo post
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$caracteristicas=$_POST['caracteristicas'];
	$menu=$_POST['menu'];
	$sexo=$_POST['sexo'];
	
	//validamos si existe la variable y que no este vacia
	//isset verifica que la variable haya sido instanciada en algun momento (que exista)
	if(isset($nombre) && $nombre!="")
		echo $nombre."<br/>";
		
	if(isset($pass) && $pass!="")
		echo $pass."<br/>";
		
	if(isset($caracteristicas) && $caracteristicas!="")
		echo $caracteristicas."<br/>";
		
	if(isset($menu) && $menu!="")
		echo $menu."<br/>";
		
	if(isset($sexo) && $sexo!="")
		echo $sexo."<br/>";
		
	if (isset($_POST['idioma'])){
		foreach($_POST['idioma'] as $value){
			if($value!="")
				echo $value."<br/>";
		}
	}
?>