<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
</head>    
    
<?php
include('conexion.php');
$consulta=mysql_query("SELECT 
                                                            productos.id,
                                                            productos.imagen,
                                                            productos.nombre,
                                                            productos.descripcion,
                                                            tipo_producto.id_tipo_pro,
                                                            tipo_producto.descripcion_tipo_pro,
                                                            productos.precio_base,
                                                            productos.existencia,
                                                            productos.fecha_ingreso,
                                                            productos.iva,
                                                            productos.id_unidad,
                                                            unidad.descripcion_unidad,
                                                            unidad.convencion_unidad
                                                            FROM
                                                            tipo_producto
                                                            INNER JOIN productos ON (tipo_producto.id_tipo_pro = productos.id_tipo_pro)
                                                            INNER JOIN unidad ON (productos.id_unidad = unidad.id_unidad) where productos.id=".$_POST['id']);
	
?>
<?php include('plantilla/head.php');?>
<div class="contenedor">
	<?php 
	while($filas=mysql_fetch_array($consulta)){
		$id=$filas['id'];
		$imagen=$filas['imagen'];
		$nombre=$filas['nombre'];
		$desc=$filas['descripcion'];
		$precio=$filas['precio_base'];
		$existencia=$filas['existencia'];
		$fecha=$filas['fecha_ingreso'];
		$iva=$filas['iva'];
		$descripcionUnidad=$filas['descripcion_unidad'];
		$convencionUnidad=$filas['convencion_unidad'];
	
	?> 
	<div class="cajaSola">
	    <h2><?php echo $nombre?></h2>
		<img src="<?php echo $imagen?>" width="200" >
		<p>$<?php echo $precio?></p>
		<!--<a href="carrto/carrito.php"><img name="carrito" src="img/carrito2.png" id="productos" alt="" /></a>-->
<!--		<form action="carrito/carrito.php" method="post" name="compra">
        	<input name="id_txt" type="hidden" value="<?php echo $id ?>" />
        	<input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
        	<input name="precio" type="hidden" value="<?php echo $precio ?>" />
        	<input name="cantidad" type="hidden" value="1" />
        	<input  class="boton negro redondo"name="Comprar" type="submit" value="Comprar" />-->
<!--        </form>-->
		
	</div>
	<div class="cajaDes">
	    <p><h3>Descripción.</h3></p>
		<p><?php echo $desc?></p>
            
            <p><h3>Precio base.</h3></p>
		<p><?php echo "$".$precio?></p>
		
            <p><h3>Existencia en inventario.</h3></p>
		<p><?php echo $existencia?></p>
                
            <p><h3>Iva</h3></p>
		<p><?php echo $iva. "%"?></p>
                
            <p><h3>Unidad de medida.</h3></p>
		<p><?php echo $descripcionUnidad." (".$convencionUnidad.")." ?></p>
	</div>
	
	<?php
	}	
	?>
	
</div>

</html>