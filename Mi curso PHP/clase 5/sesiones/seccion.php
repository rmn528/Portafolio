<?php
	//#4
	
	//iniciamos el objeto de session
	session_start();
	
	//verificamos que exista la sesion y que no este vacia
	if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=""){
		
		//imprimimos el usuario que ingreso al loguin
		echo "Hola ".$_SESSION['usuario']." estas en la sesion.php"."<br/>";
		?>
        	<a href="menu.php">Regresar al men&uacute;</a>
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