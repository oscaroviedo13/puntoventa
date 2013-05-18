<?php 
    session_start(); 
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Didact+Gothic' rel='stylesheet' type='text/css'>
    
    <script>
        function volver(){
            location.href = "../productos/articulos.php"; 
        }
    </script>
</head>

<body>        
    <div id="content-table-inner">
        <div id="table-conten">

            <h2>Administracion de descuentos por tipo de producto.</h2>
            <h3>Permite activar y desactivar los descuentos por tipo de producto.</h3>
			
                <table border="0" width="1000px" cellpadding="0" cellspacing="0" id="product-table">
                    <tr>
                        <th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Descripcion</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Tipo Producto</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Porcentaje</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Fecha Inicial</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Fecha Final</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Fecha Creacion</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Activo</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Vigencia</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Dias Vencimiento</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Control</a></th>
                    </tr>
                        
                      <?php 
                            include ('../conecta.php');
                            $consulta = "SELECT 
                                            id_descuento,
                                            descripcion_descuento,
                                            id_tipo_producto,
                                            descripcion_tipo_pro,
                                            porcentaje_descuento,
                                            fecha_inicial,
                                            fecha_final,
                                            estado_descuento,
                                            fecha_creacion_descuento,
                                            InfoActivo,
                                            diferencia_dias,
                                            vigencia
                                          FROM
                                            view_informacion_descuento_tipo_producto";
                            $rs=$db->Execute($consulta);
                            
                            for($i=0;$i<$rs->Recordcount();$i++){ 
                                
                                $id_descuento=$rs->fields[0];
                                $descripcion_descuento=$rs->fields[1];
                                $id_tipo_producto=$rs->fields[2];
                                $descripcion_tipo_pro = $rs->fields[3];
                                $porcentaje_descuento = $rs->fields[4];
                                $fecha_inicial = $rs->fields[5];
                                $fecha_final = $rs->fields[6];
                                $estado_descuento = $rs->fields[7];
                                $fecha_creacion_descuento = $rs->fields[8];
                                $InfoActivo = $rs->fields[9];
                                $diferencia_dias = $rs->fields[10];
                                $vigencia = $rs->fields[11];
                          
                      ?>  
                      <tr>                    
                        <form method="post" enctype="multipart/form-data" action="recibirActivarDescuentoTipoProducto.php">
                            <td>
                                 <?php echo $id_descuento ?>
                             </td>
                             <td>
                                 <?php echo $descripcion_descuento;?>
                             </td>
                             <td>
                                 <?php echo $descripcion_tipo_pro;?>
                             </td>
                             <td>
                                 <?php echo $porcentaje_descuento;?>
                             </td>
                             <td>
                                 <?php echo $fecha_inicial;?>
                             </td>
                             <td>
                                 <?php echo $fecha_final;?>
                             </td>
                             <td>
                                 <?php echo $fecha_creacion_descuento;?>
                             </td>
                             <td>
                                 <?php echo $InfoActivo;?>
                             </td>
                             <td>
                                 <?php echo $vigencia;?>
                             </td>
                             <td>
                                 <?php echo $diferencia_dias;?>
                             </td>
                            
                             <td>
                                 <input type="hidden" name="id_descuento" value="<?php echo $id_descuento ?>"/>
                                 <input type="submit" class="boton negro redondo" name="guardar" value="<?php echo ($estado_descuento == 1)?'Desactivar':'Activar';?>" />
                             </td>
                         </form>
                        </tr>
                        <?php 
                                $rs->Movenext();
                            }
                            
                            $db->close();
                        ?>
                
                </table>
            <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="volver()" value="Regresar"/></td>
        </div>
     </div>       

</body>
</html>