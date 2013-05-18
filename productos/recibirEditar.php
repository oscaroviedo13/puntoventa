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
    
        
            $id=$_POST['id3'];
            $id_pro_localidad=$_POST['id_pro_localidad'];
            $nombre=$_POST['nombre3'];
            $iva=$_POST['iva3'];
            $desc=$_POST['desc3'];
            $descripcion_tipo_proArray=$_POST['descripcion_tipo_pro3'];
            $descripcion_tipo_pro=0;


            $id_unidadArray=$_POST['descripcion_uni'];
            $id_unidad=0;

            for ($index = 0; $index < count($descripcion_tipo_proArray); $index++) {
                $descripcion_tipo_pro = $descripcion_tipo_proArray[$index];
            }

            for ($index = 0; $index < count($id_unidadArray); $index++) {
                $id_unidad = $id_unidadArray[$index];
            }

            $rutaEnServidor='imagenes';
            $rutaTemporal=$_FILES['imagen2']['tmp_name'];
            $nombreImagen=$_FILES['imagen2']['name'];
            $rutaDestino=$rutaEnServidor.'/'.$id.".jpg";

            if ($_FILES['imagen2']['name']<>""){
                //echo 'intento cambiar la imagen';
                move_uploaded_file($rutaTemporal,"../".$rutaDestino);
            }else{
                //echo 'no intento cambiar la imagen';
                $rutaDestino=EncotrarRutaImagen($id);
            }

            $a= modificarProducto($id,$nombre,$desc,$descripcion_tipo_pro, $id_unidad, $iva,$rutaDestino,$id_pro_localidad);	

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


       	<meta http-equiv="refresh" content="1; url= ../galeria.php">   
    </body>  
</html>


