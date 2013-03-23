<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="finalizarpedido.php">
<h1>Confirmar Pedido
</h1>
<table width="283" border="0">
  <tr>
    <td colspan="5" align="center"> LISTADO DE SUS COMPRAS</td>
  </tr>
  <tr>
    <td width="43" bgcolor="#FF9900">PRODUCTO</td>
    <td width="43" bgcolor="#FF9900">PRECIO</td>
    <td width="43" bgcolor="#FF9900">CANTIDAD</td>
    <td width="126" colspan="2" bgcolor="#FF9900">SUBTOTAL</td>
  </tr>
  <?php
 session_start();
 $mi_carrito=$_SESSION['carrito'];
      if (isset($mi_carrito)){
	    $total=0;
		for ($i=0;$i<count($mi_carrito);$i++){
			if($mi_carrito[$i]<>NULL)
			{
   ?>
  <tr>
    <td bgcolor="#FFFADD"><?php echo $mi_carrito[$i]['nombre'] ?></td>
    <td bgcolor="#FFFADD"><?php echo $mi_carrito[$i]['precio']  ?></td>
    <td bgcolor="#FFFADD"><?php echo $mi_carrito[$i]['cantidad'] ?></td>
    <?php 
		$subtotal=$mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
	    $total=$total+$subtotal;
	?>
    <td bgcolor="#FFFADD"><?php echo $subtotal ?>
    </td>
    <td bgcolor="#FFFADD">&nbsp;</td>
  </tr>
  <?php 
			}
	  }
  }
  ?>
  <tr>
    <td bgcolor="#FFFADD">&nbsp;</td>
    <td bgcolor="#FFFADD">&nbsp;</td>
    <td bgcolor="#FFFADD">TOTAL    </td>
    <td colspan="2" bgcolor="#FFFADD"><?php if (isset($total)) echo $total ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFADD">&nbsp;</td>
    <td bgcolor="#FFFADD">&nbsp;</td>
    <td bgcolor="#FFFADD">&nbsp;
      </td>
    <td colspan="2" bgcolor="#FFFADD">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FF9900"><strong>Datos del comprador</strong></td>
    </tr>
  <tr>
    <td bgcolor="#FFFADD">&nbsp;</td>
    <td colspan="4" bgcolor="#FFFADD">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#FFFADD">Nombre:</td>
    <td colspan="4" bgcolor="#FFFADD"><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre" /></td>
    </tr>
  <tr>
    <td bgcolor="#FFFADD">Dirección:</td>
    <td colspan="4" bgcolor="#FFFADD"><input type="text" name="direccion" id="direccion" /></td>
    </tr>
  <tr>
    <td bgcolor="#FFFADD">Tel:</td>
    <td colspan="4" bgcolor="#FFFADD"><input type="text" name="tel" id="tel" /></td>
    </tr>
  <tr>
    <td bgcolor="#FFFADD">e-mail:</td>
    <td colspan="4" bgcolor="#FFFADD"><input type="text" name="correo" id="correo" /></td>
    </tr>
  <tr>
    <td bgcolor="#FFFADD">&nbsp;</td>
    <td bgcolor="#FFFADD"><input type="submit" name="confirmarPedido" id="confirmarPedido" value="Comprar" /></td>
    <td colspan="3" bgcolor="#FFFADD">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>