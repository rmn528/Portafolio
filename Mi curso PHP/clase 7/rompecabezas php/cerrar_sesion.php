<?php
	//#6
	
	//damos de baja las sesiones iniciadas en el sitio
	session_unset();
	
	//verificamos si existe cookies tras aver creado la sesion
	if(ini_get("session.use_cookies")==true){
		
		//cachamos los parametros de dicha cookie
		$parametros=session_get_cookie_params();
		
		//caducamos la cookie para eliminar la sesion del navegador
		setcookie(session_name(),"",time()-9999,$parametros['path'],$parametros['domain'],$parametros['secure'],$parametros['httponly']);
	}
	
	//destruimos la sesion del servidor
	session_destroy();
?>
<script language="javascript" type="application/javascript">

	//redireccionamos al formulario de loguin
	document.location.href="main.php";
</script>