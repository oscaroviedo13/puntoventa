<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    
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
    <div id="table-conten">
        
        <h2>Modificacion de producto. </h2>
        <h3>Permite realizar las modificaciones necesarias de los productos ingresados en sistema.</h3>
        <form action="recibirEditar.php" method="post" enctype="multipart/form-data" id="form1">

            <table width="702" align="center" cellpadding="10" cellspacing="10" border="0" id="id-form">

                <tr>
                    <td width="107">Imagen:</td>
                <td width="166" align="center"><label for="imagen"></label><img src="<?php echo '../'.$imagen; ?>" alt="" width="70" height="60" /></td>
                <td width="329"><input name="imagen2" type="file"  id="imagen" maxlength="200" /></td>
                </tr>
                <tr>
                    <input name="id3" type="hidden" value="<?php echo $id ?>" />                                               
                    <td>Nombre:</td>
                <td><input type="text" name="nombre3" class="inp-form" id="nombre" value="<?php echo $nombre ?>"/></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><input type="text" name="desc3" class="inp-form" id="desc" value="<?php echo $desc ?>"/></td>
                </tr>
                <tr>
                    <td>Existencia:</td>
                    <td><input type="text" name="existencia3" class="inp-form" id="cantidad" value="<?php echo $cantidad ?>"/></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" name="precio3" class="inp-form" id="precio" value="<?php echo $precio ?>"/></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><input type="text" name="fecha3" class="inp-form" id="fecha" value="<?php  echo $fecha ?>"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="boton negro redondo" name="button" id="button" value="Modificar" /></td>
                </tr>
            </table>

        </form>
    </div>
</body>
</html>