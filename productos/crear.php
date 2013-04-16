<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    
    
   
</head>
<?php 
?>
<body>
    <?php include ('../conexion.php');?>
    
    <div id="table-conten">
        
        <h2>Creacion de producto. </h2>
        <h3>Permite Crear un producto.</h3>
        <form action="recibirCrear.php" method="post" enctype="multipart/form-data" id="form1">

            <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">

                <tr>
                    <td width="107">Imagen:</td>
                <td width="166" align="center"><label for="imagen"></label><img src="" alt="" width="70" height="60" /></td>
                <td width="329"><input name="imagen2" type="file"  id="imagen" maxlength="200" /></td>
                </tr>
                <tr>                                              
                    <td>Nombre:</td>
                <td><input type="text" name="nombre3" class="inp-form" id="nombre" value=""/></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><input type="text" name="desc3" class="inp-form" id="desc" value=""/></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>
                        <select name="descripcion_tipo_pro3[]" class="styledselect">
                            
                            <?php 
                                $consulta=mysql_query("select id_tipo_pro, descripcion_tipo_pro from tipo_producto order by id_tipo_pro",$conexion);
                                
                                while($filas= mysql_fetch_array($consulta)) {	
                                    $id_tipo_pro=$filas['id_tipo_pro'];
                                    $descripcion_tipo_pro=$filas['descripcion_tipo_pro'];
                            ?>
                                    <option value="<?php echo $id_tipo_pro ?>"><?php echo $descripcion_tipo_pro ?></option>
                            <?php 
                                }
                            ?>
                      </select>
                        
                    </td>
                </tr>
                <tr>  
                    <td>Unidad:</td>
                    <td>
                        <select name="descripcion_uni[]" class="styledselect">
                            
                            <?php 
                                $consulta=mysql_query("select unidad.id_unidad, concat(unidad.descripcion_unidad, ' (', unidad.convencion_unidad, ')') AS convencion_descripcion FROM unidad",$conexion);
                                
                                while($filas= mysql_fetch_array($consulta)) {	
                                    $id_unidad = $filas['id_unidad'];
                                    $convencion_descripcion = $filas['convencion_descripcion'];
                            ?>
                                    <option value="<?php echo $id_unidad ?>"><?php echo $convencion_descripcion ?></option>
                            <?php 
                                }
                            ?>
                      </select>
                        
                    </td>
                </tr>                
                <tr>
                    <td>Stock:</td>
                    <td><input type="text" name="stock3" class="inp-form" id="stock" value="0"/></td>
                </tr>
                <tr>
                    <td>Precio Base:</td>
                    <td><input type="text" name="precio3" class="inp-form" id="precio" value="0"/></td>
                </tr>
                
                
                <tr>
                    <td>Iva (%):</td>
                    <td><input type="text" name="iva3" class="inp-form" id="iva" value="0"/></td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="boton negro redondo" name="button" id="button" value="  Crear " />
                        <div style="float:left">&nbsp;</div>
                        <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="history.back(-1);" value="Cancelar" /></td>
                    <td>&nbsp;</td>
                </tr>
            </table>

        </form>
    </div>
</body>
</html>