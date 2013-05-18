<?php 
    session_start();    
    $id_producto = $_GET['id2'];
    $nombre_producto = $_GET['nombre2'];
    $filas = null;
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

            <h2>Ingresar existencia por localidad al producto <strong><?php echo $nombre_producto?></strong> con codigo <strong><?php echo $id_producto?></strong>. </h2>
            <h3>Permite ingresa una cantidad de unidades al producto en todas las localidades.</h3>
			
                <table border="0" width="1000px" cellpadding="0" cellspacing="0" id="product-table">
                    <tr>
                        <th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Nombre Localidad</a></th>
                        <th class="table-header-repeat line-left minwidth-2"><a href="">Nombre Comuna</a></th>
                        <th class="table-header-repeat line-left"><a href="">Existencia Actual</a></th>
                        <th class="table-header-repeat line-left"><a href="">Nueva Existencia</a></th>
                    </tr>
                        
                      <?php 
                            include ('../conecta.php');
                            $consulta = "SELECT id_producto_localidad, 
                                                    nombre_localidad, 
                                                    nombre_comuna, 
                                                    existencia 
                                                    FROM view_informacion_producto_existencia where id = $id_producto order by nombre_localidad";
                            $rs=$db->Execute($consulta);
                            
                            for($i=0;$i<$rs->Recordcount();$i++){ 
                                
                                $id_producto_localidad=$rs->fields[0];
                                $nombre_localidad=$rs->fields[1];
                                $nombre_comuna=$rs->fields[2];
                                $existencia_producto_localidad = $rs->fields[3];
                          
                      ?>  
                      <tr>                    
                        <form method="post" enctype="multipart/form-data" action="recibirExistenciaProductoLocalidad.php">
                            <td>
                                 <?php echo $id_producto_localidad ?>
                                 <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>"/>
                                 <input type="hidden" name="id_producto_localidad" value="<?php echo $id_producto_localidad ?>"/>
                                 <input type="hidden" name="nombre_producto" value="<?php echo $nombre_producto ?>"/>
                             </td>
                             <td>
                                 <?php echo $nombre_localidad;?>
                             </td>
                             <td>
                                 <?php echo $nombre_comuna;?>
                             </td>
                             <td>
                                 <?php echo $existencia_producto_localidad ?>
                             </td>                            
                             <td>
                                 <input type="number" name="existencia_nueva" required="required" title="Determine la existencia del producto" min="10" max="10000000" class="stylednumber" value="0"/>
                                 <input type="submit" class="boton negro redondo" name="guardar" value="Cambiar" />
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