<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
</head>

<body>
    <?php 
    include ('../funciones.php');
    ?>
    
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
                    <td><input type="text" name="nombre3" required="required" title="Por favor ingrese en nombre del producto." class="inp-form" id="nombre" value=""/></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><input type="text" name="desc3" required="required" title="Por favor ingrese una descripcion del producto." class="inp-form" id="desc" value=""/></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>
                        <select name="descripcion_tipo_pro3[]" class="styledselect">
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
                        
                    </td>
                </tr>
                <tr>  
                    <td>Unidad:</td>
                    <td>
                        <select name="descripcion_uni[]" class="styledselect">
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
                        
                    </td>
                </tr>                
                <tr>
                    <td>Stock:</td>
                    <td><input type="number" required="required" min="1" max="1000" title="Determine la cantidad minima de elemento que se guardaran en bodega" name="stock3" class="stylednumber" id="stock" value="0"/></td>
                </tr>
                <tr>
                    <td>Precio Base:</td>
                    <td><input type="number" required="required" min="1" max="1000000000" name="precio3" class="stylednumber" id="precio" value="0"/></td>
                </tr>
                
                
                <tr>
                    <td>Iva (%):</td>
                    <td><input type="number" required="required" min="0" max="50" name="iva3" class="stylednumber" id="iva" value="0"/></td>
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