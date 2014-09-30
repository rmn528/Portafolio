<?php 
	//#7
	
	//iniciamos el objeto de sesion
	session_start();
	
	//ponemos tiempo ilimitado a toda la ejecucion del php
	set_time_limit(0);
	
	//incluimos el archivo de funciones
	include("utileria/funciones.php");
	
	//incluimos la clase carrito
	include("utileria/Carrito.class.php");
	
	//incluimos las variables globales
	include("utileria/datos.php");
	
	//verificamos que la cookie de idioma exista y que no este vacia
	if(isset($_COOKIE['idioma']) && $_COOKIE['idioma']!=""){
		
		//seleccionamos el idioma escogido
		switch($_COOKIE['idioma']){
			case "RPFwo9icG7diQ":
				$idioma="espanol";
				break;
			
			case "RPBfGMO0HS7DA":
				$idioma="ingles";
				break;
			
			default:
				$idioma="espanol";
				break;
		}
	}else{
	
		//verificamos si existe la variable por URL idioma y que no este vacia
		if(isset($_GET['idioma']) && $_GET['idioma']!=""){
			//seleccionamos el idioma escogido
			switch($_GET['idioma']){
				case "RPFwo9icG7diQ":
					$idioma="espanol";
					break;
				
				case "RPBfGMO0HS7DA":
					$idioma="ingles";
					break;
				
				default:
					$idioma="espanol";
					break;
			}
		}else{
		
			//creamos la variable de sesion con el idioma por defecto
			$idioma="espanol";
		}
	}
	
	//incluimos el archivo de las constantes del idioma
	include("./utileria/idiomas/".$idioma.".php");
?>
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title></title>
    </head>
    <body>
    	<?php
			//verificamos que la cookie o la sesion de no cerrar sesion exista para brincarnos el loguin
			if((isset($_COOKIE['logout']) && $_COOKIE['logout']!="") || (isset($_SESSION['usuario']) && $_SESSION['usuario']!="")){
				
				if((isset($_COOKIE['logout']) && $_COOKIE['logout']!="")){
					//recreamos la cookie para darle mas tiempo de vida
					setcookie("logout",$_COOKIE['logout'],time()+7*24*60*60);
					
					//creamos la sesion
					$_SESSION['usuario']=$_COOKIE['logout'];
				}
				
				//verificamos si la variable modulo fue enviada por URL y que no este vacia
				if(isset($_GET['modulo']) && $_GET['modulo']!=""){
					
					//seleccionamos el modulo escogido
					switch($_GET['modulo']){
						case "RPdjuAzyhLATw":
							$modulo="f_registrar";
							break;
							
						case "RPxT940/m2J7Q":
							$modulo="cerrar_sesion";
							break;
							
						default:
							$modulo=$_GET['modulo'];
							break;
					}
					
					//verificamos si dicho modulo existe en el servidor
					if(is_file($modulo.".php")){
						
						//incluimos el modulo
						include($modulo.".php");
					}else{
						
						//damos de baja la variable modulo del servidor
						unset($_GET['modulo'],$modulo);
						
						//cargamos de nuevo el main
						?>
							<script language="javascript" type="text/javascript">
                                document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                            </script>
                        <?php
					}
				}else{	
								
					//incluimos el modulo del menu
					include("menu.php");
				}
			}else{
				
				if(isset($_GET['modulo']) && $_GET['modulo']!=""){
					
					//seleccionamos el modulo escogido
					switch($_GET['modulo']){
						case "RPdjuAzyhLATw":
							$modulo="f_registrar";
							break;
							
						case "RPxT940/m2J7Q":
							$modulo="cerrar_sesion";
							break;
							
						default:
							$modulo=$_GET['modulo'];
							break;
					}
					
					//verificamos si dicho modulo existe en el servidor
					if(is_file($modulo.".php")){
						
						//incluimos el modulo
						include($modulo.".php");
					}else{
						
						//damos de baja la variable modulo del servidor
						unset($_GET['modulo'],$modulo);
						
						//cargamos de nuevo el main
						?>
							<script language="javascript" type="text/javascript">
                                document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
                            </script>
                        <?php
					}
				}else{	
								
					//incluimos el modulo de loguin
					include("login.php");
				}
			}
			  
		?>
        <br/>
        |<a href="?idioma=RPBfGMO0HS7DA<?php echo (isset($_GET['modulo']) && $_GET['modulo']!="")?"&modulo=".$_GET['modulo']:"";
		echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";
		echo (isset($_GET['contador']) && $_GET['contador']!="")?"&contador=".$_GET['contador']:"";
		echo (isset($_GET['contaAnt']) && $_GET['contaAnt']!="")?("&contaAnt=".$_GET['contaAnt']):"";
		?>">Ingles</a>|
        <a href="?idioma=RPFwo9icG7diQ<?php echo (isset($_GET['modulo']) && $_GET['modulo']!="")?"&modulo=".$_GET['modulo']:"";
		echo (isset($_GET['menu']) && $_GET['menu']!="")?"&menu=".$_GET['menu']:"";
		echo (isset($_GET['contador']) && $_GET['contador']!="")?"&contador=".$_GET['contador']:"";
		echo (isset($_GET['contaAnt']) && $_GET['contaAnt']!="")?("&contaAnt=".$_GET['contaAnt']):"";
		?>">Español</a>|
    </body>
</html>