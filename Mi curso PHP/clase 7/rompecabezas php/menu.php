<?php
	//#4
	
	//verificamos que exista la sesion y que no este vacia
	if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=""){
		
		//imprimimos el usuario que ingreso al loguin
		echo "Hola ".$_SESSION['usuario']."<br/>";
		
		//imprimimos el nombre de la sesion de este usuario y su ID
		echo session_name()."=".session_id()."<br/>";
		?>
        	<!--al igual que el scrip este segmento html esta dentro 
            	del php, solo se mostrara si se cumple con la condicion-->
        	<a href="?modulo=seccion">Ir a seccion.php</a>
            <br/>
        	<a href="?modulo=cerrar_sesion">Cerrar sesion</a>
        <?php
		
	//si no existe la sesion es por que no la a iniciado 
	}else{
		?>
        	<script language="javascript" type="text/javascript">
				
				//mostramos una alerta de no ha iniciado sesion
				alert("SESION NO INICIADA");
				
				//redireccionamos al formulario de loguin
				document.location.href="main.php";
			</script>
        <?php
	}
?>