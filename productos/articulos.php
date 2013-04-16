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
<!--<div id="content">-->
<div>

	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<?php 
            $criterioBusqueda = "";
            
            if (isset($_POST['datoBusqueda'])){
                $criterioBusqueda=$_POST['datoBusqueda'];
            }
            
            $tipoBusqueda="nombre";
            
            if (isset($_POST['arrayTipoBusqueda'])){
                $criterioBusquedaArray=$_POST['arrayTipoBusqueda'];

                for ($index = 0; $index < count($criterioBusquedaArray); $index++) {
                    $tipoBusqueda = $criterioBusquedaArray[$index];
                }
            }
        ?>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
			<div align="center">
            <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">                
            <table border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                <td><input type="text" value="" name="datoBusqueda" class="top-search-inp" /></td>
                <!--<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>-->
                <td></td>
				<td>
                <select  name="arrayTipoBusqueda[]" class="styledselect">
                    <option value="nombre"> Nombre</option>
                    <option value="descripcion"> Descripcion</option>
                    <option value="descripcion_tipo_producto"> Tipo Producto</option>
                    <option value="id">Codigo Identificacion</option>
                    <option value="existencia">Existencia</option>
                </select> 
                </td>
                <td>
                <!--<input type="image" src="../images/shared/top_search_btn.gif"  />-->
                <input type="submit" class="boton negro redondo" value="Buscar" />
                </td>
                </tr>
              </table>
              </form>  
            </div>
			<div style="height:20px"></div>
			<!--  start table-content  -->
			<div id="table-content">
			
				
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<!--<form id="mainform" action="articulos.php">-->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
					<th class="table-header-repeat line-left minwidth-2"><a href="">Nombre</a></th>
					<th class="table-header-repeat line-left"><a href="">Descripcion</a></th>
                                        <th class="table-header-repeat line-left"><a href="">Tipo Producto</a></th>
					<th class="table-header-repeat line-left"><a href="">Precio</a></th>
					<th class="table-header-repeat line-left"><a href="">Iva(%)</a></th>
					<th class="table-header-repeat line-left"><a href="">Existencia</a></th>
					<th class="table-header-repeat line-left"><a href="">Stock</a></th>
					<th class="table-header-repeat line-left"><a href="">Ultima Modificacion</a></th>
					<th class="table-header-repeat line-left minwidth-option"><a href="">Opciones</a></th>
				</tr>
                                <?php 
                                    $consulta=mysql_query("select * from view_informacion_producto where $tipoBusqueda like '%$criterioBusqueda%' ");
                                        
                                    $nro_reg=mysql_num_rows($consulta);

                                    if ($nro_reg==0){
                                            echo 'no se han encontrado productos para mostrar';
                                    }

                                    $reg_por_pagina=8;
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
                                    
                                    $consulta=mysql_query("SELECT * FROM view_informacion_producto where $tipoBusqueda like '%$criterioBusqueda%' limit  $inicio,$reg_por_pagina",$conexion);
                                    $can_paginas=ceil($nro_reg/$reg_por_pagina);

                                    while($filas=mysql_fetch_array($consulta)){
                                            $id=$filas['id'];
                                            $nombre=$filas['nombre'];
                                            $desc=$filas['descripcion'];
                                            $precio=$filas['precio_base'];
                                            $iva=$filas['iva'];
                                            $existencia=$filas['existencia'];
                                            $stock=$filas['stock_minimo'];
                                            $fecha=$filas['fecha_ingreso'];
                                            $imagen=$filas['imagen'];
                                            $id_tipo_pro=$filas['id_tipo_pro'];
                                            $id_unidad=$filas['id_unidad'];
                                            $desc_unidad=$filas['descripcion_unidad'];
                                            $conv_unidad2=$filas['convencion_unidad'];
                                            $descripcion_tipo_pro=$filas['descripcion_tipo_pro'];


                                ?>
                                <tr>
                                    
					<td><?php echo $id ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $desc ?></td>
					<td><?php echo $descripcion_tipo_pro ?></td>
					<td>
                                            <div style="float: left">$&nbsp;&nbsp;&nbsp;</div>
                                            <div style="float: center"><?php echo $precio?></div>                                        </td>
					<td><?php echo $iva ?></td>
					<td><?php echo $existencia ?></td>
					<td><?php echo $stock ?></td>
					<td><?php echo $fecha ?></td>
					<td class="options-width">
                                            <div style="float:left">                   
                                                <form action="editar.php" method="post" name="edita">
                                                    <input name="id2" type="hidden" value="<?php echo $id ?>" />   
                                                    <input name="imagen2" type="hidden" value="<?php echo $imagen ?>" />   
                                                    <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                                    <input name="desc2" type="hidden" value="<?php echo $desc ?>" />   
                                                    <input name="id_tipo_pro2" type="hidden" value="<?php echo $id_tipo_pro ?>" />   
                                                    <input name="descripcion_tipo_pro2" type="hidden" value="<?php echo $descripcion_tipo_pro ?>" />   
                                                    <input name="existencia2" type="hidden" value="<?php echo $existencia ?>" />   
                                                    <input name="stock2" type="hidden" value="<?php echo $stock ?>" />   
                                                    <input name="precio2" type="hidden" value="<?php echo $precio ?>" />   
                                                    <input name="iva2" type="hidden" value="<?php echo $iva ?>" />   
                                                    <input name="fecha2" type="hidden" value="<?php echo $fecha ?>" />   
                                                    <input name="id_unidad2" type="hidden" value="<?php echo $id_unidad ?>" />   
                                                    <input name="desc_unidad2" type="hidden" value="<?php echo $desc_unidad ?>" />   
                                                    <input name="conv_unidad2" type="hidden" value="<?php echo $conv_unidad2 ?>" />   

                                                    <input id="editarPro" type="image" src="../images/shared/nav/icon_acc_settings.gif" class="boton negro redondo" value="Editar" />
                                                    <script type="text/javascript">
                                                    document.getElementById("editarPro").title="Editar Producto"
                                                    </script>
        <!--                                            <a title="Modificar" onclick="document.forms['edita'].submit();" class="icon-1 info-tooltip"></a>    -->

                                                </form>
                                            </div>

                                            <div style="float:left">
                                                <form action="../detalle.php" method="post" name="detalle">
                                                        <input name="id" type="hidden" value="<?php echo $id ?>" />
                                                        <input id="detallePro" type="image" src="../images/shared/nav/icon_acc_projects.gif" class="boton negro redondo" value="Detalle" />
                                                        <script type="text/javascript">
                                                        document.getElementById("detallePro").title="Detalle del Producto"
                                                        </script>
                                                </form>
                                            </div>
                                            
                                            <div style="float:left">
                                                <form action="../ProductoLocalidad/ingresarProductoLocalidad.php" method="post" name="ingProLocal">
                                                        <input name="id2" type="hidden" value="<?php echo $id ?>" />   
                                                        <input name="imagen2" type="hidden" value="<?php echo $imagen ?>" />   
                                                        <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                                        <input name="desc2" type="hidden" value="<?php echo $desc ?>" />   
                                                        <input name="id_tipo_pro2" type="hidden" value="<?php echo $id_tipo_pro ?>" />   
                                                        <input name="descripcion_tipo_pro2" type="hidden" value="<?php echo $descripcion_tipo_pro ?>" />   
                                                        <input name="existencia2" type="hidden" value="<?php echo $existencia ?>" />   
                                                        <input name="stock2" type="hidden" value="<?php echo $stock ?>" />   
                                                        <input name="precio2" type="hidden" value="<?php echo $precio ?>" />   
                                                        <input name="iva2" type="hidden" value="<?php echo $iva ?>" />   
                                                        <input name="fecha2" type="hidden" value="<?php echo $fecha ?>" />   
                                                        <input name="id_unidad2" type="hidden" value="<?php echo $id_unidad ?>" />   
                                                        <input name="desc_unidad2" type="hidden" value="<?php echo $desc_unidad ?>" />   
                                                        <input name="conv_unidad2" type="hidden" value="<?php echo $conv_unidad2 ?>" />  
                                                        <input id="asignaLocal" type="image" src="../images/shared/nav/icon_acc_stats.gif" class="boton negro redondo" value="Asignar Localidad" />
                                                        <script type="text/javascript">
                                                        document.getElementById("asignaLocal").title="Asignar Localidad al Producto"
                                                        </script>
                                                </form>
                                            </div>
                                            <div style="float:center">
                                                <form action="../ProductoLocalidad/ingresarProductoLocalidad.php" method="post" name="editProLocal">
                                                        <input name="id2" type="hidden" value="<?php echo $id ?>" />   
                                                        <input name="imagen2" type="hidden" value="<?php echo $imagen ?>" />   
                                                        <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                                        <input name="desc2" type="hidden" value="<?php echo $desc ?>" />   
                                                        <input name="id_tipo_pro2" type="hidden" value="<?php echo $id_tipo_pro ?>" />   
                                                        <input name="descripcion_tipo_pro2" type="hidden" value="<?php echo $descripcion_tipo_pro ?>" />   
                                                        <input name="existencia2" type="hidden" value="<?php echo $existencia ?>" />   
                                                        <input name="stock2" type="hidden" value="<?php echo $stock ?>" />   
                                                        <input name="precio2" type="hidden" value="<?php echo $precio ?>" />   
                                                        <input name="iva2" type="hidden" value="<?php echo $iva ?>" />   
                                                        <input name="fecha2" type="hidden" value="<?php echo $fecha ?>" />   
                                                        <input name="id_unidad2" type="hidden" value="<?php echo $id_unidad ?>" />   
                                                        <input name="desc_unidad2" type="hidden" value="<?php echo $desc_unidad ?>" />   
                                                        <input name="conv_unidad2" type="hidden" value="<?php echo $conv_unidad2 ?>" />  
                                                        <input id="editLocalPro" type="image" src="../images/shared/nav/icon_acc_inbox.gif" class="boton negro redondo" value="Editar Localidad" />
                                                        <script type="text/javascript">
                                                        document.getElementById("editLocalPro").title="Editar Producto de Localidad"
                                                        </script>
                                                </form>
                                            </div>
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
			
                        <form action="crear.php" method="post" name="crea">
                            <div class="clear">
                                    <input type="submit" class="boton negro redondo" value="Crear Nuevo Producto" />
                            </div>
                        </form>
		 
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