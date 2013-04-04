<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="../css/smoke.css" type="text/css" media="screen" /> 
        <script src="../js/smoke/smoke.min.js" type="text/javascript"></script>	
	<link id="theme" rel="stylesheet" href="../css/smoke/themes/dark.css" type="text/css" media="screen" />
    </head>
    <body>
        
<?php include ('../conexion.php');?>
<?php 
$id=$_POST['id3'];
$nombre=$_POST['nombre3'];
$precio=$_POST['precio3'];
$desc=$_POST['desc3'];
$existencia=$_POST['existencia3'];
$fecha=$_POST['fecha3'];

$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen2']['tmp_name'];
$nombreImagen=$_FILES['imagen2']['name'];
$rutaDestino=$rutaEnServidor.'/'.$id.".jpg";

if ($_FILES['imagen2']['name']<>""){
    //echo 'intento cambiar la imagen';
    move_uploaded_file($rutaTemporal,"../".$rutaDestino);
    $a=grabarCambios($id,$nombre,$desc,$precio,$existencia,$rutaDestino,$fecha);	
}else{
    //echo 'no intento cambiar la imagen';
    $recuperoArray=EncotrarReg($id);
    $rutaDestino=$recuperoArray['imagen'];
    $a=grabarCambios($id,$nombre,$desc,$precio,$existencia,$rutaDestino,$fecha);
}

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


