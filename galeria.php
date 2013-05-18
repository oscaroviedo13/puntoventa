<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" />
</head>
<body>
<?php
    include ('conecta.php');
    include ('funciones.php');
    
    session_start();
    $localidad_designada = $_SESSION['miSession']['localidad_designada'];
    
    $consulta = "select * from view_informacion_producto WHERE id_localidad = ".$localidad_designada." order by id";
    $rs=$db->Execute($consulta);
    
    $nro_reg = $rs->Recordcount();
    
    if ($nro_reg == 0){
        echo 'no se han encontrado productos para mostrar';
    }
    

    $reg_por_pagina=4;
    if (isset($_GET['num'])){
            $nro_pagina=$_GET['num'];	
    }else{
            $nro_pagina=1;
    }
    
   
    
    if (is_numeric($nro_pagina)){
        $inicio=(($nro_pagina-1)*$reg_por_pagina);
    }
    else{
        $inicio=0;
    }

    $consulta="select * from view_informacion_producto WHERE id_localidad = ".$localidad_designada." order by id limit  $inicio,$reg_por_pagina";
    $rs=$db->Execute($consulta);
    
    $can_paginas=ceil($nro_reg/$reg_por_pagina);
?>

<?php 
    include('plantilla/head.php');
?>


<div class="contenedor">
    <table cellspacing ="23" >
        <tr>	
            <?php 
        
            for($i=0;$i<$rs->Recordcount();$i++){        
                $id=$rs->fields[0];
		$imagen=$rs->fields[1];
		$nombre=$rs->fields[2];
		$desc=$rs->fields[3];
		$precio=$rs->fields[6];
		$existencia=$rs->fields[7];
		$fecha=$rs->fields[9];
		$iva=$rs->fields[10];
		$descripcionUnidad=$rs->fields[12];
		$convencionUnidad=$rs->fields[13];
		$descripcionTipo=$rs->fields[5];
                $id_produc_localidad=$rs->fields[18];

            ?> 
                <td>
                    <div class="caja">            
                        <h5><?php echo $nombre?></h5>
                            <img src="<?php echo $imagen?>" width="100" height="90">
                            <p>$<?php echo $precio?></p>
                            <form action="detalle.php" method="post" name="detalle">
                                    <input name="id" type="hidden" value="<?php echo $id ?>" />
                                    <input name="id_pro_localidad" type="hidden" value="<?php echo $id_produc_localidad ?>" />   
                                    <input class="boton negro redondo" type="submit" value="Detalle">
                            </form>
                    </div>
                </td>
            <?php
                $rs->Movenext();
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
        
         $db->close();
?>
</div>
</body>
</html>
