<?php 
	//#12
?>
	<p>
        <form action="#" method="post">
        	<?php
				//incluimos la validacion
				include("validacion_f_bajas.php"); 
			?>
            <br/>
            <label><?php echo "Traer articulos: ";?></label>           
            <input type="submit" name="traer" value="<?php echo "Traer";?>"/>
            <br/>
            <label><?php echo "Dar de baja articulos: ";?></label>           
            <input type="submit" name="baja" value="<?php echo "Baja";?>"/>
        </form>
    </p>
