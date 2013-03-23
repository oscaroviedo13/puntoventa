<?php include ('../conexion.php');?>
<?php 

$id=$_POST['id'];
$a=borrar($id);
?>

<html>
 <head>
   	<meta http-equiv="refresh" content="1; url= buscar.php">   
 </head>
</html>

