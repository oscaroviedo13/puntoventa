
<?php 
$conexion=mysql_connect('localhost','root','') or die('No hay conexion a la base de datos');
$db=mysql_select_db('tienda',$conexion)or die('no existe la base de datos.');

define ('BASE_URL','http://localhost/puntoventa/');

function base_url($cad){
return BASE_URL.$cad;
	
};



function ActualizarStock($id,$can)
{
	
	$consulta="select * from productos where id=$id";
	$res=mysql_query($consulta);
	$fila=mysql_fetch_array($res);
	$enStock=$fila['cuanto_hay'];// obtengo la cantidad en stock
//le paso el id del producto y la cantidad comprada
//Escribo en mi base de datos
 if (isset($id))
   {
    $can=$enStock-$can;
	$cad="UPDATE productos set cuanto_hay='$can' where id=$id";
    mysql_query($cad);
	//echo $cad;
	echo '<p>Registro Actualizado!</p>';
   }
}

?>
<?php function verListadoProductos($modo){?>
<form id="form1" name="form1" method="post" action="">
  <table width="841" border="0" align="left">
    <tr>
      <td width="22">&nbsp;</td>
      <td width="92">&nbsp;</td>
      <td width="111">&nbsp;</td>
      <td width="121">&nbsp;</td>
      <td width="56">&nbsp;</td>
      <td width="94" align="right">BUSCAR:</td>
      <td width="144"><label for="buscar"></label>
      <input type="text" name="buscar" id="buscar" /></td>
      <td width="167"><input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" /></form></td>
    </tr>
    <tr>
      <td colspan="8" align="center">LISTADO DE PRODUCTOS</td>
    </tr>
    <tr>
      <td bgcolor="#FF9900">ID</td>
      <td bgcolor="#FF9900">IMAGEN</td>
      <td bgcolor="#FF9900">NOMBRE</td>
      <td bgcolor="#FF9900">DESCRIPCION</td>
      <td bgcolor="#FF9900">PRECIO</td>
      <td bgcolor="#FF9900">ENSTOCK</td>
      <td bgcolor="#FF9900">FECHA</td>
      <td bgcolor="#FF9900">AGREGAR</td>
    </tr>
    <?php 
		$consulta=mysql_query("select * from productos");
	    if (isset($_POST['buscar'])){
			$consulta=mysql_query("select * from productos where nombre like '%".$_POST['buscar']."%'");
		}
	
		while($filas=mysql_fetch_array($consulta)){
			$id=$filas['id'];
			$imagen=$filas['imagen'];
			$nombre=$filas['nombre'];
			$desc=$filas['descripcion'];
			$precio=$filas['precio'];
			$enStock=$filas['cuanto_hay'];
			$fecha=$filas['fecha'];
			
         ?>
    <tr>
      <?php if ($modo<>'edicion'){?>
      <td bgcolor="#FFFADD"><?php echo $id ?></td>
      <td><img src="<?php echo $imagen; ?>" alt="" width="70" height="60" /><br /></td>
     
      <td bgcolor="#FFFADD"><?php echo $nombre ?></td>
      <td bgcolor="#FFFADD"><?php echo $desc ?></td>
      <td bgcolor="#FFFADD"><?php echo $precio ?></td>
      <td bgcolor="#FFFADD"><?php echo $enStock ?></td>
      <td bgcolor="#FFFADD"><?php echo $fecha ?></td>
      <td bgcolor="#FFFADD">
      <form action="carrito/carrito.php" method="post" name="compra">
        <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
        <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
        <input name="precio" type="hidden" value="<?php echo $precio ?>" />
        <input name="cantidad" type="hidden" value="1" />
        <input name="Comprar" type="submit" value="Comprar" />
      </form>
      <?php }else{?>
      
	   <td bgcolor="#FFFADD"><?php echo $id ?></td>
      <td><img src="<?php echo '../'.$imagen; ?>" alt="" width="70" height="60" /><br /></td>
      <td bgcolor="#FFFADD"><?php echo $nombre ?></td>
      <td bgcolor="#FFFADD"><?php echo $desc ?></td>
      <td bgcolor="#FFFADD"><?php echo $precio ?></td>
      <td bgcolor="#FFFADD"><?php echo $enStock ?></td>
      <td bgcolor="#FFFADD"><?php echo $fecha ?></td>
      <td bgcolor="#FFFADD">
      <form action="editar.php" method="post" name="compra">
        <input name="id2" type="hidden" value="<?php echo $id ?>" />
        <input name="imagen2" type="hidden" value="<?php echo $imagen ?>" />
        <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />
        <input name="desc2" type="hidden" value="<?php echo $desc ?>" />
        <input name="precio2" type="hidden" value="<?php echo $precio ?>" />
        <input name="cantidad2" type="hidden" value="<?php echo $enStock ?>" />
        <input name="fecha2" type="hidden" value="<?php echo $fecha ?>" />
        <input name="Comprar" type="submit" value="Editar" />
         <a href="../productos/cargarproductos.php">Agregar</a>
      </form>
      <form action="borrar.php" method="post">
        <input name="id" type="hidden" value="<?php echo $id ?>" />
        <input name="" value="Borrar" type="submit" />
      </form>
	  <?php }?>
      </td>
    </tr>
    <p>
      <?php }?>
      </table>
<?php  }?>
      
<?php 
function EncotrarReg($id)
{
	$consulta="select * from productos where id=$id";
	$res=mysql_query($consulta);
	$fila=mysql_fetch_array($res);
	return $fila;
}
?>

<?php 
function grabarCambios($idProducto,$nombreProducto,$descripcionProducto,$precioBase,$imagen, $id_tipo_pro, $id_unidad){
    $retorno = 0;
    //Escribo en mi base de datos
    if (isset($idProducto)){

        $cad="UPDATE productos set nombre='$nombreProducto',
                  descripcion='$descripcionProducto',
                      precio_base='$precioBase',
                      imagen='$imagen',
                      id_unidad='$id_unidad',
                      id_tipo_pro='$id_tipo_pro' 
                      WHERE id=$idProducto";

        $retorno=mysql_query($cad);        
   }
   
   return $retorno;
}

function borrar($id)
{
	$sql="delete from productos where id=$id";
	mysql_query($sql);
	echo 'Registro eliminado con exito!';
}

function modificarProducto($idProducto,$nombreProducto,$descripcionProducto,$precioBase,$imagen, $iva, $stock, $id_tipo_pro, $id_unidad){
    $retorno = 0;
    //Escribo en mi base de datos
    if (isset($idProducto)){

        $cad="CALL proc_modificar_producto($idProducto, '$nombreProducto', '$descripcionProducto', $id_tipo_pro, $id_unidad, $precioBase, $iva, $stock, '$imagen');";

        $retorno=mysql_query($cad);        
   }
   
   return $retorno;
}

function crearProducto($imagenProducto,$nombreProducto,$descripcionProducto,$precioBase,$id_tipo_pro, $iva, $id_unidad, $stock){
    $retorno = 0;
    //Escribo en mi base de datos
    if (isset($imagenProducto)){

        $cad="CALL proc_crear_producto('$imagenProducto', '$nombreProducto', '$descripcionProducto', $precioBase, $id_tipo_pro, $iva, $id_unidad, $stock);";
        
        $retorno=mysql_query($cad);        
   }
   
   return $retorno;

}



?>


