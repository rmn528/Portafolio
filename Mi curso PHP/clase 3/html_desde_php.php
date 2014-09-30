<?php
	//declaramos una variable donde armaremos una tabla
	$tabla;
	
	//abrimos la estiqueta de la tabla
	$tabla="<table>";
	
	//abrimos una etiqueta para fila de tabla
	$tabla.="<tr>";
	
	//abrimos una etiqueta para una celda
	$tabla.="<td>";
	
	//escribimos un mensaje en la tabla
	$tabla.="hola, esto es una tabla armada desde php";
	
	//cerramos etiquetas de la tabla
	$tabla.="</td></tr></table>";
	 
?>
<html>
    <head>
    	<title>HTML desde PHP</title>
    </head>

    <body>
    	<center><?php echo $tabla;?></center>
    </body>
</html>