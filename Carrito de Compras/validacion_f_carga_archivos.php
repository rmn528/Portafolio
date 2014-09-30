<?php
	//#9
	
	//validamos que boton nos llego
	if(isset($_POST['cargar'])){
		//cachamos los campo sel formulario
		$nombre_archivo=$_POST['nombre_archivo'];
		$pais=$_POST['pais'];
		$bodega=$_POST['bodega'];
		$precio=$_POST['precio'];
		$archivo=$_FILES['archivo'];
		
		//guardamos las referencias de los datos obtenidos
		$arreglo=array(&$nombre_archivo,&$pais,&$precio,&$bodega);
		
		//mandamos a validar los campos del formulario
		$validacion=validarCampos($arreglo);
		
		//mandamos el resultado de las validaciones para recibir una respuesta concreta
		$respuesta=validarRespuesta($validacion);
		
		//validamos que todos los campos esten correctos
		if($respuesta && is_numeric($precio)){
		
			//verificamos si nos cargaron el archivo
			if(is_uploaded_file($archivo['tmp_name'])){
				
				//declaramos una variable con la ruta de la carpeta del usuario
				$dir="./dir_usuarios/".$_SESSION['usuario'];
				
				//verificamos si no existe los directorios para guardar archivos y descripciones
				if(!is_dir($dir."/archivos")){
					
					//intentamos crear la carpeta
					if(!@mkdir($dir."/archivos")){
						?>
                        	<script language="javascript" type="text/javascript">
								alert("SURGIO ALGUN ERROR AL INTENTAR CARGAR EL ARCHIVO, INTENTE DE NUEVO, GRACIAS");
							</script>
                            
							<script language="javascript" type="text/javascript">
								document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
							</script>
						<?php
						
					}
				}
				
				//si llegamos a este punto es por que no surgio problemas con las carpetas
				
				//declaramos una variable para el folio
				$folio=0;
				
				//verificamos si existe el archivo del folio
				if(is_file($dir."/folio.txt")){
					
					//abrimos el archivo en modo lectura
					$abre=fopen($dir."/folio.txt","r");
					
					//asignamos el contenido
					$folio=fgets($abre,"4093");
					
					//cerramos el archivo
					fclose($abre);
				}
				
				//incrementamos el folio
				$folio++;
				
				//abrimos el archivo en modo escritura
				$abre=fopen($dir."/folio.txt","w");
				
				//escribimos en el archivo el nuevo folio
				fwrite($abre,$folio);
				
				//cerramos el archivo
				fclose($abre);
				
				//sacamos la informacion del archivo
				$info=pathinfo($archivo['name']);
				
				//intentamos mover el archivo a la carpeta de archivos
				if(move_uploaded_file($archivo['tmp_name'],$dir."/archivos/".$folio.".jpg")){
					
					//creamos la conexion con el gestor de bases de datos
					$conexion=mysqli_connect($host,$usuario,$passwordBD);
					
					//usamos la base de datos
					mysqli_query($conexion,"USE carrito");
					
					//insertamos las urls del archivo y descioncion y tambienguardamos el nombre del archivo
					mysqli_query($conexion,"INSERT INTO ".$_SESSION['usuario']."(Imagen,Nombre,Precio,Pais,Bodega) 
					VALUES('".$dir."/archivos/".$folio.".jpg"."','".$nombre_archivo."','".$precio."','".$pais."','".$bodega."')");
					
					//dejamos de usar la base de datos
					mysqli_query($conexion,"QUIT carrito");
					
					//cerramos la conexion
					mysqli_close($conexion);
					
					//Miniatura*************************
	
						//Generamos la miniatura para mostrar
						$ruta=$dir."/archivos/".$folio.".jpg";
						
						//Obtenemos las propiedades de la imagen
						$fuente=@imagecreatefromjpeg($ruta);
						$imgAncho=imagesx($fuente);
						$imgAlto=imagesy($fuente);
						
						//Definimos el ancho y alto inicial del lienzo
						if($imgAlto>$imgAncho){
							//Regla 3
							$ancho=($imgAncho*100)/$imgAlto;
							$alto=100;
						}
						else{
							//Regla 3
							$ancho=100;
							$alto=($imgAlto*100)/$imgAncho;
						}
						
						//creamos la nueva imagen (lienzo)
						$newImg=ImageCreatetruecolor($ancho,$alto);
						
						//Copiamos propiedades de la original hacia el lienzo
						//(propiedades de que va a resivir (lienzo),propiedades del original que se van a 
						//transferir,coordenadaXLienzo,coordenadaYLienzo,transferircoordenadaXImagen,
						//transferircoordenadaYImagen,ancho de lienzo redimencionando  
						//la imagen,alto del lienzo redimencionando la imagen ,ancho de la imagen a transferir,alto de la imagen a 
						//transferir
						imagecopyresampled($newImg,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto); 
						
						//Guardamos la imagen
						//representa la imagen en memoria,grabala en la ruta
						imageJpeg($newImg,$dir."/archivos/".$folio.".jpg");
					
					//**********************************
					
					?>
                    	<script language="javascript" type="text/javascript">
                        	alert("CARGA EXITOSA!!!");
							document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                        </script>
					<?php
				}else{
					?>
                    	<script language="javascript" type="text/javascript">
                        	alert("SURGIO ALGUN ERROR AL INTENTAR CARGAR EL ARCHIVO, INTENTE DE NUEVO, GRACIAS");
							document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                        </script>
					<?php
				}
				
			}else{
				?>
                	<script language="javascript" type="text/javascript">
                   		alert("SURGIO ALGUN ERROR AL INTENTAR CARGAR EL ARCHIVO, INTENTE DE NUEVO, GRACIAS");
						document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                    </script>
				<?php
			}
		}
	}
?>