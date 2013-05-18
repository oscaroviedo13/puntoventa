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
    

$descripcion=$_POST['descripcionDescuento'];
$porcentaje=$_POST['porcentajeDescuento'];
$fechaInicial=$_POST['dateInicial'];
$fechaFinal=$_POST['dateFinal'];
$descripcion_tipo_proArray=$_POST['tipo_producto'];

$idTipoProducto=0;

for ($index = 0; $index < count($descripcion_tipo_proArray); $index++) {
    $idTipoProducto = $descripcion_tipo_proArray[$index];
}

//echo 'Datos: '.$descripcion.'?'.$idTipoProducto.'?'.$porcentaje.'?'.$fechaInicial.'?'.$fechaFinal;
$a = crearDescuentoTipoProducto($descripcion,$idTipoProducto,$porcentaje,$fechaInicial,$fechaFinal);
//echo 'Retorno: '.$a;
if($a == 1){
?>
    <script>
        javascript:smoke.signal('Creacion realizada existosamente.');
    </script>
    <meta http-equiv="refresh" content="1; url= ../productos/articulos.php">  
<?php 
}  
else if($a == 2){
    ?>
    <script>
        javascript:smoke.signal('Este descuento ya existe y se encuentra activo.');
    </script>
    <meta http-equiv="refresh" content="1; url= ../Descuentos/crearDescuentoTipoProducto.php"> 
<?php 
} else if($a == 3){
     ?>
    <script>
        javascript:smoke.signal('No se permite crear descuentos con fechas anteriores a la fecha actual.');
    </script>
    <meta http-equiv="refresh" content="1; url= ../Descuentos/crearDescuentoTipoProducto.php"> 
    <?php 
}else{
     ?>
    <script>
        javascript:smoke.signal('Error al intentar crear el descuento.');
    </script>
    <meta http-equiv="refresh" content="1; url= ../Descuentos/crearDescuentoTipoProducto.php">  
    <?php 
}

?>


        
    </body>  
</html>


