<?php 
    include("Config/configxajax.php");    
    session_start();
    
    
        
    //funcion xajax
       
    function cargarLocalidad($nombreComuna){
        $objResponse = new xajaxResponse();
	include("../conecta.php");
        	
        $objResponse->assign("mensajes", "innerHTML", "");
            
	$nuevo_select = "<select name='cmbLocalidad' class='styledselect'>";	
        $rs=$db->Execute("select id_localidad, nombre_localidad from view_informacion_localidad where nombre_comuna like '%$nombreComuna%' order by nombre_localidad");

        for($i=0;$i<$rs->Recordcount();$i++)
                {
                  $nuevo_select.="<option value=".$rs->fields[0].">".$rs->fields[1]."</option>";                  
                  $rs->Movenext();
                }
        $db->close();
        
        $nuevo_select .= "</select>";   
        $objResponse->assign("datos_localidad", "innerHTML", $nuevo_select);
	return $objResponse;
    }
    /*****************************************************************************/
    function asignarLocal($id_productoEnviado, $id_localidadSeleccionada){
        $objResponse = new xajaxResponse();
	include("../conecta.php");
        
        $cad="CALL proc_asignar_localidad_producto($id_productoEnviado, $id_localidadSeleccionada);";
        
        $rs1=$db->Execute($cad); 
        
        
        $datoRetorno = 2;
        for($i=0;$i<$rs1->Recordcount();$i++){
            $datoRetorno = $rs1->fields[0];                  
            $rs1->Movenext();            
        }
        
        if($datoRetorno == 0){
            $objResponse->assign("mensajes", "innerHTML", "<span id='mensajeError' style=\"font-family: 'Didact Gothic', sans-serif; font-size: 20px;\">Esta localidad ya fue asignada</span>");
            return $objResponse;
        }
         
        $db->close();
        
        include("../conecta.php");
	$nuevo_select = "<select name='cmbLocalidadesAsignadas' class='styledselectlarge' multiple='multiple' >";	
        $rs=$db->Execute("select id_producto_localidad, nombre_localidad, nombre_comuna from view_informacion_producto_localidad_asignada WHERE id = $id_productoEnviado");

        for($i=0;$i<$rs->Recordcount();$i++)
                {
                  $nuevo_select.="<option value=".$rs->fields[0].">".$rs->fields[1]." ...(".$rs->fields[2].")</option>";                  
                  $rs->Movenext();
                }
        $db->close();
        
        $nuevo_select .= "</select>";   
        $objResponse->assign("datos_asignados", "innerHTML", $nuevo_select);
	return $objResponse;
    }
    
    $reqCargaLocalidad =& $xajax->registerFunction('cargarLocalidad');
    $reqCargaLocalidad->setParameter(0, XAJAX_JS_VALUE, 1);
    
    $reqAsignarLocalidad =& $xajax->registerFunction('asignarLocal');
    $reqAsignarLocalidad->setParameter(0, XAJAX_JS_VALUE, 2);
    
    $xajax->processRequest();
    

?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/smoke.css" type="text/css" media="screen" /> 
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <script src="../js/smoke/smoke.min.js" type="text/javascript"></script>	
    <link id="theme" rel="stylesheet" href="../css/themes/dark.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Didact+Gothic' rel='stylesheet' type='text/css'>
    <?php
	// output the xajax javascript. This must be called between the head tags
	$xajax->printJavascript();
    ?>    
    
    <script>
                
        function cargarLocalidades(){   
            var sComunaSeleccionada = formulario.cmbComuna.options[formulario.cmbComuna.selectedIndex].value;
            xajax_cargarLocalidad(sComunaSeleccionada);
        }
        
        function asignarLocalidades(){
            var sLocalidadSeleccionada = frmLocalidades.cmbLocalidad.options[frmLocalidades.cmbLocalidad.selectedIndex].value;
            var sIdProducto = document.getElementById('codigoProducto').value;
            alert(sIdProducto + "|" + sLocalidadSeleccionada);
//            xajax_asignarLocal(sLocalidadSeleccionada, sIdProducto);
            xajax_asignarLocal(sIdProducto, sLocalidadSeleccionada);
        }
        
    </script>
       
</head>

<body>   
    
    <div id="table-conten">
        
        <h2>Asignar Localidad al producto. </h2>
        <h3>Permite asignarle al producto las localidades en las cuales sera ofrecido.</h3>
        

        <table width="702" align="center" cellpadding="15" cellspacing="15" border="0" id="id-form">
            <tr>
                <td width="240">Imagen:</td>
                <td width="166" align="center"><label for="imagen"></label><img src="<?php echo '../'.$_POST['imagen2']; ?>" alt="" width="70" height="60" /></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre3" readonly="readonly" class="inp-form" id="nombre" value="<?php echo $_POST['nombre2']; ?>"/></td>
            </tr>
            <tr>
                <td>Descripcion:</td>
                <td>
                    <input type="text" name="desc3" readonly="readonly" class="inp-form" id="desc" value="<?php echo $_POST['desc2']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>Categoria:</td>
                <td>                        
                    <input type="text" readonly="readonly" id="desc_tipo_enviado" class="inp-form" value="<?php echo $_POST['descripcion_tipo_pro2']; ?>"/>   
                </td>
            </tr>                
            <tr>  
                <td>Unidad:</td>
                <td>                        
                    <input type="text" readonly="readonly" id="desc_unidad_enviad" class="inp-form" value="<?php echo $_POST['desc_unidad2']. " (".$_POST['conv_unidad2'].")" ?>"/>
                </td>
            </tr>  
            <tr>
              <td>Comuna:</td>
              <td>
                    <form name="formulario">
                        <select name="cmbComuna" class="styledselect" onchange="cargarLocalidades()">
                        <?php 
                            include("../conecta.php");
                            $rs=$db->Execute("select id_comuna, nombre_comuna from comuna order by id_comuna");

                            for($i=0;$i<$rs->Recordcount();$i++){
                                ?>
                                    <option value="<?php echo $rs->fields[1] ?>"><?php echo $rs->fields[1] ?></option>
                                <?php
                                $rs->Movenext();
                            }
                            $db->close();                        
                        ?>
                    </select>
                   </form>
                    
                </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Localidades:</td>
              <td>
                    <form name="frmLocalidades">
                    <div id="datos_localidad" style="font-family: 'Didact Gothic', sans-serif; font-size: 18px;">Seleccione una comuna</div>
                    </form>
                </td>
                <td>
                    <input type="button" onclick="asignarLocalidades()" class="boton negro redondo" value="Asignar Localidad"/>
                </td>
            </tr>
            <tr>
              <td colspan="3"><img src="../images/shared/nav/account_line.gif" alt="" width="100%" height="4" align="middle" /></td>
                    
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Localidades Asignadas:</td>
              <td colspan="3">
                    <div id="datos_asignados">
                    <select name="cmbLocalidadesAsignadas" class="styledselectlarge" multiple="multiple" >
                            
                            <?php 
                                include("../conecta.php");       
                                $id_producto = $_POST['id2'];
                                $rs=$db->Execute("select id_producto_localidad, nombre_localidad, nombre_comuna from view_informacion_producto_localidad_asignada WHERE id = $id_producto");

                                for($i=0;$i<$rs->Recordcount();$i++){  
                                    $varRelBD=$rs->fields[0];
                                    $varNombreComunaBD=$rs->fields[1];
                                    $varNombreLocalidadBD=$rs->fields[2]; 
                            ?>
                                    <option value="<?php echo $varRelBD ?>"><?php echo $varNombreComunaBD." (".$varNombreLocalidadBD.")" ?></option>
                            <?php 
                                    $rs->Movenext();
                                }
                                $db->close();
                            ?>                            
                            
                      </select>   
                      </div>
                      
                </td>
              <td></td>
            </tr>
            
            <tr>
                <td id="mensajes" align="center" colspan="3">
                    
                </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input type="hidden" id="codigoProducto" value="<?php echo $id_producto ?>" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
                        <td>
                            <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="location.href = '../productos/articulos.php'"  value="Regresar" />                        </td>
                    <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
    </div>
</body>
</html>