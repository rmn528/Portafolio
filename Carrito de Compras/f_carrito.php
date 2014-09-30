<?php 
	//#14
?>
	<p>
        <form action="#" method="post">
        	<?php
				//incluimos la validacion
				include("validacion_f_carrito.php"); 
			?>
            <label><?php echo "Traer articulos: ";?></label>           
            <input type="submit" name="traer_carrito" value="<?php echo "Traer";?>"/>
            <br/>
            <label><?php echo "Dar de baja articulos: ";?></label>           
            <input type="submit" name="baja_carrito" value="<?php echo "Baja";?>"/>
            <br/>
            <label><?php echo "Dar de baja articulos: ";?></label>           
            <input type="submit" name="compra_carrito" value="<?php echo "Realizar Compra";?>"/>
        </form>
    </p>
