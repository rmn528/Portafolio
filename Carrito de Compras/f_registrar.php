<?php
	//#3
	if(isset($_POST['registrar']) || isset($_POST['regresar'])){
		include("validacion_f_registrar.php");
	}
?>
    	<form action="#" method="post" name="registro">
            <table align="center" width="600" border="1">
                <tr>
                    <td><label><?php echo NOMBRE;?> </label></td>
                    <td width="300"><input type="text" name="nombre" width="300"/></td>
                </tr>
                <tr>
                    <td><label><?php echo USUARIO;?> </label></td>
                    <td><input name="usuario" type="text" width="300"/></td>
                </tr>
                <tr>
                    <td><label><?php echo CONTRASEÑA;?> </label></td>
                    <td><input name="password" type="password" width="300"/></td>
                </tr>
                <tr>
                    <td><label><?php echo CORREO;?> </label></td>
                    <td><input name="correo" type="text" width="300"/></td>
                </tr>
                <tr valign="middle" align="center">
                    <td><input type="submit" name="regresar" value="<?php echo REGRESAR;?>"/></td>
                    <td><input type="submit" name="registrar" value="<?php echo REGISTRAR;?>"/></td>
                </tr>
            </table>
        </form>