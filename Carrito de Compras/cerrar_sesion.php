<?php
	//#6
	
	//damos de baja las variables de sesion del sitio
	session_unset();
	
	//verificamos si existe la cookie de no cerrar sesion para eliminarla
	if(isset($_COOKIE['logout']))
		setcookie("logout","",time()-9999);
		
	//verificamos si existe la cookie de idioma para eliminarla
	if(isset($_COOKIE['idioma']))
		setcookie("idioma","",time()-9999);
		
	//verificamos si existe alguna cookie de sesion
	if(ini_get("session.use_cookies")==true){
		
		//tomamos los parametros de la cookie
		$parametros=session_get_cookie_params();
		
		//eliminamos la cookie de sesion
		setcookie(session_name(),"",time()-9999,$parametros['path'],$parametros['domain'],$parametros['secure'],$parametros['httponly']);
	}
	
	//eliminamos las sesiones del servidor
	session_destroy();
	
	//finalizamos el uso de las sesiones
	session_write_close();
?>

<script language="javascript" type="text/javascript">
	document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']:"";?>";
</script>