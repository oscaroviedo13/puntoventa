<?php 

    session_start();
    
    $localidad_designada = $_SESSION['miSession']['localidad_designada'];
    
    
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Caja</title>
        
    <script language="Javascript">
    function abrir(pagina) {
            window.open(pagina,'window','params');
    }
    </script>
    
       
        
    <link href="../css/caja/395758.css" type="text/css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />-->  
    <link rel="stylesheet" href="../css/caja/Grid.css" type="text/css" media="screen" title="default" />  
    
    <!--<link href='http://fonts.googleapis.com/css?family=Aguafina+Script' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="../css/fonts/Fuentes.css" type="text/css" media="screen" title="default" />  
    
</head>    
    <body>
    <div id="wrapper">
        <div id="headerwrap">
        <div id="header">
            <div id="logo" style="margin:0 auto; position: relative;">
                        <img id="logoImagen" src="../images/icons/cart_icon.png" width="40" height="40" alt="" />	
                    </div>
                <div id="tablaImagen">
                <table>
                            <tr>
                                <td id="cabeceraGenLogo1">Merca</td>
                                <td id="cabeceraGenLogo2">Venta</td>
                            </tr>
                            
                        </table>                    
                    </div>
            
        </div>
        </div>
        <div id="navigationwrap">
        <div id="navigation">
<!--            <p>This is the Menu</p>-->
            <label>sdsada</label>
        </div>
        </div>
        <div id="contentliquid">
            <div id="contentwrap">
                <div id="content" >
                    <table border="1" id="Ventana" align="center" cellspacing="0">
                            <tr>
                                <th class="Etiquetas_centro">Id</th>
                                <th class="Etiquetas_centro">Producto</th>
                                <th class="Etiquetas_centro">Cantidad</th>
                                <th class="Etiquetas_centro">Unidad</th>
                                <th class="Etiquetas_centro">Precio Bruto</th>
                                <th class="Etiquetas_centro">Iva</th>
                                <th class="Etiquetas_centro">Precio Unidad</th>
                                <th class="Etiquetas_centro">Precio Total</th>
                            </tr>

                              <tr onmouseover="this.className='normalActive'" onmouseout="this.className='normal'" class="normal">                    
                                    <td align="center" class="capaazul">1</td>
                                    <td align="center" class="capaverde">Leche Klim</td>
                                    <td align="center" class="capaverde">2</td>
                                    <td align="center" class="capaverde">gr</td>
                                    <td align="center" class="capaverde">14600</td>
                                    <td align="center" class="capaverde">12</td>
                                    <td align="center" class="capaverde">17500</td>
                                    <td align="center" class="capaverde">40200</td>
                                </tr>
                         <tr>                    
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                         <tr>                    
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                        </table>
                </div>
            </div>
        </div>
        
        <div id="rightcolumnwrap">
        <div id="rightcolumn">
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.</p>-->
            <input type="text" />
        </div>
        </div>
        <div id="footerwrap">
        <div id="footer">
            <p>This is the Footer</p>
        </div>
        </div>
    </div>
</body>
</html>