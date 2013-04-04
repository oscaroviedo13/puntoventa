<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    
</head>
<?php 
$id=$_POST['id2'];
$imagen=$_POST['imagen2'];
$nombre=$_POST['nombre2'];
$desc=$_POST['desc2'];
$cantidad=$_POST['existencia2'];
$precio=$_POST['precio2'];
$fecha=$_POST['fecha2'];
?>
<body>
<!--<form action="recibirEditar.php" method="post" enctype="multipart/form-data" id="form1">-->
  
    <table  border="1" >
        <tr>
        <td>ImagenNueva:</td>
        <td><label for="Imagen2"></label>
<!--        <input type="file" name="imagen2" id="imagen" /></td>-->
        </tr>
        <tr>
        <td>Imagen:</td>
        <td><label for="imagen"></label>
        <img src="<?php echo '../'.$imagen; ?>" alt="" width="70" height="60" /></td>
        <?php echo $id; ?>
        </tr>
        <tr>
            <label title="prueba" >xxxx</label>
            <th valign="top">Nombre:</th>
            <td valign="top">Nombre2:</td>
        <input name="id" type="hidden" value="<?php echo $id ?>" />
        <td><input type="text" name="nombre" class="inp-form" id="nombre" value="<?php echo $nombre ?>"/></td>
        </tr>
        <tr>
        <td>Descripcion:</td>
        <td><input type="text" name="desc" class="inp-form" id="desc" value="<?php echo $desc ?>"/></td>
        </tr>
        <tr>
        <td>EnStock:</td>
        <td><input type="text" name="cantidad" class="inp-form" id="cantidad" value="<?php echo $cantidad ?>"/></td>
        </tr>
        <tr>
        <td>Precio:</td>
        <td><input type="text" name="precio" class="inp-form" id="precio" value="<?php echo $precio ?>"/></td>
        </tr>
        <tr>
        <td>Fecha:</td>
        <td><input type="text" name="fecha" class="inp-form" id="fecha" value="<?php  echo $fecha ?>"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Modificar" /></td>
        </tr>
    </table>
      
      <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Product name:</th>
			<td><input type="text" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Product name:</th>
			<td><input type="text" class="inp-form-error" /></td>
			<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>
		</tr>
      </table>
  
<!--</form>-->
</body>
</html>