
<?php 
define ('BASE_URL','http://localhost/puntoventa/');

function base_url($cad){
    return BASE_URL.$cad;	
};

include("conecta.php");
?>
      
<?php 
function EncotrarRutaImagen($id)
{
        include("conecta.php");
	$consulta="select * from productos where id=$id";
        $sRutaImagen = "";
        
        $rs=$db->Execute($consulta);

        for($i=0;$i<$rs->Recordcount();$i++){
            $sRutaImagen = $rs->fields[1];                  
            $rs->Movenext();            
        }
        
        $db->close();
        
	return $sRutaImagen;
}
?>

<?php 

function modificarProducto($idProducto,$nombreProducto,$descripcionProducto,$id_tipo_pro, $id_unidad,$iva,  $imagen , $id_pro_localidad){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($idProducto)){

        $cad="CALL proc_modificar_producto($idProducto, '$nombreProducto', '$descripcionProducto', $id_tipo_pro, $id_unidad, $iva, '$imagen', $id_pro_localidad);";
        
        $rs=$db->Execute($cad); 
        if($rs){
            $retorno = 1;
        }
   }
   
   return $retorno;
}

function crearProducto($imagenProducto,$nombreProducto,$descripcionProducto,$precioBase,$id_tipo_pro, $iva, $id_unidad, $stock){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($imagenProducto)){

        $cad="CALL proc_crear_producto('$imagenProducto', '$nombreProducto', '$descripcionProducto', $precioBase, $id_tipo_pro, $iva, $id_unidad, $stock);";
        
        $rs=$db->Execute($cad); 
        if($rs){
            $retorno = 1;
        }
   }
   
   return $retorno;
}

function crearAsignarProductoLocalidad($id_producto, $id_localidad){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($id_producto)){

        $cad="CALL proc_asignar_localidad_producto($id_producto,$id_localidad);";
        
        $rs=$db->Execute($cad); 
        if($rs){
            $retorno = 1;
        }
   }
   
   return $retorno;
}

function modificarPrecioProductoLocalidad($id_localidad, $precio_producto){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($id_localidad)){

        $cad="CALL proc_modificar_producto_localidad($id_localidad,$precio_producto);";        
        $rs=$db->Execute($cad); 
        if($rs){
            $retorno = 1;
        }
   }
   
   return $retorno;
}

function modificarExistenciaProductoLocalidad($id__producto_localidad, $nueva_existencia){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($id__producto_localidad)){

        $cad="CALL proc_ingresar_existencia($id__producto_localidad,$nueva_existencia);";        
        $rs=$db->Execute($cad); 
        if($rs){
            $retorno = 1;
        }
   }
   
   return $retorno;
}
function modificarStockProductoLocalidad($id__producto_localidad, $stock_minimo){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($id__producto_localidad)){

        $cad="CALL proc_ingresar_stock($id__producto_localidad,$stock_minimo);";        
        $rs=$db->Execute($cad); 
        if($rs){
            $retorno = 1;
        }
   }
   
   return $retorno;
}

function crearDescuentoTipoProducto($descripcion,$idTipoProducto,$porcentaje,$fechaInicial,$fechaFinal){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($idTipoProducto)){

        $cad="CALL proc_crear_descuento_tipo_producto('$descripcion',$idTipoProducto,$porcentaje,'$fechaInicial','$fechaFinal');";
        
        $rs=$db->Execute($cad); 
        
        for($i=0;$i<$rs->Recordcount();$i++){
            $retorno = $rs->fields[0];                  
            $rs->Movenext();            
        }        
        $db->close();        
   }
//   $retorno = $cad;
   return $retorno;
}

function crearDescuentoLocalidad($descripcion,$idLocalidad,$porcentaje,$fechaInicial,$fechaFinal){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($idLocalidad)){

        $cad="CALL proc_crear_descuento_localidad('$descripcion',$idLocalidad,$porcentaje,'$fechaInicial','$fechaFinal');";
//        echo 'Cadena:'.$cad;
        $rs=$db->Execute($cad); 
        
        for($i=0;$i<$rs->Recordcount();$i++){
            $retorno = $rs->fields[0];                  
            $rs->Movenext();            
        }        
        $db->close();        
   }
//   $retorno = $cad;
   return $retorno;
}
function activarDescuentoTipoProducto($id_descuento){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($id_descuento)){

        $cad="CALL proc_activar_descuento_tipo_producto($id_descuento);";
//        echo 'Cadena:'.$cad;
        $rs=$db->Execute($cad); 
        
        for($i=0;$i<$rs->Recordcount();$i++){
            $retorno = $rs->fields[0];                  
            $rs->Movenext();            
        }        
        $db->close();        
   }
//   $retorno = $cad;
   return $retorno;
}

function activarDescuentoLocalidad($id_descuento){
    $retorno = 0;
    include("conecta.php");
    //Escribo en mi base de datos
    if (isset($id_descuento)){

        $cad="CALL proc_activar_descuento_localidad($id_descuento);";
//        echo 'Cadena:'.$cad;
        $rs=$db->Execute($cad); 
        
        for($i=0;$i<$rs->Recordcount();$i++){
            $retorno = $rs->fields[0];                  
            $rs->Movenext();            
        }        
        $db->close();        
   }
//   $retorno = $cad;
   return $retorno;
}
?>


