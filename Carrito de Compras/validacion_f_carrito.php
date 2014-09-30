<?php 
	//#15
		
	//instanciamos el carrito en una variable de session
	$_SESSION['carrito']=new Carrito($_SESSION['usuario']);

	//posicionamos la bandera en falso
	$bandera=false;
	
	//verificamos si se envio el formulario
	if(isset($_POST['traer_carrito'])){
		
		//verificamos si existe el contador_carrito antes de alguna otra busqueda
		if(isset($_SESSION['contador_carrito'],$_SESSION['contaAnt_carrito'],$_SESSION['resultado_filas_carrito'])){
			
			//damos de baja el contador_carrito
			unset($_SESSION['contador_carrito'],$_SESSION['contaAnt_carrito'],$_SESSION['resultado_filas_carrito']);
		}
		
		//creamos una bandera y la ponemos en verdadero en señal de que si llego el formulario
		$bandera=true;
	}
	
	//verificamos si realizaran la compra de los articulos
	if(isset($_POST['compra_carrito'])){
		
		//nos conectamos al gestor de base de datos
		$conexion=mysqli_connect($host,$usuario,$passwordBD);
		
		//usamos la base de datos carrito
		mysqli_query($conexion,"USE carrito");
		
		//creamos la base de datos para almacenar los articulos del usuario
		mysqli_query($conexion,"DROP TABLE carrito".$_SESSION['usuario']);
		
		//dejamos de usar la base de datos carrito
		mysqli_query($conexion,"QUIT carrito");
		
		//nos desconectamos del gestor de base de datos
		mysqli_close($conexion);
		
		//damos de baja la variable de session del carrito
		unset($_SESSION['carrito']);
		
		?>
			<script language="javascript" type="text/javascript">
                    alert("¡GRACIAS POR SU COMPRA!");
					document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
            </script> 
        <?php	
	}
	
	//verificamos si nos mandaron el boton de baja
	if(isset($_POST['baja_carrito'])){
	
		//verificamos si seleccionaron algun articulo en la vista mostrada
		if(isset($_POST['item_carrito'])){
			
			//nos conectamos con el gestor de base de datos
			$conexion=mysqli_connect($host,$usuario,$passwordBD);
			
			//usamos la base de datos carrito
			mysqli_query($conexion,"USE carrito");
			
			//procedemos a eliminar los articulos seleccionados de la tabla del usuario
			foreach($_POST['item_carrito'] as $valor){
				
				//eliminamos el registro de la base de datos
				mysqli_query($conexion,"DELETE FROM carrito".strtolower($_SESSION['usuario'])." WHERE idItem=".$valor."");
			}
			
			//consultamos cualquier cosa, solo para saber si aun queda algo en la base de datos
			$qry=mysqli_query($conexion,"SELECT * FROM carrito".strtolower($_SESSION['usuario'])."");
			
			//preguntamos cuantos registros se trajo
			$filas2=mysqli_num_rows($qry);
			
			//creamos una bandera y la ponemos en verdadero en señal de que si llego el formulario
			$bandera=true;
			
			?>
				<script language="javascript" type="text/javascript">
                        alert("¡ARTICULOS ELIMINADOS!");
                </script> 
			<?php	
			
			//checamos si hay algo en la base de datos
			if($filas2==0){
				
				//damos de baja el contador_carrito
				unset($_SESSION['contador_carrito'],$_SESSION['contaAnt_carrito'],$_SESSION['resultado_filas_carrito']);
				
				//damos de baja la variable menu, el menu ya sabe como trabajar en el caso que no exista la variable
				unset($_GET['menu']);
				
				//damos de baja la variable de session del carrito
				unset($_SESSION['carrito']);
				
				//creamos la base de datos para almacenar los articulos del usuario
				mysqli_query($conexion,"DROP TABLE carrito".$_SESSION['usuario']);
				
				?>
					<script language="javascript" type="text/javascript">
                    	document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                    </script>
                <?php
			}
			
			//dejamos de usar la base de datos carrito
			mysqli_query($conexion,"QUIT carrito");
			
			//nos desconectamos del gestor de base de datos
			mysqli_close($conexion);
		}	
	}
	
	//verificamos si no existe el contador_carrito
	if(!isset($_SESSION['contador_carrito'],$_SESSION['contaAnt_carrito'])){
		
		//declaramos un contador_carrito en una variable de sesion
		$_SESSION['contador_carrito']=0;
		
		//declaramos un contador_carrito para poder mostrar pantallas anteriores
		$_SESSION['contaAnt_carrito']=-10;
	}else{
		
		//verificamos si existen los contador_carritoes por URL
		if(isset($_GET['contador_carrito'],$_GET['contaAnt_carrito']) && 
		is_numeric(round($_GET['contador_carrito'])) && is_numeric(round($_GET['contaAnt_carrito']))){
			//actualizamos los contador_carritoes
			$_SESSION['contador_carrito']=$_GET['contador_carrito'];
			
			$_SESSION['contaAnt_carrito']=$_GET['contaAnt_carrito'];
		}else{
			
			//declaramos un contador_carrito en una variable de sesion
			$_SESSION['contador_carrito']=0;
			
			//declaramos un contador_carrito para poder mostrar pantallas anteriores
			$_SESSION['contaAnt_carrito']=-10;
		}
	}
	
	//validemos que todo haya salido bien
	if($bandera){
		
		//declaramos un arreglo donde guardaremos todas filas de la tabla con los resultados
		$_SESSION['resultado_filas_carrito']=array();
		
		//nos conectamos al gestor de base de datos
		$conexion=mysqli_connect($host,$usuario,$passwordBD);
		
		//usamos la base de datos
		mysqli_query($conexion,"USE carrito");
		
		//sacamos el vector de los articulos que ha comprado el usuario
		$articulos=$_SESSION['carrito']->getArticulos();
		
		//interpretamos cada elemento del arreglo con su clave
		foreach($articulos as $clave=>$valorCarrito){
			
			//interpretamos la clave como un arreglo
			$clave=explode("|",$clave);
		
			//consultamos la tabla para traernos todos sus campo
			$qry2=mysqli_query($conexion,"SELECT * FROM ".$clave[1]." WHERE id=".$clave[0]."");
			
			//sacamos cuantos registros trajo
			$filas=mysqli_num_rows($qry2);
			
			//verificamos que haya podido traer algo de la consulta anterior
			if($filas>0){
			
				//interpretos los campos como un arreglo asosiativo
				$campos=mysqli_fetch_assoc($qry2);
					
				//armamos la fila con el contenido del arreglo
				$armando_fila='<tr>
				<td align="center" valign="middle">
					<input name="item_carrito[]" type="checkbox" value="'.$campos['id'].'"/>
				</td>
				<td align="center" valign="middle">
					<img src="'.$campos['Imagen'].'"/>
					<br/>'.$campos['Nombre'].'
				</td>
				<td align="center" valign="middle">Pais: '.$campos['Pais'].' Bodega: '.$campos['Bodega'].'</td>
				<td align="center" valign="middle">$'.$campos['Precio'].'</td>
				<td align="center" valign="middle">'.$valorCarrito.'</td>
				<td align="center" valign="middle">$'.$valorCarrito*$campos['Precio'].'</td>
				</tr>';
				
				//generamos las filas para la tabla
				array_push($_SESSION['resultado_filas_carrito'],$armando_fila);
			}
		}
		
		//dejamos de usar la base de datos
		mysqli_query($conexion,"QUIT carrito");
		
		//cerramos la conexion
		mysqli_close($conexion);
		
		//sacamos la cantidad de elementos del arreglo
		$elementos=count($_SESSION['resultado_filas_carrito']);
		
		//verificamos que haya encontrado algula coincidencia con la busqueda solicitada
		if($elementos>0){
			
			//declaramos una variable para armar la tabla
			$tabla='<table width="100%" align="center" border="2"><tr>
			<td align="center" valign="middle">Selección</td>
			<td align="center" valign="middle">Nombre</td>
			<td align="center" valign="middle">Descripcion</td>
			<td align="center" valign="middle">Precio</td>
			<td align="center" valign="middle">Cantidad</td>
			<td align="center" valign="middle">Importe</td>
			</tr>';
			
			//contador_carrito para controlar cuantas filas acomular
			$i=0;
			
			//le metemos las filas para armar la tabla
			while($i<10 && $_SESSION['contador_carrito']<$elementos){
				
				//acomulamos las filas en la tabla
				$tabla.=$_SESSION['resultado_filas_carrito'][$_SESSION['contador_carrito']];
				
				//incrementamos los contador_carritoes contador_carrito
				$_SESSION['contador_carrito']=$_SESSION['contador_carrito']+1;
				$_SESSION['contaAnt_carrito']=$_SESSION['contaAnt_carrito']+1;
				
				//incrementamos el contador_carrito
				$i++;
			}
			
			//cerramos la etiqueta de la tabla
			$tabla.="</table>";
			
			//mostramos la tabla
			echo $tabla;
			
			//checamos si hay mas registros de los esperados para la vista
			if($elementos>10){
				
				//verificamos si el contador_carrito es mayor al limite de registros a mostrar en vista
				if($_SESSION['contador_carrito']>=9 && $_SESSION['contador_carrito']<$elementos){
					//agregamos el hipervinculo de siguiente
					?>
						<a href="?contador_carrito=<?php echo $_SESSION['contador_carrito'];?>&contaAnt_carrito=
						<?php echo $_SESSION['contaAnt_carrito'];
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
			
		if(isset($_SESSION['resultado_filas_carrito'])){
			//sacamos la cantidad de elementos del arreglo
			$elementos=count($_SESSION['resultado_filas_carrito']);
				
			//declaramos una variable para armar la tabla
			$tabla='<table width="100%" align="center" border="2"><tr>
			<td align="center" valign="middle">Selección</td>
			<td align="center" valign="middle">Nombre</td>
			<td align="center" valign="middle">Descripcion</td>
			<td align="center" valign="middle">Precio</td>
			<td align="center" valign="middle">Cantidad</td>
			<td align="center" valign="middle">Importe</td>
			</tr>';
			
			//contador_carrito para controlar cuantas filas acomular
			$i=0;
			
			//le metemos las filas para armar la tabla
			while($i<10 && $_SESSION['contador_carrito']<$elementos){
				
				//acomulamos las filas en la tabla
				$tabla.=$_SESSION['resultado_filas_carrito'][$_SESSION['contador_carrito']];
				
				//incrementamos los contador_carritoes contador_carrito
				$_SESSION['contador_carrito']=$_SESSION['contador_carrito']+1;
				$_SESSION['contaAnt_carrito']=$_SESSION['contaAnt_carrito']+1;
				
				//incrementamos el contador_carrito
				$i++;
			}
			
			//cerramos la etiqueta de la tabla
			$tabla.="</table>";
			
			//mostramos la tabla
			if($elementos>0)
				echo $tabla;
			
			//checamos si hay mas registros de los esperados para la vista
			if($elementos>10){
				
				//verificamos si el contador_carrito sobrepasa al minimo que puede aver en busqueda en vista
				if($_SESSION['contaAnt_carrito']>0 && $_SESSION['contaAnt_carrito']<$elementos){
					//agregamos el hipervinculo de anterior
					?>
						<a href="?contador_carrito=<?php echo ($_SESSION['contador_carrito']-10-$i);?>&contaAnt_carrito=
						<?php echo ($_SESSION['contaAnt_carrito']-10-$i);
						echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"&idioma=".$_GET['idioma']:"";
						echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";?>"><?php echo ANTERIOR;?></a>
					<?php
				}
				
				//verificamos si el contador_carrito es mayor al limite de registros a mostrar en vista
				if($_SESSION['contador_carrito']>=9 && $_SESSION['contador_carrito']<$elementos){
					//agregamos el hipervinculo de siguiente
					?>
						<a href="?contador_carrito=<?php echo $_SESSION['contador_carrito'];?>&contaAnt_carrito=
						<?php echo $_SESSION['contaAnt_carrito'];
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