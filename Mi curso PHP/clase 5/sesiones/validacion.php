<?php
	//#2
	
	//iniciamos el objeto de session
	session_start();
	
	//cachamos los campos del formulario en variables
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	//verificamos que existan las variables y que no esten vacias
	//esta es otra forma de usar el isset, se puedo haber echo
	//isset($user) && isset($pass), es exactamente lo mismo
	if(isset($user,$pass) && $user!="" && $pass!=""){
		
		//verificamos que el usuario y contraseña coincidan
		if($user=="admin" && $pass="1234"){
			
			//creamos la sesion
			$_SESSION['usuario']=$user;
			?>
				<script language="javascript" type="text/javascript">
					
					//referenciamos hacia el menu 
					document.location.href="menu.php";
				</script>
			<?php
		
		//en caso de no coincidir
		}else{
			?>
				<script language="javascript" type="text/javascript">
					
					//mandamos una alerta de usuario no valido
					alert("Contraseña o Usuario invalidos");
					
					//referenciamos hacia el formulario de loguin
					document.location.href="f_loguin.php";
				</script>
			<?php
		}
	}
?>