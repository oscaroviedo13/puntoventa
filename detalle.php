<?php
include('conexion.php');
$consulta=mysql_query("select * from productos where id=".$_POST['id']);
	
?>
<?php include('plantilla/head.php');?>
<div class="contenedor">
	<?php 
	while($filas=mysql_fetch_array($consulta)){
		$id=$filas['id'];
		$imagen=$filas['imagen'];
		$nombre=$filas['nombre'];
		$desc=$filas['descripcion'];
		$precio=$filas['precio'];
		$enStock=$filas['cuanto_hay'];
		$fecha=$filas['fecha'];
	
	?> 
	<div class="cajaSola">
	    <h2><?php echo $nombre?></h2>
		<img src="<?php echo $imagen?>" width="200" >
		<p>$<?php echo $precio?></p>
		<!--<a href="carrto/carrito.php"><img name="carrito" src="img/carrito2.png" id="productos" alt="" /></a>-->
		<form action="carrito/carrito.php" method="post" name="compra">
        	<input name="id_txt" type="hidden" value="<?php echo $id ?>" />
        	<input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
        	<input name="precio" type="hidden" value="<?php echo $precio ?>" />
        	<input name="cantidad" type="hidden" value="1" />
        	<input  class="boton negro redondo"name="Comprar" type="submit" value="Comprar" />
        </form>
		
	</div>
	<div class="cajaDes">
	    <p><h3>Descripción</h3></p>
		<p><?php echo $desc?></p>
		
	</div>
	
	<?php
	}	
	?>
	
</div>
<?php include('plantilla/footer.php');?>