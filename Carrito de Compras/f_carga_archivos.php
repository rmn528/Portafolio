<?php
	//#8 
	
	if(isset($_POST['cargar']) || isset($_POST['regresar'])){
		include("validacion_f_carga_archivos.php");
	}
?>
	<form action="#" method="post" name="cargar" enctype="multipart/form-data">
   	  <table align="center" width="528" border="2">
        	<tr>
            	<td width="265" align="center" valign="middle" nowrap><?php echo NOMBRE_ARCHIVO;?></td>
           	  	<td width="250" align="center" valign="middle" nowrap><input type="text" name="nombre_archivo" width="250"/></td>
            </tr>
            <tr>
            	<td align="center" valign="middle" nowrap><?php echo PRECIO;?> </td>
                <td align="center" valign="middle" nowrap><input type="text" name="precio" width="250"/></td>
            </tr>
            <tr>
            	<td align="center" valign="middle" nowrap><?php echo "Pais";?></td>
           	 	<td align="center" valign="middle" nowrap><input type="text" name="pais" width="250"/></td>
            </tr>
            <tr>
            	<td align="center" valign="middle" nowrap><?php echo "Bodega";?></td>
           	 	<td align="center" valign="middle" nowrap><input type="text" name="bodega" width="250"/></td>
            </tr>
            <tr>
           	 	<td width="265" align="left" valign="middle" nowrap><input type="file" name="archivo" size="30"/></td>
           	 	<td width="250" align="center" valign="middle" nowrap><input type="submit" name="cargar" value="<?php echo CARGAR;?>"/></td>
        	</tr>
        </table>
</form>