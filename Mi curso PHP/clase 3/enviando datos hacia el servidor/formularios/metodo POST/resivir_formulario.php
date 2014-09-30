<?php
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$caracteristicas=$_POST['caracteristicas'];
	$menu=$_POST['menu'];
	$sexo=$_POST['sexo'];
	$idioma=$_POST['idioma'];
	echo $nombre."<br/>";
	echo $pass."<br/>";
	echo $caracteristicas."<br/>";
	echo $menu."<br/>";
	echo $sexo."<br/>";
	echo $idioma[0]." ".$idioma[1]."<br/>";
?>