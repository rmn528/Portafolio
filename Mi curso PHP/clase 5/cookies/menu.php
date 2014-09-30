<?php
	//#3
	
	//verificamos que exista la cookie y que no este vacia
	if(isset($_COOKIE['usuario']) && $_COOKIE['usuario']!=""){
		
		//imprimimos el usuario que ingreso al loguin
		echo "Hola ".$_COOKIE['usuario']."<br/>";
		?>
        	<!--al igual que el scrip este segmento html esta dentro 
            	del php, solo se mostrara si se cumple con la condicion-->
        	<a href="seccion.php">Ir a seccion.php</a>
            <br/>
        	<a href="cerrar_sesion.php">Cerrar sesion</a>
        <?php
		
	//si no existe la sesion es por que no la a iniciado 
	}else{
		?>
        	<script language="javascript" type="text/javascript">
				
				//mostramos una alerta de no ha iniciado sesion
				alert("SESION NO INICIADA");
				
				//redireccionamos al formulario de loguin
				document.location.href="f_loguin.php";
			</script>
        <?php
	}
?>