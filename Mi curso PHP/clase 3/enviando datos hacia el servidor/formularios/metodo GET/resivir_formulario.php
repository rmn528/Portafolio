<?php
	$nombre=$_GET['nombre'];
	$pass=$_GET['pass'];
	$caracteristicas=$_GET['caracteristicas'];
	$menu=$_GET['menu'];
	$sexo=$_GET['sexo'];
	$idioma=$_GET['idioma'];
	echo $nombre."<br/>";
	echo $pass."<br/>";
	echo $caracteristicas."<br/>";
	echo $menu."<br/>";
	echo $sexo."<br/>";
	echo $idioma[0]." ".$idioma[1]."<br/>";
?>