<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />    
</head>
    
  
<body> 
<?php 
    include ('../funciones.php');
    
    session_start();
    
    $id_perfil = $_SESSION['miSession']['id_perfil'];
    $localidad_designada = $_SESSION['miSession']['localidad_designada'];
    
    $CLAUSULA = "WHERE ";
    
    if($id_perfil != '402'){
        $CLAUSULA .= "id_localidad = ".$localidad_designada." AND ";
    }
    ?>



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
                
			<!--<div style="height:20px"></div>-->
			<!--  start table-content  -->
			<!--<div id="table-content">-->			
				
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
					<th class="table-header-repeat line-left minwidth-2"><a href="">Nombre</a></th>
					<th class="table-header-repeat line-left"><a href="">Descripcion</a></th>
                                        <th class="table-header-repeat line-left minwidth-2"><a href="">Tipo Producto</a></th>
                                        <th class="table-header-repeat line-left minwidth-2"><a href="">Localidad</a></th>
					<th class="table-header-repeat line-left"><a href="">Precio</a></th>
					<th class="table-header-repeat line-left"><a href="">Iva</a></th>
					<th class="table-header-repeat line-left"><a href="">Existencia</a></th>
					<th class="table-header-repeat line-left"><a href="">Stock</a></th>
					<!--<th class="table-header-repeat line-left"><a href="">Ultima Modificacion</a></th>-->
					<th class="table-header-repeat line-left minwidth-option"><a href="">Opciones</a></th>
				</tr>
                                <?php
                                    include ('../conecta.php');
                                    $consulta = "select * from view_informacion_producto $CLAUSULA $tipoBusqueda like '%$criterioBusqueda%' ";
//                                    echo "id_perfil: ".$consulta; 
                                    $rs=$db->Execute($consulta);
                                    
                                    $nro_reg = $rs->Recordcount();

                                    if ($nro_reg==0){
                                        echo 'no se han encontrado productos para mostrar';
                                    }

                                    $reg_por_pagina=13;
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
                                    
                                    
                                    $consulta = "SELECT * FROM view_informacion_producto $CLAUSULA $tipoBusqueda like '%$criterioBusqueda%' limit  $inicio,$reg_por_pagina";
                                    $rs=$db->Execute($consulta);
                                    
                                    $can_paginas=ceil($nro_reg/$reg_por_pagina);

                                    for($i=0;$i<$rs->Recordcount();$i++){ 
                                        $id=$rs->fields[0];
                                        $nombre=$rs->fields[2];
                                        $desc=$rs->fields[3];
                                        $precio=$rs->fields[6];
                                        $iva=$rs->fields[10];
                                        $existencia=$rs->fields[7];
                                        $stock=$rs->fields[8];
                                        $fecha=$rs->fields[9];
                                        $imagen=$rs->fields[1];
                                        $id_tipo_pro=$rs->fields[4];
                                        $id_unidad=$rs->fields[11];
                                        $desc_unidad=$rs->fields[12];
                                        $conv_unidad2=$rs->fields[13];
                                        $descripcion_tipo_pro=$rs->fields[5];
                                        $id_produc_localidad=$rs->fields[18];
                                        $nombre_localidad=$rs->fields[15];

                                ?>
                                <tr>                                    
					<td><?php echo $id ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $desc ?></td>
					<td><?php echo $descripcion_tipo_pro ?></td>
					<td><?php echo $nombre_localidad ?></td>
					<td>
                                            <!--<div style="float: left">$&nbsp;&nbsp;&nbsp;</div>-->
                                            <div style="float: center"><?php echo number_format($precio);?></div>                                        
                                        </td>
					<td><?php echo $iva ?></td>
					<td><?php echo $existencia ?></td>
					<td><?php echo $stock ?></td>
					<!--<td><?php // echo $fecha ?></td>-->
					<th class="options-width">
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
                                                    <input name="id_pro_localidad" type="hidden" value="<?php echo $id_produc_localidad ?>" />   

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
                                                        <input name="id_pro_localidad" type="hidden" value="<?php echo $id_produc_localidad ?>" />   
                                                        <input id="detallePro" type="image" src="../images/shared/nav/icon_acc_projects.gif" class="boton negro redondo" value="Detalle" />
                                                        <script type="text/javascript">
                                                        document.getElementById("detallePro").title="Detalle del Producto"
                                                        </script>
                                                </form>
                                            </div>
                                            <div style="float:left">
                                                <form action="../ProductoLocalidad/existenciaProductoLocalidad.php" method="get" name="existProFrm">
                                                        <input name="id2" type="hidden" value="<?php echo $id ?>" />   
                                                        <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                                        <input id="existPro" type="image" src="../images/shared/nav/icon_acc_inbox.gif" class="boton negro redondo" value="Detalle" />
                                                        <script type="text/javascript">
                                                        document.getElementById("existPro").title="Modificar Existencia del producto"
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
                                            <div style="float:left">
                                                <form action="../ProductoLocalidad/precioProductoLocalidad.php" method="get" name="precProLocal">
                                                        <input name="id2" type="hidden" value="<?php echo $id ?>" />   
                                                        <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                                        
                                                        <input id="editLocalPro" type="image" src="../images/shared/nav/icon_acc_preci.gif" class="boton negro redondo" value="Editar Localidad" />
                                                        <script type="text/javascript">
                                                        document.getElementById("editLocalPro").title="Modificar Precio Producto de Localidad"
                                                        </script>
                                                </form>
                                            </div>
                                            <div style="float:left">
                                                <form action="../ProductoLocalidad/stockProductoLocalidad.php" method="get" name="stcokProLocal">
                                                        <input name="id2" type="hidden" value="<?php echo $id ?>" />
                                                        <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />   
                                                                                                               
                                                        <input id="stcokLocalPro" type="image" src="../images/shared/nav/icon_acc_stock.gif" class="boton negro redondo" value="Cargar Stock" />
                                                        <script type="text/javascript">
                                                        document.getElementById("stcokLocalPro").title="Modificar la cantida minima de un producto por localidad"
                                                        </script>
                                                </form>
                                            </div>
    					</th>
				</tr>
				<?php 
                                        $rs->Movenext();
                                    }
                                    
                                    $db->close();
                                ?>	
				</table>
				<!--  end product-table................................... --> 
				<!--</form>-->
			<!--</div>-->
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
			
                        <div align="left">
                        <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">                
                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><input type="text" name="datoBusqueda" placeholder="Ingrese palabra" class="top-search-inp" /></td>
                                    <td></td>
                                    <td>
                                        <select name="arrayTipoBusqueda[]" class="styledselect">
                                            <option value="id">Codigo Identificacion</option>
                                            <option value="descripcion">Descripcion</option>
                                            <option value="existencia">Existencia</option>
                                            <option value="nombre_localidad">Localidad</option>
                                            <option value="nombre">Nombre</option>
                                            <option value="descripcion_tipo_pro">Tipo Producto</option>
                                            
                                        </select> 
                                    </td>
                                    <td>
                                        <input type="submit" class="boton negro redondo" value="Buscar" />
                                    </td>
                                </tr>

                              </table>
                          </form>  
                        </div>
		 
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