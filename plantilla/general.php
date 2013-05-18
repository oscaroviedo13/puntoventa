<?php 
    session_start();

    include ('../conecta.php');

    $NombreMenu = "";

    


    if(!isset($_SESSION["contadorSession"])){
        ?>
        <meta http-equiv="refresh" content="1; url= ../usuarios/falloInicioSesion.php">  
        <?php
    }else{
        $rs=$db->Execute("SELECT 
        localidad.id_localidad,  
        localidad.nombre_localidad,  
        comuna.id_comuna,  
        comuna.nombre_comuna 
        FROM  
        localidad  
        INNER JOIN comuna ON (localidad.id_comuna = comuna.id_comuna) 
        WHERE 
        localidad.id_localidad = ".$_SESSION['miSession']['localidad_designada']);

        for($i=0;$i<$rs->Recordcount();$i++){
            $NombreMenu = $rs->fields[1]." (".$rs->fields[3].").";
            $rs->Movenext();
        }
        $db->close();   
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="../Swf.ico" type="image/x-icon" rel="shortcut icon" />
        <title>Punto de Venta.</title>
        <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
        <link rel="stylesheet" href="../css/fonts/Fuentes.css" type="text/css" media="screen" title="default" />  
        <!--<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>-->
        <!--<link href='http://fonts.googleapis.com/css?family=Aguafina+Script' rel='stylesheet' type='text/css'>-->
        <!--<link href='http://fonts.googleapis.com/css?family=Oldenburg' rel='stylesheet' type='text/css'>-->
        <!--<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>-->
       
        
        <!--  jquery core -->
        <script src="../js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!-- Custom jquery scripts -->
        <script src="../js/jquery/custom_jquery.js" type="text/javascript"></script>

        <!--Start of Zopim Live Chat Script-->
        <script src="../js/Zopim.js" type="text/javascript"></script>
        <!--End of Zopim Live Chat Script-->
       

        <script language="Javascript">
        function abrir(pagina) {
                window.open(pagina,'window','params');
        }
        </script>

    </head>
    <body> 
        <header>
            <!-- Start: page-top-outer -->
            <div id="page-top-outer">    

            <!-- Start: page-top -->
            <div id="page-top">

                    <!-- start logo -->
                    <div id="logo" style="margin:0 auto; position: relative;">
                        <img id="logoImagen" src="../images/icons/cart_icon.png" width="40" height="40" alt="" />	
                    </div>
                    <div id="logo">
                        <table>
                            <tr>
                                <td id="cabeceraGenLogo1">Merca</td>
                                <td id="cabeceraGenLogo2">Web</td>
                            </tr>
                            
                        </table>                    
                    </div>
                    <!-- end logo -->

                    <!--  start top-search -->
                    <div id="top-search">
                                    <h1 id="cabeceraGen2"><?php echo $_SESSION['miSession']['nombre']." ".$_SESSION['miSession']['apellido'] ?></h1>
                                    <h1 id="cabeceraGen1"><?php echo $_SESSION['miSession']['descripcion_perfil'] ?></h1>
                                    
                    </div>
                    <!--  end top-search -->
                    <div class="clear"></div>

            </div>
            <!-- End: page-top -->

            </div>
            <!-- End: page-top-outer -->

            <div class="clear">&nbsp;</div>
        </header>
        <nav>
            <!--  start nav-outer-repeat................................................................................................. START -->
            <div class="nav-outer-repeat"> 
            <!--  start nav-outer -->
            <div class="nav-outer"> 
                            <!-- start nav-right -->
                            <div id="nav-right">
                                    <div class="nav-divider">&nbsp;</div>
                                    <div class="showhide-account"><img src="../images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
                                    <div class="nav-divider">&nbsp;</div>
                                    <a href="../usuarios/logout.php" id="logout"><img src="../images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
                                    <div class="clear">&nbsp;</div>

                                    <!--  start account-content -->	
                                    <div class="account-content">
                                    <div class="account-drop-inner">
            <!--				<a href="" id="acc-settings">Settings</a>-->
                                            <a href="" id="acc-settings"><?php echo $_SESSION['miSession']['usuario'] ?> </a>
                                            <div class="clear">&nbsp;</div>
                                            <div class="acc-line">&nbsp;</div>
                                            <a href="" id="acc-details">Personal details </a>
                                            <div class="clear">&nbsp;</div>
                                            <div class="acc-line">&nbsp;</div>
                                            <a href="" id="acc-project">Project details</a>
                                            <div class="clear">&nbsp;</div>
                                            <div class="acc-line">&nbsp;</div>
                                            <a href="" id="acc-inbox">Inbox</a>
                                            <div class="clear">&nbsp;</div>
                                            <div class="acc-line">&nbsp;</div>
                                            <a href="" id="acc-stats">Statistics</a> 
                                    </div>
                                    </div>
                                    <!--  end account-content -->

                            </div>
                            <!-- end nav-right -->


                            <!--  start nav -->
                            <div class="nav">
                            <div class="table">

                            <ul class="select"><li><a href="#nogo"><b>Productos</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub">
                                    <ul class="sub">

                                            <li><a href="../productos/articulos.php" target="CONTENIDO" >Listado de productos</a></li>
                                            <li><a href="../galeria.php" target="CONTENIDO" >Galeria de productos</a></li>
                                            <li><a href="../productos/crear.php" target="CONTENIDO">Ingresar Producto</a></li>
                                            <!--<li><a href="#nogo">Dashboard Details 3</a></li>-->
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>

                            <div class="nav-divider">&nbsp;</div>

                            <ul class="current"><li><a href="#nogo"><b>Facturacion</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub show">
                                    <ul class="sub">
                                        <li class="sub_show"><a href="../caja/cajaventa.php" onClick="abrir(this.href);return false">Cargar Caja</a></li>
                                        <li><a href="#nogo">Imprimir Factura.</a></li>
                                        <!--<li><a href="#nogo">Delete products</a></li>-->
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>

                            <div class="nav-divider">&nbsp;</div>

                            <ul class="select"><li><a href="#nogo"><b>Inventario</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub">
                                    <ul class="sub">
                                            <li><a href="#nogo">Ingresar Existencia</a></li>
                                            <li><a href="../ProductoLocalidad/ingresarProductoLocalidad.php" target="CONTENIDO" >Ingresar Producto/Localidad</a></li>
                                            <!--<li><a href="#nogo"></a></li>-->
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>

                            <div class="nav-divider">&nbsp;</div>

                            <ul class="select"><li><a href="#"><b>Descuentos</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub">
                                    <ul class="sub">
                                            <li><a href="../Descuentos/crearDescuentoTipoProducto.php" target="CONTENIDO">Crear Descuentos Tipo Producto</a></li>
                                            <li><a href="../Descuentos/administracionDescuentoTipoProducto.php" target="CONTENIDO">Administrar Descuentos Tipo Producto</a></li>
                                            <li><a href="../Descuentos/crearDescuentoLocalidad.php" target="CONTENIDO">Crear Descuentos Localidad</a></li>
                                            <li><a href="../Descuentos/administracionDescuentoLocalidad.php" target="CONTENIDO">Administrar Descuentos Localidad</a></li>
                                       
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>

                            <div class="nav-divider">&nbsp;</div>

                            <ul class="select"><li><a href="#nogo"><b>Cuentas</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub">
                                    <ul class="sub">
                                            <li><a href="#nogo">Ingresar Usuario.</a></li>
                                            <li><a href="#nogo">Reporte Usuarios.</a></li>
                                            <li><a href="#nogo">Movimiento Usuarios.</a></li>
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>

                            <div class="nav-divider">&nbsp;</div>

                            <ul class="select"><li><a href="#nogo"><b>Auditoria</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub">
                                    <ul class="sub">
                                            <li><a href="#nogo">News details 1</a></li>
                                            <li><a href="#nogo">News details 2</a></li>
                                            <li><a href="#nogo">News details 3</a></li>
                                    </ul>
                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            </ul>

                            <!--<div class="clear"></div>-->
                            </div>
                            <!--<div class="clear"></div>-->
                            </div>
                            <!--  start nav -->

            </div>
            <div class="clear"></div>
            <!--  start nav-outer -->
            </div>
        </nav>
    
        <!--  start nav-outer-repeat................................................... END -->
    
      <section>
            <!-- start content-outer ........................................................................................................................START -->
            <div id="content-outer">
            <!-- start content -->
            <div id="content">

                <!--  start page-heading -->
                <div id="page-heading">
                     <table>
                        <tr>
                            <td id="cabeceraLocalidad1">Localidad: </td>
                            <td id="cabeceraLocalidad2"><?php echo $NombreMenu ?></td>
                        </tr>
                    </table>  
                </div>

                <iframe src="../galeria.php" name="CONTENIDO" width="100%" height="600"  scrolling="auto" frameborder="0"  />
                
            </div>
            </div>
        </section>   
    </body>
</html>

 <?php
}
?>