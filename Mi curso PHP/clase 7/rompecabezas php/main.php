<?php
	//#1
	
	//iniciamos el objeto de sesion
	session_start(); 
?>
<html>
    <head>
    	<title>Loguin Armado con PHP</title>
    </head>
    
    <body>
    	<?php
			//verificamos si la sesion existe y que no esta vacia
			if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=""){
				
				//verificamos si existe la variable modulo y que no este vacia
				if(isset($_GET['modulo']) && $_GET['modulo']!=""){
					
					//verificamos que exista un archivo con ese nombre
					if(is_file($_GET['modulo'].".php")){
						
						//incluimos el modulo que esta solicitando el usuario
						//include:incluye un archivo y lo hace parte del modulo donde se ejecuta esta funcion
						include($_GET['modulo'].".php");
						
					//sino existe el archivo
					}else{
						
						//damos de baja la variable modulo
						unset($_GET['modulo']);
						
						//incluimos el modulo del main
						include("main.php");
					}
				}else{
					
					//sino incluimos el modulo del menu
					include("menu.php");
				}
			}else{
				
				//incluimos el modulo del loguin
				include("f_loguin.php");
			}
        ?>
    	
    </body>
</html>