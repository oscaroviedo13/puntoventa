<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php include ('../conexion.php');?>


<?php 

session_start();

//if ($_SESSION['miSession']['permiso']==1){
 	$a=verListadoProductos('edicion');
//}

?>
</body>
</html>