<?php 
    include("Config/configxajax.php");    
    session_start();
    
    
        
    //funcion xajax
       
    function cargarLocalidad($nombreComuna){
        $objResponse = new xajaxResponse();
	include("../conecta.php");
        	
        $objResponse->assign("mensajes", "innerHTML", "");
            
	$nuevo_select = "<select name='cmbLocalidad[]' class='styledselect'>";	
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
    
    
    $reqCargaLocalidad =& $xajax->registerFunction('cargarLocalidad');
    $reqCargaLocalidad->setParameter(0, XAJAX_JS_VALUE, 1);
        
    $xajax->processRequest();
    

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <?php
	// output the xajax javascript. This must be called between the head tags
	$xajax->printJavascript();
    ?> 
    <script>
                
        function cargarLocalidades(){   
            var sComunaSeleccionada = formulario.cmbComuna.options[formulario.cmbComuna.selectedIndex].value;
            xajax_cargarLocalidad(sComunaSeleccionada);
        }
        
//        function enviarDatos(){
//            this.formEnvioFinal.descripcionDescuento2.value = document.getElementById('intDescripcion').value;   
//            this.formEnvioFinal.porcentaje2.value = document.getElementById('intPorcentaje').value;   
//            this.formEnvioFinal.cmbLocalidad2.value = frmLocalidades.cmbLocalidad.options[frmLocalidades.cmbLocalidad.selectedIndex].value;   
//            
//        }
        
    </script>
</head>

<body>
    
    
    <div id="table-conten">
        
        <h2>Creacion de descuentos.</h2>
        <h3>Permite crear un descuento por localidad.</h3>
        
            <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">
                
                <tr>
                    <td>Comuna:</td>
                    <td>
                        <form name="formulario" style="width: 115px">
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
                    <td>&nbsp;</td>
                  </tr>
                </table>
                
                <form action="recibirCrearDescuentoLocalidad.php" method="post" enctype="multipart/form-data" id="form1" name="formEnvioFinal">
                <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">

                    <tr>
                      <td>Localidades:</td>
                      <td>
                            <form name="frmLocalidades">
                            <div id="datos_localidad">
                              <div style="font-family: 'Didact Gothic', sans-serif; font-size: 18px; height: 10px" >Seleccione una comuna</div>
                            </div>
                            </form>
                        </td>                      
                    </tr>                    
                    <tr>                                              
                        <td>Descripcion:</td>
                        <td><input type="text" name="descripcionDescuento" required="required" title="Por favor ingrese descripcion del descuento." class="inp-form" id="intDescripcion" value=""/></td>
                    </tr>
                    <tr>
                        <td>Porcentaje(%):</td>
                        <td><input type="number" required="required" min="1" max="100" title="El valor debe ser mayor a cero y menor que 100." name="porcentajeDescuento"  class="stylednumber" id="intPorcentaje" value="0"/></td>
                    </tr>
                    <tr>
                        <td>Fecha inicial:</td>
                        <td><input type="date" required="required" title="Determine la fecha en la que inciara la aplicacion del descuento" name="dateInicial" class="stylednumber" id="dateIni"/></td>
                    </tr>
                    <tr>
                        <td>Fecha final:</td>
                        <td><input type="date" required="required" title="Determine la fecha en la que terminara la aplicacion del descuento" name="dateFinal" class="stylednumber" id="dateFin"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>

                                <input type="submit" class="boton negro redondo" name="button" id="button" value="  Crear " />

                            <div style="float:left">&nbsp;</div>
                            <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="history.back(-1);" value="Cancelar" />

                        </td>
                        <td>&nbsp;</td>
                    </tr>

                </table>
            </form>
        
    </div>
</body>
</html>