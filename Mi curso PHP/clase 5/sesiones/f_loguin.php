<?php
	//#1
	
	//antes de cualquier cosa, incluso del html devemos de iniciar el objeto de sesion y este
	//tiene que estar presente en todo el sitio
	session_start();
	
	//verificamos que exista la sesion llama usuario y que no este vacia
	if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=""){
		
		//php se puede partir en modulos a su antojo como en este caso se parte
		//para hacer una llamada en JS, pero no importa en cuantos modulos se parta de esta manera
		//siempre php lo tomara como uno solo, en este caso el script esta dentro de la
		//selectiva simple if
		?>
        	<script language="javascript" type="text/javascript">
				
				//php por si mismo no puede redireccionarse a otra pagina
				//asi que esta sentencia en js nos hace ese trabajo
				document.location.href="menu.php";
			</script>
        <?php
	}
?>
<html>
    <head>
    	<title>Loguin basico</title>
    </head>
    
    <body>
    	<form action="validacion.php" method="post" name="loguin">
            <table width="300" align="center">
                <tr>
                	<td width="100"><label>Usuario: </label></td>
                    <td width="200"><input type="text" width="200" name="user"/></td>
                </tr>
                <tr>
                	<td width="100"><label>Contrase&ntilde;a</label></td>
                    <td width="200"><input type="password" width="200" name="pass" /></td>
                </tr>
                <tr>
                	<td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"/></td>
                </tr>
            </table>
         </form>
    </body>
</html>
