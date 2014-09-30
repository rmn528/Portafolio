<?php
	//#5
	
	echo $_SESSION['usuario'];
	
	//variable donde guardamos el idioma a cargar
	$idioma=(isset($_GET['idioma']) && $_GET['idioma']!="")?"&idioma=".$_GET['idioma']:"";
	
	//nos conectamos al gestor de base de datos
	$conexion=mysqli_connect($host,$usuario,$passwordBD);
	
	//usamos la base de datos carrito
	mysqli_query($conexion,"USE carrito");
	
	//nos traemos todos los datos que haya en la tabla del usuario
	$qry=mysqli_query($conexion,"SELECT * FROM ".$_SESSION['usuario']."");
	
	//contamos cuantas filas trajo la consulta
	$filas=mysqli_num_rows($qry);
	
	//verificamos si trajo algo
	if($filas!=0){
		
		//si existe por lo menos un articulo, creamos la variable bajas
		$bajas='<a href="?menu=RPECnWNjfIsEI'.$idioma.'">Bajas</a>|';
	}
	
	//verificamos si existe la tabla y que no exista la variable de session de carrito
	if(mysqli_query($conexion,"EXISTS carrito".$_SESSION['usuario']."") && !isset($_SESSION['carrito'])){
		
		//instanciamos el carrito en una variable de session
		$_SESSION['carrito']=new Carrito($_SESSION['usuario']);
	}
	
	//dejamos de usar la base de datos carrito
	mysqli_query($conexion,"QUIT carrito");
	
	//nos desconectamos del gestor de base de datos
	mysqli_close($conexion);
	
	if(isset($_SESSION['carrito'])){
		
		$carrito='<a href="?menu=RPz2EzpP05N8w'.$idioma.'">Mi Carrito</a>|';
	}
	
?> 
    	<p>|<a href="?menu=RPLEr1cdeLnCI<?php echo $idioma;?>"><?php echo CARGADOR;?></a>|
        <a href="?menu=RPX2B5opb3Ajc<?php echo $idioma;?>"><?php echo BUSCAR;?></a>|
        <?php echo (isset($bajas))?$bajas:"";?>
        <?php echo (isset($carrito))?$carrito:"";?>
        <a href="?modulo=RPxT940/m2J7Q<?php echo $idioma;?>" target="_self"><?php echo CERRAR_SESION;?></a>|</p>
        <hr/>
        <?php
			//verificamos si existe la variable por URL para cargar al menu
			if(isset($_GET['menu']) && $_GET['menu']!=""){
				//seleccionamos el modulo escogido
				switch($_GET['menu']){
					case "RPLEr1cdeLnCI":
						$menu="f_carga_archivos";
						break;
						
					case "RPX2B5opb3Ajc":
						$menu="f_buscar";
						break;
						
					case "RPECnWNjfIsEI":
						$menu="f_bajas";
						break;
						
					case "RPz2EzpP05N8w":
						$menu="f_carrito";
						break;
						
					default:
						$menu=$_GET['menu'];
						break;
				}
				
				//verificamos que exista el archivo en el servidor
				if(is_file($menu.".php")){
					
					//incluimos el archivo
					include($menu.".php");
				}else{
						
					//damos de baja la variable modulo del servidor
					unset($_GET['menu'],$menu);
					
					//incluimos un modulo por defecto
					include("f_carga_archivos.php");
				}
			}else{
				
				//incluimos un modulo por defecto
				include("f_carga_archivos.php");
			}
		?>
        <hr/>