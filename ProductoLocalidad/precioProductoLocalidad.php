<?php 
    include ('../conexion.php');
    session_start();    
    $id_producto = $_POST['id2'];
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
</head>

<body>        
    <div id="content-table-inner">
        <div id="table-conten">

            <h2>Asignar precio al producto por localidad. </h2>
            <h3>Permite asignarle un valor al producto en todas las localidades en las que fue asignado.</h3>
			
                <table border="0" width="1000px" cellpadding="0" cellspacing="0" id="product-table">
                    <tr>
                        <th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Nombre Localidad</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Nombre Comuna</a></th>
                        <th class="table-header-repeat line-left"><a href="">Antiguo Precio</a></th>
                        <th class="table-header-repeat line-left"><a href="">Nuevo Precio</a></th>
                    </tr>
                        
                      <?php 
                            $consulta=mysql_query("SELECT id_producto_localidad, 
                                                    nombre_localidad, 
                                                    nombre_comuna, 
                                                    precio_producto 
                                                    FROM view_informacion_producto_localidad_asignada where id = $id_producto order by nombre_localidad",$conexion);
                                    
                            while($filas=mysql_fetch_array($consulta)){
                                
                                $id_producto_localidad=$filas['id_producto_localidad'];
                                $nombre_localidad=$filas['nombre_localidad'];
                                $nombre_comuna=$filas['nombre_comuna'];
                                $precio_producto=$filas['precio_producto'];
                          
                      ?>  
                      <tr>                    
                        <td><?php echo $id_producto_localidad ?></td>
                        <td><?php echo $nombre_localidad;?></td>
                        <td><?php echo $nombre_comuna;?></td>
                        <td><?php echo $precio_producto;?></td>
                        <td><input type="number" class="stylednumber" value="<?php echo $precio_producto ?>"/></td>
                    </tr>
                            <?php }?>
                </table>
                <input type="button" class="boton negro redondo" name="cancel" id="button2" onclick="history.back(-1);" value="Regresar" /></td>
        </div>
     </div>       

</body>
</html>