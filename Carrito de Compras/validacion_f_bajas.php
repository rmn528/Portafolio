<?php 
	//#13
	
	//posicionamos la bandera en falso
	$bandera=false;
	
	//verificamos si se envio el formulario
	if(isset($_POST['traer'])){
		
		//verificamos si existe el contador_bajas antes de alguna otra busqueda
		if(isset($_SESSION['contador_bajas'],$_SESSION['contaAnt_bajas'],$_SESSION['resultado_filas_bajas'])){
			
			//damos de baja el contador_bajas
			unset($_SESSION['contador_bajas'],$_SESSION['contaAnt_bajas'],$_SESSION['resultado_filas_bajas']);
		}
		
		//creamos una bandera y la ponemos en verdadero en señal de que si llego el formulario
		$bandera=true;
	}
	
	//verificamos si nos mandaron el boton de baja
	if(isset($_POST['baja'])){
	
		//verificamos si seleccionaron algun articulo en la vista mostrada
		if(isset($_POST['item'])){
			
			//nos conectamos con el gestor de base de datos
			$conexion=mysqli_connect($host,$usuario,$passwordBD);
			
			//usamos la base de datos carrito
			mysqli_query($conexion,"USE carrito");
			
			//procedemos a eliminar los articulos seleccionados de la tabla del usuario
			foreach($_POST['item'] as $valor){
				
				//traemos la ruta del archivo a dar de baja
				$qry=mysqli_query($conexion,"SELECT Imagen FROM ".$_SESSION['usuario']." WHERE id=".$valor."");
				
				//interpretamos la consulta como arreglo
				$ruta=mysqli_fetch_array($qry);
				
				//eliminamos el archivo del servidor
				unlink($ruta[0]);
				
				//eliminamos el registro de la base de datos
				mysqli_query($conexion,"DELETE FROM ".$_SESSION['usuario']." WHERE id=".$valor."");	
			}
			
			//consultamos cualquier cosa, solo para saber si aun queda algo en la base de datos
			$qry=mysqli_query($conexion,"SELECT Imagen FROM ".$_SESSION['usuario']."");
			
			//preguntamos cuantos registros se trajo
			$filas2=mysqli_num_rows($qry);
			
			//dejamos de usar la base de datos carrito
			mysqli_query($conexion,"QUIT carrito");
			
			//nos desconectamos del gestor de base de datos
			mysqli_close($conexion);
			
			//creamos una bandera y la ponemos en verdadero en señal de que si llego el formulario
			$bandera=true;
			
			?>
				<script language="javascript" type="text/javascript">
                        alert("¡ARTICULOS ELIMINADOS!");
                </script> 
			<?php	
			
			//checamos si hay algo en la base de datos
			if($filas2==0){
				
				//damos de baja el contador_bajas
				unset($_SESSION['contador_bajas'],$_SESSION['contaAnt_bajas'],$_SESSION['resultado_filas_bajas']);
				
				//damos de baja la variable menu, el menu ya sabe como trabajar en el caso que no exista la variable
				unset($_GET['menu']);
				?>
					<script language="javascript" type="text/javascript">
                    	document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                    </script>
                <?php
			}
		}	
	}
	
	//verificamos si no existe el contador_bajas
	if(!isset($_SESSION['contador_bajas'],$_SESSION['contaAnt_bajas'])){
		
		//declaramos un contador_bajas en una variable de sesion
		$_SESSION['contador_bajas']=0;
		
		//declaramos un contador_bajas para poder mostrar pantallas anteriores
		$_SESSION['contaAnt_bajas']=-10;
	}else{
		
		//verificamos si existen los contador_bajases por URL
		if(isset($_GET['contador_bajas'],$_GET['contaAnt_bajas']) && 
		is_numeric(round($_GET['contador_bajas'])) && is_numeric(round($_GET['contaAnt_bajas']))){
			//actualizamos los contador_bajases
			$_SESSION['contador_bajas']=$_GET['contador_bajas'];
			
			$_SESSION['contaAnt_bajas']=$_GET['contaAnt_bajas'];
		}else{
			
			//declaramos un contador_bajas en una variable de sesion
			$_SESSION['contador_bajas']=0;
			
			//declaramos un contador_bajas para poder mostrar pantallas anteriores
			$_SESSION['contaAnt_bajas']=-10;
		}
	}
	
	//validemos que todo haya salido bien
	if($bandera){
		
		//declaramos un arreglo donde guardaremos todas filas de la tabla con los resultados
		$_SESSION['resultado_filas_bajas']=array();
		
		//creamos conexion con el gestor de base de datos
		$conexion=mysqli_connect($host,$usuario,$passwordBD);
		
		//usamos la base de datos
		mysqli_query($conexion,"USE carrito");
				
		//consultamos la tabla para traernos todos sus campo
		$qry2=mysqli_query($conexion,"SELECT * FROM ".$_SESSION['usuario']."");
		
		//sacamos cuantos registros trajo
		$filas=mysqli_num_rows($qry2);
		
		//verificamos que haya podido traer algo de la consulta anterior
		if($filas>0){
		
			//interpretos los campos como un arreglo asosiativo
			while($campos=mysqli_fetch_assoc($qry2)){
					
				//armamos la fila con el contenido del arreglo
				$armando_fila='<tr>
				<td align="center" valign="middle">
					<input name="item[]" type="checkbox" value="'.$campos['id'].'"/>
				</td>
				<td align="center" valign="middle">
					<img src="'.$campos['Imagen'].'"/>
					<br/>'.$campos['Nombre'].'
				</td>
				<td align="center" valign="middle">Pais: '.$campos['Pais'].' Bodega: '.$campos['Bodega'].'</td>
				<td align="center" valign="middle">$'.$campos['Precio'].'</td></tr>';
				
				//generamos las filas para la tabla
				array_push($_SESSION['resultado_filas_bajas'],$armando_fila);
			}
		}
			
		//dejamos de usar la base de datos
		mysqli_query($conexion,"QUIT carrito");
		
		//cerramos la conexion
		mysqli_close($conexion);
		
		//sacamos la cantidad de elementos del arreglo
		$elementos=count($_SESSION['resultado_filas_bajas']);
		
		//verificamos que haya encontrado algula coincidencia con la busqueda solicitada
		if($elementos>0){
			
			//declaramos una variable para armar la tabla
			$tabla='<table width="80%" align="center" border="2"><tr>
			<td align="center" valign="middle">Selección</td>
			<td align="center" valign="middle">Nombre</td>
			<td align="center" valign="middle">Descripcion</td>
			<td align="center" valign="middle">Precio</td></tr>';
			
			//contador_bajas para controlar cuantas filas acomular
			$i=0;
			
			//le metemos las filas para armar la tabla
			while($i<10 && $_SESSION['contador_bajas']<$elementos){
				
				//acomulamos las filas en la tabla
				$tabla.=$_SESSION['resultado_filas_bajas'][$_SESSION['contador_bajas']];
				
				//incrementamos los contador_bajases contador_bajas
				$_SESSION['contador_bajas']=$_SESSION['contador_bajas']+1;
				$_SESSION['contaAnt_bajas']=$_SESSION['contaAnt_bajas']+1;
				
				//incrementamos el contador_bajas
				$i++;
			}
			
			//cerramos la etiqueta de la tabla
			$tabla.="</table>";
			
			//mostramos la tabla
			echo $tabla;
			
			//checamos si hay mas registros de los esperados para la vista
			if($elementos>10){
				
				//verificamos si el contador_bajas es mayor al limite de registros a mostrar en vista
				if($_SESSION['contador_bajas']>=9 && $_SESSION['contador_bajas']<$elementos){
					//agregamos el hipervinculo de siguiente
					?>
						<a href="?contador_bajas=<?php echo $_SESSION['contador_bajas'];?>&contaAnt_bajas=
						<?php echo $_SESSION['contaAnt_bajas'];
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
			
		if(isset($_SESSION['resultado_filas_bajas'])){
			//sacamos la cantidad de elementos del arreglo
			$elementos=count($_SESSION['resultado_filas_bajas']);
				
			//declaramos una variable para armar la tabla
			$tabla='<table width="80%" align="center" border="2"><tr>
			<td align="center" valign="middle">Selección</td>
			<td align="center" valign="middle">Nombre</td>
			<td align="center" valign="middle">Descripcion</td>
			<td align="center" valign="middle">Precio</td></tr>';
			
			//contador_bajas para controlar cuantas filas acomular
			$i=0;
			
			//le metemos las filas para armar la tabla
			while($i<10 && $_SESSION['contador_bajas']<$elementos){
				
				//acomulamos las filas en la tabla
				$tabla.=$_SESSION['resultado_filas_bajas'][$_SESSION['contador_bajas']];
				
				//incrementamos los contador_bajases contador_bajas
				$_SESSION['contador_bajas']=$_SESSION['contador_bajas']+1;
				$_SESSION['contaAnt_bajas']=$_SESSION['contaAnt_bajas']+1;
				
				//incrementamos el contador_bajas
				$i++;
			}
			
			//cerramos la etiqueta de la tabla
			$tabla.="</table>";
			
			//mostramos la tabla
			if($elementos>0)
				echo $tabla;
			
			//checamos si hay mas registros de los esperados para la vista
			if($elementos>10){
				
				//verificamos si el contador_bajas sobrepasa al minimo que puede aver en busqueda en vista
				if($_SESSION['contaAnt_bajas']>0 && $_SESSION['contaAnt_bajas']<$elementos){
					//agregamos el hipervinculo de anterior
					?>
						<a href="?contador_bajas=<?php echo ($_SESSION['contador_bajas']-10-$i);?>&contaAnt_bajas=
						<?php echo ($_SESSION['contaAnt_bajas']-10-$i);
						echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"&idioma=".$_GET['idioma']:"";
						echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";?>"><?php echo ANTERIOR;?></a>
					<?php
				}
				
				//verificamos si el contador_bajas es mayor al limite de registros a mostrar en vista
				if($_SESSION['contador_bajas']>=9 && $_SESSION['contador_bajas']<$elementos){
					//agregamos el hipervinculo de siguiente
					?>
						<a href="?contador_bajas=<?php echo $_SESSION['contador_bajas'];?>&contaAnt_bajas=
						<?php echo $_SESSION['contaAnt_bajas'];
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