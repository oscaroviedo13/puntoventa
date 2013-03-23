<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 
session_start();

if ($_SESSION['miSession']['permiso']==1){
     echo 'tiene permiso<br>';
	 echo $_SESSION['miSession']['nombre'].'<br>';
	 echo $_SESSION['miSession']['usuario'].'<br>';
	 echo $_SESSION['miSession']['permiso'].'<br>';
}else{
     echo 'no tiene permisos';
	 ?>
       <html>
          	<head>
               	<meta http-equiv="refresh" content="3; url= pidodatos.php">   
            </head>
       </html>
      <?php
}


?>

</body>
</html>
