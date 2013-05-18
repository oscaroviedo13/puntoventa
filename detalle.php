<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" />
    
</head>    
    
<?php

    include ('conecta.php');
    include ('funciones.php');

    $consulta="SELECT * FROM view_informacion_producto where view_informacion_producto.id_producto_localidad=".$_POST['id_pro_localidad'];
    $rs=$db->Execute($consulta);
?>
<?php include('plantilla/head.php');?>
<div class="contenedor">
	<?php 
            for($i=0;$i<$rs->Recordcount();$i++){ 
		$id=$rs->fields[0];
		$imagen=$rs->fields[1];
		$nombre=$rs->fields[2];
		$desc=$rs->fields[3];
		$precio=$rs->fields[6];
		$existencia=$rs->fields[7];
		$fecha=$rs->fields[9];
		$iva=$rs->fields[10];
		$descripcionUnidad=$rs->fields[12];
		$convencionUnidad=$rs->fields[13];
		$descripcionTipo=$rs->fields[5];
	
	?> 
	<div class="cajaSola">
	    <h2><?php echo $nombre?></h2>
		<img src="<?php echo $imagen?>" width="200" >
		<p>$<?php echo $precio?></p>
		<input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="history.back(-1);" value="Regresar" />	
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
                                <p><?php echo "$ ".number_format($precio)?></p>
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
        $db->close();
	?>
	
</div>

</html>