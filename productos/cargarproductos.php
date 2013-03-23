<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Documento sin título</title>

</head>

<body>
<form action="recibirproductos.php" method="post" enctype="multipart/form-data" id="form1">
  <table width="249" border="0">
    <tr>
      <td colspan="2">Ingresar productos a Stock</td>
    </tr>
    <tr>
      <td width="171">&nbsp;</td>
      <td width="68">&nbsp;</td>
    </tr>
    <tr>
      <td>Imagen:</td>
      <td><label for="imagen"></label>
      <input type="file" name="imagen" id="imagen" /></td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre" /></td>
    </tr>
    <tr>
      <td>Descripción:</td>
      <td><label for="descripcion"></label>
      <input type="text" name="descripcion" id="descripcion" /></td>
    </tr>
    <tr>
      <td>Precio:</td>
      <td><label for="precio"></label>
      <input type="text" name="precio" id="precio" /></td>
    </tr>
    <tr>
      <td>EnStock:</td>
      <td><label for="enStock"></label>
      <input type="text" name="enStock" id="enStock" /></td>
    </tr>
    <tr>
      <td>Fecha:</td>
      <td><label for="fecha"></label>
      <input type="text" name="fecha" id="fecha" value="<?php  echo date("Y-m-d"); ?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="Enviar" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
