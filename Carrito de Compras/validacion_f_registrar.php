<?php 
	//#4
	
	//validamos si recibimos el boton de registro
	if(isset($_POST['registrar'])){
		
		//aqui cachamos, validamos y registramos el usuario
		//cachamos las variables del formulario
		$nombre=$_POST['nombre'];
		$user=$_POST['usuario'];
		$password=$_POST['password'];
		$correo=$_POST['correo'];
		
		//guardamos las referencias de los datos obtenidos
		$arreglo=array(&$nombre,&$user,&$password);
		
		//mandamos a validar los campos del formulario
		$validacion=validarCampos($arreglo);
		
		//mandamos el resultado de las validaciones para recibir una respuesta concreta
		$respuesta=validarRespuesta($validacion);
		
		//validamos los campos del formulario
		if($respuesta && validaCorreo($correo)){
			
			//creamos la conexion al gestor de bases de datos
			$conexion=mysqli_connect($host,$usuario,$passwordBD);
			
			//usamos la base de datos
			mysqli_query($conexion,"USE carrito");
			
			//hacemos las consulta a la base de datos para verificar que el nick del usuario este disponible
			$qry=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$user."'");
			
			//cachamos cuantas filas trajo
			$filas=mysqli_num_rows($qry);
			
			//verificamos si el nick del usuario que esta escogiendo este libre
			if($filas==0 && !is_dir("dir_usuarios/".$user)){
				
				//creamos la carpeta y la tabla para los archivos del nuevo usuario
				if(@mkdir("dir_usuarios/".$user) && @mysqli_query($conexion,"CREATE TABLE ".$user."(
				  Imagen VARCHAR(100) DEFAULT NULL,
				  Nombre VARCHAR(100) DEFAULT NULL,
				  Precio DECIMAL(10,2) DEFAULT NULL,
				  Pais VARCHAR(20) DEFAULT NULL,
				  Bodega VARCHAR(35) DEFAULT NULL,
				  id INT NULL AUTO_INCREMENT PRIMARY KEY)")){
				
					//especificamos el juego de caracteres
					mysqli_query($conexion,"SET NAMES 'utf8'");
					
					//encriptimos la contraseña
					$contraseña=crypt(md5(sha1($password)),"PD");
					
					//insertamos los datos del usuario en la tabla de usuarios
					mysqli_query($conexion,"INSERT INTO usuarios(nombre,usuario,contrasena,correo) VALUES('".$nombre."','".$user."','".$contraseña."','".$correo."')");
					
					//dejamos de usar la base de datos
					mysqli_query($conexion,"QUIT carrito");
					
					//cerramos la conexion
					mysqli_close($conexion);
					?>
						<script language="javascript" type="text/javascript">
                            alert("GRACIAS POR REGISTRARSE");
                            document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                        </script>
                    <?php
				}else{
					
					//dejamos de usar la base de datos
					mysqli_query($conexion,"QUIT carrito");
					
					//cerramos la conexion
					mysqli_close($conexion);
					
					//checamos si se creo la carpeta
					if(is_dir("dir_usuarios/".$user)){
					
						//eliminamos la carpeta
						@rmdir("dir_usuarios/".$user);	
					}
					?>
						<script language="javascript" type="text/javascript">
                            alert("SURGIO ALGUN ERROR AL INTENTAR REGISTRARLO, INTENTE DE NUEVO, GRACIAS");
                            document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                        </script>
                    <?php
				}
			}else{
				
				//dejamos de usar la base de datos
				mysqli_query($conexion,"QUIT carrito");
				
				//cerramos la conexion
				mysqli_close($conexion);
				?>
					<script language="javascript" type="text/javascript">
                        alert("ESE NOMBRE DE USUARIO NO ESTA DISPONIBLE, INTENTE CON OTRO");
                        document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                    </script>
                <?php
			}
		}else{
			?>
				<script language="javascript" type="text/javascript">
                    alert("LLENE TODOS LOS CAMPOS DEL FORMULARIO, GRACIAS");
                    document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                </script>
            <?php
		}
	}else{
		?>
			<script language="javascript" type="text/javascript">
                document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
            </script>
        <?php
	}
?>