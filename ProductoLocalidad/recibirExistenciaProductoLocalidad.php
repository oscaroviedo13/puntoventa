<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="../css/smoke.css" type="text/css" media="screen" /> 
        <script src="../js/smoke/smoke.min.js" type="text/javascript"></script>	
	<link id="theme" rel="stylesheet" href="../css/themes/dark.css" type="text/css" media="screen" />
    </head>
    <body>
        <?php
        
            include ('../funciones.php');
    
            $id_producto = $_POST['id_producto'];
            $id_producto_localidad = $_POST['id_producto_localidad'];
            $existencia_producto_localidad = $_POST['existencia_nueva'];
            $nombre_producto = $_POST['nombre_producto'];
//
//            echo $id_producto;
//            echo "<br>";
//            echo $id_producto_localidad;
//            echo "<br>";
//            echo $precio_producto_localidad;
//            
//            echo $_SERVER['PHP_SELF'];
            
            $a= modificarExistenciaProductoLocalidad($id_producto_localidad, $existencia_producto_localidad);	
//            echo 'dato:'.$a;
            if($a != 1){
            ?>
                <script>
                    javascript:smoke.signal('Error al intentar realizar el cambio.');
                </script>
            <?php 
            }  
            else {
                ?>
                <script>
                    javascript:smoke.signal('Modificacion realizada existosamente.');
                </script>
            <?php 
            }

            ?>
            
        <meta http-equiv="refresh" content="1; url= ../ProductoLocalidad/existenciaProductoLocalidad.php?id2=<?php echo $id_producto;?>&nombre2=<?php echo $nombre_producto;?>">   
    </body>
</html>
