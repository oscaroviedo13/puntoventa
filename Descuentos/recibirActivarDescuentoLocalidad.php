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
    

$id_descuento=$_POST['id_descuento'];

$a = activarDescuentoLocalidad($id_descuento);
if($a == 1){
?>
    <script>
        javascript:smoke.signal('Desactivacion realizada exitosamente.');
    </script>
    <meta http-equiv="refresh" content="1; url= ../Descuentos/administracionDescuentoLocalidad.php">  
<?php 
}  
else if($a == 2){
    ?>
    <script>
        javascript:smoke.signal('Activacion realizada exitosamente.');
    </script>
    <meta http-equiv="refresh" content="1; url= ../Descuentos/administracionDescuentoLocalidad.php">  
<?php 
} 
?>


        
    </body>  
</html>


