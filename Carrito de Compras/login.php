<?php
	//#1
	
	//verificamos si envio el formulario
	if(isset($_POST['enviar'])){
		
		//incluimos el modulo de validacion del login
		include("validacion_f_login.php");
	}else{
		
		if(isset($_POST['registrar'])){
			?>
				<script language="javascript" type="text/javascript">
					document.location.href="main.php<?php echo (isset($_GET['idioma']) && $_GET['idioma']!="")?"?idioma=".$_GET['idioma']."&":"?";?>modulo=RPdjuAzyhLATw";
				</script>
			<?php
		}
	
		//usamos el contador de visitas y almacenamos la cuenta actual en una variable
		conVisitas();
	}
?>
        <form action="#" method="post" name="login">
                <table align="center" border="2" width="350">
                    <tr valign="middle">
                        <td width="150"><label><?php echo USUARIO;?> </label></td>
                        <td colspan="2" align="center"><input type="text" name="user"/></td>
                    </tr>
                    <tr valign="middle">
                        <td><label><?php echo CONTRASEÑA;?> </label></td>
                        <td colspan="2" align="center"><input type="password" name="pass"/></td>
                    </tr>
                    <tr valign="middle" align="center">
                        <td><label><input type="checkbox" name="logout"/><?php echo NO_SESION;?></label></td>
                        <td><input type="submit" name="registrar" value="<?php echo REGISTRAR;?>"/></td>
                        <td><input type="submit" name="enviar" value="<?php echo ENVIAR;?>"/></td>
                    </tr>
                </table>
        </form>