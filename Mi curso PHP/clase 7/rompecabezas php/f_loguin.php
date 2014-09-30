<?php
	//#2
	
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
				document.location.href="main.php";
			</script>
        <?php
	//sino verificamos si el formulario ya fue enviado
	}else if(isset($_POST['enviar'])){
		
		//si fue enviado incluimos el modulo de validacion
		include("validacion.php");
	}
?>

        <!--cuando se usa "#" (sharp) en el atributo action hacemos referencia que es un impervinculo huerfano,
        cuando hacemos eso hacemos referencia a que nos quedaremos en esta misma pagina, pero para un formulario
        significa que su apartado de respuesta se encuentra en este mismo modulo-->
        <form action="#" method="post" name="loguin">
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

