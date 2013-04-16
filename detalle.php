<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" />
</head>    
    
<?php
include('conexion.php');
$consulta=mysql_query("SELECT * FROM view_informacion_producto where view_informacion_producto.id=".$_POST['id']);
	
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
		$descripcionTipo=$filas['descripcion_tipo_pro'];
	
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
	<input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="history.back(-1);" value="Cancelar" />	
	</div>
	<div class="cajaDes">
            
        <table width="500" border="0" cellspacing="1" cellpadding="1">
		  <tr>
			<td>
                            <p><h3>Descripción.</h3></p>
                                <p><?php echo $desc?></p>
                        </td>
			<td>
                            <p><h3>Unidad de medida.</h3></p>
                                <p><?php echo $descripcionUnidad." (".$convencionUnidad.")." ?></p>
                        </td>
		  </tr>
		  <tr>
			<td>
                            <p><h3>Precio base.</h3></p>
                                <p><?php echo "$".$precio?></p>
                        </td>
			<td>
                            <p><h3>Categoria Producto.</h3></p>
                                <p><?php echo $descripcionTipo ?></p>
                        </td>
		  </tr>
		  <tr>
			<td>
                            <p><h3>Existencia en inventario.</h3></p>
                                <p><?php echo $existencia?></p>
                        </td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>
                            <p><h3>Iva</h3></p>
                                <p><?php echo $iva. "%"?></p>
                        </td>
			<td>&nbsp;</td>
		  </tr>		 
		</table>            
	</div>
	
	<?php
	}	
	?>
	
</div>

</html>