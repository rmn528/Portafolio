<?php
	//recibo variables que estan concatenadas a una URL y accedo a ellas por la matriz GET
	$variable=$_GET['variable'];
	$otraVariable=$_GET['otraVariable'];
	
	//imprimo variables enviadas por URL
	echo $variable."<br/>"; 
	echo $otraVariable;
?>