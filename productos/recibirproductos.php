
<?php include ('../conexion.php');?>
<?php 

$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
//echo 'ruta temporal :'.$rutaTemporal.'<br>';
//echo 'ruta Destino :'.$rutaDestino.'<br>';
move_uploaded_file($rutaTemporal,'../'.$rutaDestino);

$nombre=$_POST['nombre'];
$precio=$_POST['precio'];

$desc=$_POST['descripcion'];
$existencia=$_POST['enStock'];
$fecha=$_POST['fecha'];


//$sql="INSERT INTO datos (ruta,descripcion) values('".$rutaDestino."','".$desc."')";
$sql="INSERT INTO productos (imagen,nombre,descripcion,precio,cuanto_hay,fecha)
      values('".$rutaDestino."',
	  '".$nombre."',
	  '".$desc."',
	  '".$precio."',
	  '".$existencia."',
	  '".$fecha."')";
	  
$res=mysql_query($sql,$conexion);

if ($res){
	echo 'inserción con exito';
}else{
    echo 'no se puedo insertar';
} 


?>
