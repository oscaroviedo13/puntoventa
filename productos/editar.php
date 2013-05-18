<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <script src="../js/Validador.js" type="text/javascript"></script>
    
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
$id=$_POST['id2'];
$imagen=$_POST['imagen2'];
$nombre=$_POST['nombre2'];
$desc=$_POST['desc2'];
$cantidad=$_POST['existencia2'];
$stock=$_POST['stock2'];
$precio=$_POST['precio2'];
$iva=$_POST['iva2'];
$fecha=$_POST['fecha2'];
$descripcion_tipo_pro=$_POST['descripcion_tipo_pro2'];
$descripcion_tipo_pro_enviado=$_POST['descripcion_tipo_pro2'];
$id_tipo_pro_enviado=$_POST['id_tipo_pro2'];
$id_unidad_enviado=$_POST['id_unidad2'];
$conv_unidad_enviado=$_POST['conv_unidad2'];
$desc_unidad_enviado=$_POST['desc_unidad2'];
$id_pro_localidad=$_POST['id_pro_localidad'];
?>
<body>
    <?php 
    
    include ('../funciones.php');
    ?>
    
    <div id="table-conten">
        
        <h2>Modificacion de producto. </h2>
        <h3>Permite realizar las modificaciones necesarias de los productos ingresados en sistema.</h3>
        <form action="recibirEditar.php" method="post" enctype="multipart/form-data" id="form1" onSubmit="return validaEditaPHP('nombre')">

            <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">

                <tr>
                    <td width="107">Imagen:</td>
                <td width="166" align="center"><label for="imagen"></label><img src="<?php echo '../'.$imagen; ?>" alt="" width="70" height="60" /></td>
                <td width="329"><input name="imagen2" type="file"  id="imagen" maxlength="200" /></td>
                </tr>
                <tr>
                    <input name="id3" type="hidden" value="<?php echo $id ?>" />                                               
                    <input name="id_pro_localidad" type="hidden" value="<?php echo $id_pro_localidad ?>" />                                               
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre3" required="required" class="inp-form" id="nombre" value="<?php echo $nombre ?>"/></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><input type="text" name="desc3" required="required" class="inp-form" id="desc" value="<?php echo $desc ?>"/></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>
                        <select name="descripcion_tipo_pro3[]" id="cmbDescripcion" class="styledselect">
                            <?php           
                                include ('../conecta.php');
                                $rs=$db->Execute("select id_tipo_pro, descripcion_tipo_pro from tipo_producto order by id_tipo_pro");

                                for($i=0;$i<$rs->Recordcount();$i++){
                                    $id_tipo_pro=$rs->fields[0];
                                    $descripcion_tipo_pro=$rs->fields[1];
                                    ?>
                                        <option value="<?php echo $id_tipo_pro ?>"><?php echo $descripcion_tipo_pro ?></option>
                                    <?php
                                    $rs->Movenext();
                                }
                                $db->close();                        
                            ?>
                            
                      </select>
                      <input type="hidden" id="desc_tipo_enviado" class="inp-form" value="<?php echo $descripcion_tipo_pro_enviado ?>"/>
                      <script>selectInCombo('cmbDescripcion','desc_tipo_enviado')</script>
                        
                    </td>
                </tr>
                
                <tr>  
                    <td>Unidad:</td>
                    <td>
                        <select name="descripcion_uni[]" id="cmbUnidad" class="styledselect">
                            <?php          
                                include ('../conecta.php');
                                $rs=$db->Execute("select unidad.id_unidad, concat(unidad.descripcion_unidad, ' (', unidad.convencion_unidad, ')') AS convencion_descripcion FROM unidad");

                                for($i=0;$i<$rs->Recordcount();$i++){
                                    $id_unidad=$rs->fields[0];
                                    $convencion_descripcion=$rs->fields[1];
                                    ?>
                                        <option value="<?php echo $id_unidad ?>"><?php echo $convencion_descripcion ?></option>
                                    <?php
                                    $rs->Movenext();
                                }
                                $db->close();                        
                            ?>
                            
                      </select>
                      <input type="hidden" id="desc_unidad_enviad" class="inp-form" value="<?php echo $desc_unidad_enviado. " (".$conv_unidad_enviado.")" ?>"/>
                      <script>selectInCombo('cmbUnidad','desc_unidad_enviad')</script>
                    </td>
                </tr> 
                
                <tr>
                    <td>Iva (%):</td>
                    <td><input type="number" required="required" min="0" max="50" name="iva3" class="stylednumber" id="iva" value="<?php echo $iva ?>"/></td>
                </tr>
                <tr>
                    <td>Modificacion:</td>
                    <td><input type="text" name="fecha3" readonly="readonly" class="inp-form" id="fecha" value="<?php  echo $fecha ?>"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                      
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="boton negro redondo" name="button" id="button" value="Modificar" />
                        <div style="float:left">&nbsp;</div>
                        <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="history.back(-1);" value="Cancelar" /></td>
                    <td>&nbsp;</td>
                </tr>
            </table>

        </form>
    </div>
</body>
</html>