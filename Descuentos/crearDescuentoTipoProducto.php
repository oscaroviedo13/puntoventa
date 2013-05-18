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
        
        <h2>Creacion de descuentos. </h2>
        <h3>Permite crear un descuento por tipo de producto.</h3>
        <form action="recibirCrearDescuentoTipoProducto.php" method="post" enctype="multipart/form-data" id="form1">

            <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">
                
                <tr>                                              
                    <td>Descripcion:</td>
                    <td><input type="text" name="descripcionDescuento" required="required" title="Por favor ingrese descripcion del descuento." class="inp-form" id="intDescripcion" value=""/></td>
                </tr>
                <tr>
                    <td>Porcentaje(%):</td>
                    <td><input type="number" required="required" min="1" max="100" title="El valor debe ser mayor a cero y menor que 100." name="porcentajeDescuento" class="stylednumber" id="intPorcentaje" value="0"/></td>
                </tr>
                
                <tr>
                    <td>Categoria:</td>
                    <td>
                        <select name="tipo_producto[]" class="styledselect" required="required">
                            <?php           
                                include ('../conecta.php');
                                $rs=$db->Execute("select id_tipo_pro, descripcion_tipo_pro from tipo_producto order by id_tipo_pro");

                                for($i=0;$i<$rs->Recordcount();$i++){
                                    $id_tipo_pro=$rs->fields[0];
                                    $descripcion_tipo_pro=$rs->fields[1];
                                    
                                    if($i==0){
                                    ?>
                                        <option value=""><?php echo $descripcion_tipo_pro ?></option>
                                    <?php 
                                    }else{
                                    ?>
                                        <option value="<?php echo $id_tipo_pro ?>"><?php echo $descripcion_tipo_pro ?></option>
                                    <?php
                                    }
                                    $rs->Movenext();
                                }
                                $db->close();                        
                            ?>
                      </select>
                        
                    </td>
                </tr>
                           
                <tr>
                    <td>Fecha inicial:</td>
                    <td><input type="date" required="required" title="Determine la fecha en la se inciara la aplicacion del descuento" name="dateInicial" class="stylednumber" id="dateIni"/></td>
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