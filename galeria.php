<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" />
</head>
<body>
<?php
include('conexion.php');
$consulta=mysql_query("select * from productos order by id",$conexion);

$nro_reg=mysql_num_rows($consulta);

if ($nro_reg==0){
	echo 'no se han encontrado productos para mostrar';
}

$reg_por_pagina=4;
if (isset($_GET['num'])){
	$nro_pagina=$_GET['num'];	
}else{
	$nro_pagina=1;
}



if (is_numeric($nro_pagina))
	$inicio=(($nro_pagina-1)*$reg_por_pagina);

else
	$inicio=0;

	$consulta=mysql_query("select * from productos order by id limit  $inicio,$reg_por_pagina",$conexion);
	$can_paginas=ceil($nro_reg/$reg_por_pagina);
?>

<?php 
    include('plantilla/head.php');
?>


<div class="contenedor">
    <table cellspacing ="23" >
        <tr>	
            <?php 

            while($filas= mysql_fetch_array($consulta)) {	
                    $id=$filas['id'];
                    $imagen=$filas['imagen'];
                    $nombre=$filas['nombre'];
                    $desc=$filas['descripcion'];
                    $precio=$filas['precio_base'];
                    $existencia=$filas['existencia'];
                    $fecha=$filas['fecha_ingreso'];

            ?> 
            <td>
                    <div class="caja">            
                        <h5><?php echo $nombre?></h5>
                            <img src="<?php echo $imagen?>" width="100" height="90">
                            <p>$<?php echo $precio?></p>
                            <form action="detalle.php" method="post" name="detalle">
                                    <input name="id" type="hidden" value="<?php echo $id ?>" />
                                    <input class="boton negro redondo" type="submit" value="Detalle">
                            </form>
                    </div>
            </td>
            <?php
            }		
            ?>
	</tr>
   </table>
</div>

<div id ="paginador" align="center">
<?php 
	
	if($nro_pagina>1)
   		echo "<a href='galeria.php?num=".($nro_pagina-1)."'>Anterior</a> ";

	for ($i=1;$i<=$can_paginas;$i++){
		if ($i==$nro_pagina)
			echo "<span>$i </span> ";
			//echo $i."  ";
		else
    		echo "<a href='galeria.php?num=$i'>$i</a> ";
   
	}
	if($nro_pagina<$can_paginas)
   		echo "<a href='galeria.php?num=".($nro_pagina+1)."'>Siguiente</a> ";
?>
</div>
</body>
</html>
