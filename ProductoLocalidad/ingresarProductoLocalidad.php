<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    
    <link rel="stylesheet" href="../css/smoke.css" type="text/css" media="screen" /> 
    <script src="../js/smoke/smoke.min.js" type="text/javascript"></script>	
    <link id="theme" rel="stylesheet" href="../css/smoke/themes/dark.css" type="text/css" media="screen" />
    
    <script>
    function selectInCombo(combo,text)
    {
        var dato = document.getElementById(text).value;
//        document.getElementById(combo).selectedIndex = dato;
        
        for(var indice=0 ;indice<document.getElementById(combo).length;indice++)
        {
            if (document.getElementById(combo).options[indice].text == dato )
                document.getElementById(combo).selectedIndex =indice;
        }
    }
    
    
    
   </script>
</head>
<?php 

    include ('../conexion.php');
    session_start();
          
    if (isset($_POST['id2'])){
        $id=$_POST['id2'];
    }else{
        $id=$_POST['idRE'];
    }
    
    if (isset($_POST['imagen2'])){
        $imagen=$_POST['imagen2'];
    }else{
        $imagen=$_POST['imagenRE'];
    }
    
    if (isset($_POST['nombre2'])){
        $nombre=$_POST['nombre2'];
    }else{
        $nombre=$_POST['nombreRE'];
    }
    
    if (isset($_POST['desc2'])){
        $desc=$_POST['desc2'];
    }else{
        $desc=$_POST['descRE'];
    }
    
    if (isset($_POST['descripcion_tipo_pro2'])){
        $descripcion_tipo_pro_enviado=$_POST['descripcion_tipo_pro2'];
    }else{
        $descripcion_tipo_pro_enviado=$_POST['descREEnv'];
    }
    
    if (isset($_POST['descripcion_tipo_pro2'])){
        $descripcion_tipo_pro_enviado=$_POST['descripcion_tipo_pro2'];
    }else{
        $descripcion_tipo_pro_enviado=$_POST['descREEnv'];
    }
        
//    $id_tipo_pro_enviado=$_POST['id_tipo_pro2'];
//    $id_unidad_enviado=$_POST['id_unidad2'];
    
    if (isset($_POST['conv_unidad2'])){
        $conv_unidad_enviado=$_POST['conv_unidad2'];
    }else{
        $conv_unidad_enviado=$_POST['conv_unidadEnv'];
    }
    
    if (isset($_POST['desc_unidad2'])){
        $desc_unidad_enviado=$_POST['desc_unidad2'];
    }else{
        $desc_unidad_enviado=$_POST['desc_unidadEnv'];
    }
    
    $varNombreComunaSe=$_SESSION['miSession']['nombre_comuna'];
    $varNombreLocalidadSe=$_SESSION['miSession']['nombre_localidad'];

    if (isset($_POST['cmbComuna'])){
        $criterioComunaArray=$_POST['cmbComuna'];

        for ($index = 0; $index < count($criterioComunaArray); $index++) {
            $varNombreComunaSe = $criterioComunaArray[$index];
        }
    }
?>
<body>
    
    
    <div id="table-conten">
        
        <h2>Asignar Localidad al producto. </h2>
        <h3>Permite asignarle al producto las localidades en las cuales sera ofrecido.</h3>
        
            <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">

                <tr>
                    <td width="107">Imagen:</td>
                <td width="166" align="center"><label for="imagen"></label><img src="<?php echo '../'.$imagen; ?>" alt="" width="70" height="60" /></td>
                
                </tr>
                <tr>
                    <input name="id3" type="hidden" value="<?php echo $id ?>" />   
                    <td>Nombre:</td>
                <td><input type="text" name="nombre3" readonly="readonly" class="inp-form" id="nombre" value="<?php echo $nombre ?>"/></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><input type="text" name="desc3" readonly="readonly" class="inp-form" id="desc" value="<?php echo $desc ?>"/></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>                        
                        <input type="text" readonly="readonly" id="desc_tipo_enviado" class="inp-form" value="<?php echo $descripcion_tipo_pro_enviado ?>"/>
                        
                    </td>
                </tr>                
                <tr>  
                    <td>Unidad:</td>
                    <td>                        
                        <input type="text" readonly="readonly" id="desc_unidad_enviad" class="inp-form" value="<?php echo $desc_unidad_enviado. " (".$conv_unidad_enviado.")" ?>"/>                      
                    </td>
                </tr>  
                <tr>
                    <form id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input name="idRE" type="hidden" value="<?php echo $id ?>" />                                               
                        <input name="imagenRE" type="hidden" value="<?php echo $imagen ?>" />                                               
                        <input name="nombreRE" type="hidden" value="<?php echo $nombre ?>" />                                               
                        <input name="descRE" type="hidden" value="<?php echo $desc ?>" />                                               
                        <input name="descREEnv" type="hidden" value="<?php echo $descripcion_tipo_pro_enviado ?>" />                                               
                        <input name="conv_unidadEnv" type="hidden" value="<?php echo $conv_unidad_enviado ?>" />                                               
                        <input name="desc_unidadEnv" type="hidden" value="<?php echo $desc_unidad_enviado ?>" />                                               
                        
                    <td>Comuna:</td>
                    <td>
                        <select onchange="this.form.submit();" class="styledselect" name="cmbComuna[]" id="cmbComuna">
                            <?php 
                                $consulta=mysql_query("select id_comuna, nombre_comuna from comuna",$conexion);

                                while($filas= mysql_fetch_array($consulta)) {	
                                    $varId_comuna=$filas['id_comuna'];
                                    $varNombre_comuna=$filas['nombre_comuna'];
                            ?>
                                    <option value="<?php echo $varNombre_comuna ?>"><?php echo $varNombre_comuna ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                        <input type="hidden" id="desc_comuna" class="inp-form" value="<?php echo $varNombreComunaSe ?>"/>
                        <script>selectInCombo('cmbComuna','desc_comuna')</script>
                    </td>
                    </form>
                </tr>
                <tr>
                   
                        
                        
                        <td>Localidad:</td>
                        <td>
                            <form id="formCargarSelLocalidad" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                                
                                <input name="idRE" type="hidden" value="<?php echo $id ?>" />                                               
                                <input name="imagenRE" type="hidden" value="<?php echo $imagen ?>" />                                               
                                <input name="nombreRE" type="hidden" value="<?php echo $nombre ?>" />                                               
                                <input name="descRE" type="hidden" value="<?php echo $desc ?>" />                                               
                                <input name="descREEnv" type="hidden" value="<?php echo $descripcion_tipo_pro_enviado ?>" />                                               
                                <input name="conv_unidadEnv" type="hidden" value="<?php echo $conv_unidad_enviado ?>" />                                               
                                <input name="desc_unidadEnv" type="hidden" value="<?php echo $desc_unidad_enviado ?>" />         
                        
                                <input name="idRelacionado" type="hidden" value="<?php echo $id ?>" />
                                
                                
                                <?php 
                                    $IdLocalidadSel = "";
                                    $NombreLocalidadSel = "";
                                    if(isset($_POST['cmbLocalidad'])){
                                        $LocalidadSelArray=$_POST['cmbLocalidad'];
                                        
                                        for ($index = 0; $index < count($LocalidadSelArray); $index++) {
                                            $IdLocalidadSel = $LocalidadSelArray[$index];
                                        }
                                    }
                                    
                                ?>
                                
                                
                                <select name="cmbLocalidad[]" class="styledselect" id="cmbLocalidad" onchange="this.form.submit();">
                                    <?php 
                                        $consulta=mysql_query("select id_localidad, nombre_localidad from view_informacion_localidad WHERE nombre_comuna LIKE '%$varNombreComunaSe%' order by nombre_localidad",$conexion);

                                        while($filas= mysql_fetch_array($consulta)) {	
                                            $varId_localidad=$filas['id_localidad'];
                                            $varNombre_localidad=$filas['nombre_localidad'];
                                            
                                            if($IdLocalidadSel == $varId_localidad){
                                                $NombreLocalidadSel = $varNombre_localidad;
                                            }
                                    ?>
                                            <option value="<?php echo $varId_localidad ?>"><?php echo $varNombre_localidad ?></option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                                <input type="hidden" id="desc_localidad" class="inp-form" value="<?php echo $NombreLocalidadSel ?>"/>
                                <script>selectInCombo('cmbLocalidad','desc_localidad')</script>
                            </form>
                        </td>
                        <td>
                             <form id="formRelacionar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">                                 
                                 
                                 <?php                                  
                                    
                                    $a= crearAsignarProductoLocalidad($id, $IdLocalidadSel);
//                                    echo "id(".$id.") - Localidad (".$IdLocalidadSel.")"; 
                                ?>
                                 
                                <input name="idRE" type="hidden" value="<?php echo $id ?>" />                                               
                                <input name="imagenRE" type="hidden" value="<?php echo $imagen ?>" />                                               
                                <input name="nombreRE" type="hidden" value="<?php echo $nombre ?>" />                                               
                                <input name="descRE" type="hidden" value="<?php echo $desc ?>" />                                               
                                <input name="descREEnv" type="hidden" value="<?php echo $descripcion_tipo_pro_enviado ?>" />                                               
                                <input name="conv_unidadEnv" type="hidden" value="<?php echo $conv_unidad_enviado ?>" />                                               
                                <input name="desc_unidadEnv" type="hidden" value="<?php echo $desc_unidad_enviado ?>" />         
                        
                                <input name="idRelacionado" type="hidden" value="<?php echo $id ?>" />
                                
                                
                                <input type="submit" class="boton negro redondo" name="button" id="button" value="Asignar Localidad" />
                            </form>
                        </td>
                    
                </tr>
					<td>&nbsp;</td>
                    <td>&nbsp;</td>
                <tr>
				</tr>
					<td>&nbsp;</td>
                    <td>&nbsp;</td>
				<tr>
				</tr>
                <tr>
                    <td width="240">Localidades Asignadas:</td>
                    <td colspan="2">
                        <select name="select3" class="styledselect" multiple="multiple" >
                            
                            <?php 
                                $consulta=mysql_query("select id_producto_localidad, nombre_localidad, nombre_comuna from view_informacion_producto_localidad_asignada WHERE id = $id",$conexion);

                                while($filasDodo= mysql_fetch_array($consulta)) {	
                                    $varRelBD=$filasDodo['id_producto_localidad'];
                                    $varNombreComunaBD=$filasDodo['nombre_comuna'];
                                    $varNombreLocalidadBD=$filasDodo['nombre_localidad'];                                    
                            ?>
                                    <option value="<?php echo $varRelBD ?>"><?php echo $varNombreLocalidadBD." (".$varNombreComunaBD.")" ?></option>
                            <?php 
                                }
                            ?>
                            
                      </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                      
                </tr>
                <tr>
                    <td>&nbsp;</td>
                        <td>
                            <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="location.href = '../productos/articulos.php'"  value="Regresar" />
                        </td>
                    <td>&nbsp;</td>
                </tr>
            </table>

        
    </div>
</body>
</html>