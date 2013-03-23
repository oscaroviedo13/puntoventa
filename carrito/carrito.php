<?php include ('../conexion.php');?>

<?php include('../plantilla/head.php');?>

<?php 
if (isset($_POST['id_txt'])){
	$id=$_POST['id_txt'];
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$mi_carrito[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);
}
session_start();


if (isset($_SESSION['carrito'])){
	    $mi_carrito=$_SESSION['carrito'];
	if (isset($_POST['id_txt'])){
		$id=$_POST['id_txt'];
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$pos=-1;
		for($i=0;$i<count($mi_carrito);$i++){
			if($id==$mi_carrito[$i]['id']){
				$pos=$i;
			}
		}
		if($pos<>-1){
			$cuanto=$mi_carrito[$pos]['cantidad']+$cantidad;
			$mi_carrito[$pos]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cuanto);
		}else{
			$mi_carrito[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);
		}
	}
}

if (isset($_POST['id2'])){
	$indice=$_POST['id2'];
	$cuanto=$_POST['cantidad2'];
    $mi_carrito[$indice]['cantidad']=$cuanto;

}

if (isset($_POST['id3'])){
	$indice=$_POST['id3'];
	$mi_carrito[$indice]=NULL;
}

if (isset($mi_carrito)) $_SESSION['carrito']=$mi_carrito;


?>
<div  class="vistacarrito" >
<table width="283" border="0">
  <tr>
    <td colspan="5" align="center"> LISTADO DE SUS COMPRAS</td>
  </tr>
  <tr>
    <td width="43" bgcolor="#CCCCCC">PRODUCTO</td>
    <td width="43" bgcolor="#CCCCCC">PRECIO</td>
    <td width="43" bgcolor="#CCCCCC">CANTIDAD</td>
    <td width="126" colspan="2" bgcolor="#CCCCCC">SUBTOTAL</td>
  </tr>
  <?php
      if (isset($mi_carrito)){
	    $total=0;
		for ($i=0;$i<count($mi_carrito);$i++){
			if($mi_carrito[$i]<>NULL)
			{
   ?>
  <tr>
    <td><?php echo $mi_carrito[$i]['nombre'] ?></td>
    <td><?php echo $mi_carrito[$i]['precio']  ?></td>
    <td>
    <form action="" method="post" name="actualizo">
       <input name="id2" type="hidden" value="<?php echo $i ?>" />
       <input name="cantidad2" type="text" value="<?php echo $mi_carrito[$i]['cantidad']  ?>" size="2" maxlength="2" />
       <input name="" type="image" src="../misiconos/actualizar.png" title="Actualizar la catidad"/>
    </form></td>
    <?php 
		$subtotal=$mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
	    $total=$total+$subtotal;
	?>
    <td><?php echo $subtotal ?>
    </td>
    <td><form action="" method="post">
    	<input name="id3" type="hidden" value="<?php echo $i ?>" />
        <input type="image" src="../misiconos/borrar.png" title="Borrar un producto" />
     </form></td>
  </tr>
  <?php 
			}
	  }
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>TOTAL    </td>
    <td colspan="2"><?php if (isset($total)) echo $total ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td ><form id="form1" name="form1" method="post" action="confirmarpedido.php">
      <input type="submit" name="confirmarPedido" id="confirmarPedido" value="Confirmar Pedido" />
    </form></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    
  </tr>
</table>
</div>
<p><a href="../galeria.php">Volver</a></p>
<div style="height:350px"></div>
<?php include('../plantilla/footer.php');?>