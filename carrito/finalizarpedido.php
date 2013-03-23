<?php 
session_start();

$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];

$mi_carrito=$_SESSION['carrito'];
$pedido='<h1>------Pedido------</h1> <br><br>';
if (isset($mi_carrito)){
	    $total=0;
		$pedido.='
			<table width="283" border="0">
  				<tr>
    				<td colspan="4" align="center"> LISTADO DE SUS COMPRAS</td>
  				</tr>
  				<tr>
    				<td width="43" bgcolor="#FF9900">PRODUCTO</td>
    				<td width="43" bgcolor="#FF9900">PRECIO</td>
    				<td width="43" bgcolor="#FF9900">CANTIDAD</td>
    				<td width="126" bgcolor="#FF9900">SUBTOTAL</td>
  				</tr>
  
				';
		
		for ($i=0;$i<count($mi_carrito);$i++){
			if($mi_carrito[$i]<>NULL)
			{
   			$subtotal=$mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
			$total=$total+$subtotal;
			$pedido.='
			<tr>
    		  <td bgcolor="#FFFADD">'.$mi_carrito[$i]['nombre'].'</td>
    		  <td bgcolor="#FFFADD">'.$mi_carrito[$i]['precio'].'</td>
    		  <td bgcolor="#FFFADD">'.$mi_carrito[$i]['cantidad'].'</td>
        	  <td bgcolor="#FFFADD">'.$subtotal.'</td>
  		    </tr>';
			}
	    }
$pedido.='<tr><td> Total: '.$total;
$pedido.='</td></tr>';
echo $pedido;
}
  ?>
