<?php
	//#2
	
	//validamos si recibimos el boton de envio
	if(isset($_POST['enviar'])){
		
		//cachamos los campos de formularios en variables
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		//guardamos las referencias de los datos obtenidos
		$arreglo=array(&$user,&$pass);
		
		//mandamos a validar los campos del formulario
		$validacion=validarCampos($arreglo);
		
		//mandamos el resultado de las validaciones para recibir una respuesta concreta
		$respuesta=validarRespuesta($validacion);
		
		//verificamos
		if($respuesta){
			
			//creamos la conexion al gestor de bases de datos
			$conexion=mysqli_connect($host,$usuario,$passwordBD);
			
			//usuamos la base de datos
			mysqli_query($conexion,"USE carrito");
			
			//traemos la contraseña de la base de datos
			$qry=mysqli_query($conexion,"SELECT contrasena FROM usuarios WHERE usuario='".$user."'");
			
			//interpretamos la consulta como arreglo asociativo
			$consultaContraseña=mysqli_fetch_assoc($qry);
			
			//cachamos cuantas filas trajo
			$filas=mysqli_num_rows($qry);
			
			//dejamos de usar la base de datos
			mysqli_query($conexion,"QUIT carrito");
			
			//cerramos la conexion
			mysqli_close($conexion);
			
			//verificamos que la informacion del usuario exista
			if($filas==1){
				
				//encriptimos la contraseña
				$contraseña=crypt(md5(sha1($pass)),"PD");
				
				//verificamos que coincida las contraseñas
				if($contraseña==$consultaContraseña['contrasena']){
				
					//verificamos si se selecciono el checkbox de no cerrar sesion
					if(isset($_POST['logout'])){
						
						//guardamos el idioma que el usuario selecciono
						$idioma=(isset($_GET['idioma']) && $_GET['idioma']!="")?$_GET['idioma']:"";
						
						//creamos la cookie con el usuario
						setcookie("logout",$user,time()+7*24*60*60);
						
						//validamos si seleciono algun idioma
						if($idioma!=""){
							
							//creamos una cookie con el idioma seleccionado
							setcookie("idioma",$idioma,time()+7*24*60*60);
						}
						
					}
						
					//creamos la sesion
					$_SESSION['usuario']=$user;
					
					?>
						<script language="javascript" type="text/javascript">
							document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
						</script>
					<?php
				}else{
					?>
						<script language="javascript" type="text/javascript">
							alert("USUARIO O CONTRASEÑA INCORRECTOS");
							document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
						</script>
					<?php
				}
			}else{
				?>
                	<script language="javascript" type="text/javascript">
						alert("ESE USUARIO NO ESTA REGISTRADO");
						document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
					</script>
                <?php
			}
		}else{
			?>
				<script language="javascript" type="text/javascript">
                    alert("FAVOR DE LLENAR LOS CAMPOS");
                    document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                </script>
            <?php
		}
	}
?>