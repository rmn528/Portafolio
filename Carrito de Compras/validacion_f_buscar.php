<?php
	//#11
	
	//declaramos una bandera para mostrar mensaje de agregado
	$bandera=false;
	
	//verificamos si agregaran algo al carrito
	if(isset($_POST['AgCarrito'])){
			
			//verificamos si seleccionaron algun articulo
			if(isset($_POST['buy'])){
				
				//instanciamos el carrito en una variable de session
				$_SESSION['carrito']=new Carrito($_SESSION['usuario']);
				
				//nos conectamos al gestor de base de datos
				$conexion=mysqli_connect($host,$usuario,$passwordBD);
					
				//usamos la base de datos carrito
				mysqli_query($conexion,"USE carrito");
				
				//interpretamos cada elemento del arreglo para verificar que mandaron la cantidad
				foreach($_POST['buy'] as $valor){
					
					//verificamos si existe el campo de cantidad y que no lo hayan enviado vacio
					if(isset($_POST[$valor]) && $_POST[$valor]!="" && is_numeric($_POST[$valor]) && $_POST[$valor]>0){
						
						//explotamos los elementos de valor y los convertimos en elementos de un arreglo
						$elem=explode("|",$valor);
						
						//insertamos el elemento en el carrito
						$_SESSION['carrito']->agregarArticulo($elem[0],$elem[1],$_POST[$valor],$_SESSION['usuario'],$conexion);
						
						//damos de baja los elementos enviados
						unset($_POST[$valor]);
						
						$bandera=true;
					}
				}
				
				//dejamos de usar la base de datos carrito
				mysqli_query($conexion,"QUIT carrito");
				
				//nos desconectamos del gestor de base de datos
				mysqli_close($conexion);
			}
			
			if($bandera){
				
				//regresamos la bandera a false
				$bandera=false;
				
				?>
					<script language="javascript" type="text/javascript">
                        alert("CARGADO AL CARRITO!!!");
						document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:""; 
					echo (isset($_GET['menu']) && $_GET['menu']!="")?(isset($_GET['idioma']) && $_GET['idioma']!="")?"&menu=".$_GET['menu']:"?menu=".$_GET['menu']:"";?>";
                    </script>
                <?php
			}
	}
	
	//verificamos si se envio el formulario
	if(isset($_POST['buscar'])){
		
		//verificamos si existe el contador antes de alguna otra busqueda
		if(isset($_SESSION['contador'],$_SESSION['contaAnt'],$_SESSION['resultado_filas'])){
			
			//damos de baja el contador
			unset($_SESSION['contador'],$_SESSION['contaAnt'],$_SESSION['resultado_filas']);
		}
		
		//recibimos las variables del formulario o de la URL
		$buscando=$_POST['buscando'];
	}
		
	//verificamos si no existe el contador
	if(!isset($_SESSION['contador'],$_SESSION['contaAnt'])){
		
		//declaramos un contador en una variable de sesion
		$_SESSION['contador']=0;
		
		//declaramos un contador para poder mostrar pantallas anteriores
		$_SESSION['contaAnt']=-10;
	}else{
		
		//verificamos si existen los contadores por URL
		if(isset($_GET['contador'],$_GET['contaAnt']) && 
		is_numeric(round($_GET['contador'])) && is_numeric(round($_GET['contaAnt']))){
			//actualizamos los contadores
			$_SESSION['contador']=$_GET['contador'];
			
			$_SESSION['contaAnt']=$_GET['contaAnt'];
		}else{
			
			//declaramos un contador en una variable de sesion
			$_SESSION['contador']=0;
			
			//declaramos un contador para poder mostrar pantallas anteriores
			$_SESSION['contaAnt']=-10;
		}
	}
	
	//arreglo para validar campos
	$arreglo=array(&$buscando);
	
	//mandamos a validar los campos del formulario
	$validacion=validarCampos($arreglo);
	
	//mandamos el resultado de las validaciones para recibir una respuesta concreta
	$respuesta=validarRespuesta($validacion);
	
	//validemos que todo haya salido bien
	if($respuesta){
		
		//declaramos un arreglo donde guardaremos todas filas de la tabla con los resultados
		$_SESSION['resultado_filas']=array();
		
		//creamos conexion con el gestor de base de datos
		$conexion=mysqli_connect($host,$usuario,$passwordBD);
		
		//usamos la base de datos
		mysqli_query($conexion,"USE carrito");
		
		//barreremos todas las tablas de la base de datos carrito exepto la de usuarios
		$qry=mysqli_query($conexion,"SHOW TABLES");
		
		//interpretamos la consulta como un arreglo
		while($tablas=mysqli_fetch_array($qry)){
			
			//si la tabla es diferente a la de usuarios podremos consultarla
			if($tablas[0]!="usuarios" && strtoupper($tablas[0])!=$_SESSION['usuario']){
				
				//consultamos la tabla para traernos todos sus campo
				$qry2=mysqli_query($conexion,"SELECT * FROM ".$tablas[0]."");
				
				//sacamos cuantos registros trajo
				$filas=mysqli_num_rows($qry2);
				
				//verificamos que haya podido traer algo de la consulta anterior
				if($filas>0){
				
					//interpretos los campos como un arreglo asosiativo
					while($campos=mysqli_fetch_assoc($qry2)){
						
						//limpiamos la variable contenido
						$contenido="";
						
						//concatenamos los campos en una variable
						foreach($campos as $valor)
							$contenido.=$valor;
						
						//verificamos si hay alguna coincidencia con lo que se esta buscando
						if(strpos(strtoupper($contenido),$buscando)!==false){
							
							//armamos la fila con el contenido del arreglo
							$armando_fila='<tr>
								<td align="center" valign="middle">
									<input name="buy[]" type="checkbox" value="'.$campos['id'].'|'.$tablas[0].'"/>
								</td>
								<td align="center" valign="middle">
									<img src="'.$campos['Imagen'].'"/>
									<br/>'.$campos['Nombre'].'
								</td>
								<td align="center" valign="middle">Pais: '.$campos['Pais'].' Bodega: '.$campos['Bodega'].'</td>
								<td align="center" valign="middle"><input type="text" width="100" name="'.$campos['id'].'|'.$tablas[0].'"/></td>
								<td align="center" valign="middle">$'.$campos['Precio'].'</td>
							</tr>';
							
							//generamos las filas para la tabla
							array_push($_SESSION['resultado_filas'],$armando_fila);
						}
					}
				}
			}
		}
		//dejamos de usar la base de datos
		mysqli_query($conexion,"QUIT carrito");
		
		//cerramos la conexion
		mysqli_close($conexion);
		
		//sacamos la cantidad de elementos del arreglo
		$elementos=count($_SESSION['resultado_filas']);
		
		//verificamos que haya encontrado alguna coincidencia con la busqueda solicitada
		if($elementos>0){
			
			//declaramos una variable para armar la tabla
			$tabla='<table width="80%" align="center" border="2"><tr>
			<td align="center" valign="middle">Selección</td>
			<td align="center" valign="middle">Nombre</td>
			<td align="center" valign="middle">Descripcion</td>
			<td align="center" valign="middle">Cantidad</td>
			<td align="center" valign="middle">Precio</td></tr>';
			
			//contador para controlar cuantas filas acomular
			$i=0;
			
			//le metemos las filas para armar la tabla
			while($i<10 && $_SESSION['contador']<$elementos){
				
				//acomulamos las filas en la tabla
				$tabla.=$_SESSION['resultado_filas'][$_SESSION['contador']];
				
				//incrementamos los contadores contador
				$_SESSION['contador']=$_SESSION['contador']+1;
				$_SESSION['contaAnt']=$_SESSION['contaAnt']+1;
				
				//incrementamos el contador
				$i++;
			}
			
			//cerramos la etiqueta de la tabla
			$tabla.="</table>";
			
			//mostramos la tabla
			echo $tabla;
			
			//checamos si hay mas registros de los esperados para la vista
			if($elementos>10){
				
				//verificamos si el contador es mayor al limite de registros a mostrar en vista
				if($_SESSION['contador']>=9 && $_SESSION['contador']<$elementos){
					//agregamos el hipervinculo de siguiente
					?>
						<a href="?contador=<?php echo $_SESSION['contador'];?>&contaAnt=
						<?php echo $_SESSION['contaAnt'];
						echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"&idioma=".$_GET['idioma']:"";
						echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";?>"><?php echo SIGUIENTE;?></a>
					<?php
					
				}
			}
		}else{
			?>
				<script language="javascript" type="text/javascript">
					alert("NO SE ENCONTRO NINGUN ARCHIVO");
					document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:""; 
					echo (isset($_GET['menu']) && $_GET['menu']!="")?(isset($_GET['idioma']) && $_GET['idioma']!="")?"&menu=".$_GET['menu']:"?menu=".$_GET['menu']:"";?>";
				</script>
			<?php
		}
	}else{
			
		if(isset($_SESSION['resultado_filas'])){
			//sacamos la cantidad de elementos del arreglo
			$elementos=count($_SESSION['resultado_filas']);
				
			//declaramos una variable para armar la tabla
			$tabla='<table width="80%" align="center" border="2"><tr>
			<td align="center" valign="middle">Selección</td>
			<td align="center" valign="middle">Nombre</td>
			<td align="center" valign="middle">Descripcion</td>
			<td align="center" valign="middle">Cantidad</td>
			<td align="center" valign="middle">Precio</td></tr>';
			
			//contador para controlar cuantas filas acomular
			$i=0;
			
			//le metemos las filas para armar la tabla
			while($i<10 && $_SESSION['contador']<$elementos){
				
				//acomulamos las filas en la tabla
				$tabla.=$_SESSION['resultado_filas'][$_SESSION['contador']];
				
				//incrementamos los contadores contador
				$_SESSION['contador']=$_SESSION['contador']+1;
				$_SESSION['contaAnt']=$_SESSION['contaAnt']+1;
				
				//incrementamos el contador
				$i++;
			}
			
			//cerramos la etiqueta de la tabla
			$tabla.="</table>";
			
			//mostramos la tabla
			if($elementos>0)
				echo $tabla;
			
			//checamos si hay mas registros de los esperados para la vista
			if($elementos>10){
				
				//verificamos si el contador sobrepasa al minimo que puede aver en busqueda en vista
				if($_SESSION['contaAnt']>0 && $_SESSION['contaAnt']<$elementos){
					//agregamos el hipervinculo de anterior
					?>
						<a href="?contador=<?php echo ($_SESSION['contador']-10-$i);?>&contaAnt=
						<?php echo ($_SESSION['contaAnt']-10-$i);
						echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"&idioma=".$_GET['idioma']:"";
						echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";?>"><?php echo ANTERIOR;?></a>
					<?php
				}
				
				//verificamos si el contador es mayor al limite de registros a mostrar en vista
				if($_SESSION['contador']>=9 && $_SESSION['contador']<$elementos){
					//agregamos el hipervinculo de siguiente
					?>
						<a href="?contador=<?php echo $_SESSION['contador'];?>&contaAnt=
						<?php echo $_SESSION['contaAnt'];
						echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"&idioma=".$_GET['idioma']:"";
						echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";?>"><?php echo SIGUIENTE;?></a>
					<?php
					
				}
			}
		}else if(isset($_POST['buscar'])){
			?>
				<script language="javascript" type="text/javascript">
					alert("LO QUE ESTA BUSCANDO TIENE UN FORMATO INCORRECTO, INTENTE DE NUEVO, GRACIAS");
					document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";
					echo (isset($_GET['menu']) && $_GET['menu']!="")?(isset($_GET['idioma']) && $_GET['idioma']!="")?"&menu=".$_GET['menu']:"?menu=".$_GET['menu']:"";?>";
				</script>
			<?php
		}
	}
?>