<?php
	//#5
	
	//para que la cookie deje de existir hay que hacer que caduque
	//y la forma sencilla de hacerlo es mandarla a un tiempo pasado
	setcookie("usuario","",time()-9999);
?>
<script language="javascript" type="application/javascript">

	//redireccionamos al formulario de loguin
	document.location.href="f_loguin.php";
</script>