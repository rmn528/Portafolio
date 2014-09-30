<?php 
	//#10
?>
	<p>
        <form action="#" method="post">
            <label><?php echo BUSCADOR;?></label>
            <input type="text" name="buscando"/>
            <input type="submit" name="buscar" value="<?php echo BUSCAR;?>"/>
            <?php
				//incluimos la validacion
				include("validacion_f_buscar.php");
			?>
            <br/>
            <input type="submit" name="AgCarrito" value="Agregar al Carrito"/>
        </form>
    </p>

