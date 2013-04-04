<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    
</head>
    
  
<body> 
<?php include ('../conexion.php');?>



<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<!--<form id="mainform" action="">-->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
					<th class="table-header-repeat line-left minwidth-2"><a href="">Nombre</a></th>
					<th class="table-header-repeat line-left"><a href="">Descripcion</a></th>
					<th class="table-header-repeat line-left"><a href="">Precio</a></th>
					<th class="table-header-repeat line-left"><a href="">Existencia</a></th>
					<th class="table-header-repeat line-left"><a href="">Fecha</a></th>
					<th class="table-header-repeat line-left minwidth-option"><a href="">Opciones</a></th>
				</tr>
                                <?php 
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
                                                            INNER JOIN unidad ON (productos.id_unidad = unidad.id_unidad) ORDER BY productos.id
                                        ");
                                    
                                    if (isset($_POST['buscar'])){
                                            $consulta=mysql_query("select7 * from productos where nombre like '%".$_POST['buscar']."%'");
                                    }
                                        
                                    $nro_reg=mysql_num_rows($consulta);

                                    if ($nro_reg==0){
                                            echo 'no se han encontrado productos para mostrar';
                                    }

                                    $reg_por_pagina=7;
                                    if (isset($_GET['num'])){
                                            $nro_pagina=$_GET['num'];	
                                    }else{
                                            $nro_pagina=1;
                                    }

                                    if (is_numeric($nro_pagina)){
                                            $inicio=(($nro_pagina-1)*$reg_por_pagina);
                                    }
                                    else{
                                        $inicio=0;
                                    }
                                    
//                                    $consulta=mysql_query("select * from view_informacion_producto order by id limit  $inicio,$reg_por_pagina",$conexion);
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
                                                            INNER JOIN unidad ON (productos.id_unidad = unidad.id_unidad) ORDER BY productos.id limit  $inicio,$reg_por_pagina",$conexion);
                                    $can_paginas=ceil($nro_reg/$reg_por_pagina);

                                    while($filas=mysql_fetch_array($consulta)){
                                            $id=$filas['id'];
                                            $nombre=$filas['nombre'];
                                            $desc=$filas['descripcion'];
                                            $precio=$filas['precio_base'];
                                            $existencia=$filas['existencia'];
                                            $fecha=$filas['fecha_ingreso'];
                                            $imagen=$filas['imagen'];


                                ?>
                                <tr>
                                    
					<td><?php echo $id ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $desc ?></td>
					<td>
                                            <div style="float: left">$&nbsp;&nbsp;&nbsp;</div>
                                            <div style="float: center"><?php echo $precio?></div>
                                        </td>
					<td><?php echo $existencia ?></td>
					<td><?php echo $fecha ?></td>
					<td class="options-width">
                                            
					<form action="editar.php" method="post" name="edita">
                                            <input name="id2" type="hidden" value="<?php echo $id ?>" />   
                                            <input name="imagen2" type="hidden" value="<?php echo $imagen ?>" />   
                                            <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                            <input name="desc2" type="hidden" value="<?php echo $desc ?>" />   
                                            <input name="existencia2" type="hidden" value="<?php echo $existencia ?>" />   
                                            <input name="precio2" type="hidden" value="<?php echo $precio ?>" />   
                                            <input name="fecha2" type="hidden" value="<?php echo $fecha ?>" />   
                                            
                                            <input type="submit" class="boton negro redondo" value="Editar" />
                                                                                           
<!--                                            <a title="Modificar" onclick="document.forms['edita'].submit();" class="icon-1 info-tooltip"></a>    -->
                                        </form>
                                         
<!--                                         <a href="editar.php" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
                                    
				</tr>
				<?php }?>	
                                    
				</table>
				<!--  end product-table................................... --> 
				<!--</form>-->
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>

                            <div id ="paginador" align="center">
                            <?php 

                                    if($nro_pagina>1)
                                            echo "<a href='articulos.php?num=".($nro_pagina-1)."'>Anterior</a> ";

                                    for ($i=1;$i<=$can_paginas;$i++){
                                            if ($i==$nro_pagina)
                                                    echo "<span>$i </span> ";
                                                    //echo $i."  ";
                                            else
                                            echo "<a href='articulos.php?num=$i'>$i</a> ";

                                    }
                                    if($nro_pagina<$can_paginas)
                                            echo "<a href='articulos.php?num=".($nro_pagina+1)."'>Siguiente</a> ";
                            ?>
                            </div>
			</td>			
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>


</body>
</html>