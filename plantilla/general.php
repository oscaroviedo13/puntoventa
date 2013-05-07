<?php 
session_start();
$NombreMenu = "Seleccione la opcion deseada.";

if(!isset($_SESSION["contadorSession"])){
    ?>
    <meta http-equiv="refresh" content="1; url= ../boton.html">  
    <?php
}else{
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="../Swf.ico" type="image/x-icon" rel="shortcut icon" />
        <title>Punto de Venta.</title>
        <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
        <!--[if IE]>
        <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
        <![endif]-->

        <!--  jquery core -->
        <script src="../js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!--Start of Zopim Live Chat Script-->
        <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='//cdn.zopim.com/?190bir6INMNTWbmrwTGUuPc88imSHbVW';z.t=+new Date;$.
        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
        </script>


        <!--End of Zopim Live Chat Script-->

        <!--  checkbox styling script -->
        <script src="../js/jquery/ui.core.js" type="text/javascript"></script>
        <script src="../js/jquery/ui.checkbox.js" type="text/javascript"></script>
        <script src="../js/jquery/jquery.bind.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function(){
                $('input').checkBox();
                $('#toggle-all').click(function(){
                $('#toggle-all').toggleClass('toggle-checked');
                $('#mainform input[type=checkbox]').checkBox('toggle');
                return false;
                });
        });
        </script>  

        <![if !IE 7]>

        <!--  styled select box script version 1 -->
        <script src="../js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
        });
        </script>


        <![endif]>

        <!--  styled select box script version 2 --> 
        <script src="../js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
                $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
        });
        </script>

        <!--  styled select box script version 3 --> 
        <script src="../js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
        });
        </script>

        <!--  styled file upload script --> 
        <script src="../js/jquery/jquery.filestyle.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
          $(function() {
              $("input.file_1").filestyle({ 
                  image: "images/forms/choose-file.gif",
                  imageheight : 21,
                  imagewidth : 78,
                  width : 310
              });
          });
        </script>

        <!-- Custom jquery scripts -->
        <script src="../js/jquery/custom_jquery.js" type="text/javascript"></script>

        <!-- Tooltips -->
        <script src="../js/jquery/jquery.tooltip.js" type="text/javascript"></script>
        <script src="../js/jquery/jquery.dimensions.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
                $('a.info-tooltip ').tooltip({
                        track: true,
                        delay: 0,
                        fixPNG: true, 
                        showURL: false,
                        showBody: " - ",
                        top: -35,
                        left: 5
                });
        });
        </script> 


        <!--  date picker script -->
        <link rel="stylesheet" href="../css/datePicker.css" type="text/css" />
        <script src="../js/jquery/date.js" type="text/javascript"></script>
        <script src="../js/jquery/jquery.datePicker.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
                $(function()
        {

        // initialise the "Select date" link
        $('#date-pick')
                .datePicker(
                        // associate the link with a date picker
                        {
                                createButton:false,
                                startDate:'01/01/2005',
                                endDate:'31/12/2020'
                        }
                ).bind(
                        // when the link is clicked display the date picker
                        'click',
                        function()
                        {
                                updateSelects($(this).dpGetSelected()[0]);
                                $(this).dpDisplay();
                                return false;
                        }
                ).bind(
                        // when a date is selected update the SELECTs
                        'dateSelected',
                        function(e, selectedDate, $td, state)
                        {
                                updateSelects(selectedDate);
                        }
                ).bind(
                        'dpClosed',
                        function(e, selected)
                        {
                                updateSelects(selected[0]);
                        }
                );

        var updateSelects = function (selectedDate)
        {
                var selectedDate = new Date(selectedDate);
                $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                $('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
        }
        // listen for when the selects are changed and update the picker
        $('#d, #m, #y')
                .bind(
                        'change',
                        function()
                        {
                                var d = new Date(
                                                        $('#y').val(),
                                                        $('#m').val()-1,
                                                        $('#d').val()
                                                );
                                $('#date-pick').dpSetSelected(d.asString());
                        }
                );

        // default the position of the selects to today
        var today = new Date();
        updateSelects(today.getTime());

        // and update the datePicker to reflect it...
        $('#d').trigger('change');
        });
        </script>

        <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script src="../js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function(){
        $(document).pngFix( );
        });
        </script>

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
                    <div id="logo">
                    <a href=""><img src="../images/icons/cart_icon.png" width="40" height="40" alt="" /></a>	</div>
                    <!-- end logo -->

                    <!--  start top-search -->
                    <div id="top-search">
                            <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                            <td><input type="text" value="Search" onBlur="if (this.value=='') { this.value='Search'; }" onFocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
                            <td>
                            <select  class="styledselect">
                                    <option value=""> All</option>
                                    <option value=""> Products</option>
                                    <option value=""> Categories</option>
                                    <option value="">Clients</option>
                                    <option value="">News</option>
                            </select> 
                            </td>
                            <td>
                            <input type="image" src="../images/shared/top_search_btn.gif"  />
                            </td>
                            </tr>
                            </table>
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

                            <ul class="current"><li><a href="#nogo"><b>Caja</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub show">
                                    <ul class="sub">
                                        <li class="sub_show"><a href="../caja/cajaventa.php" onClick="abrir(this.href);return false">Cargar caja</a></li>
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

                            <ul class="select"><li><a href="#nogo"><b>Maestros</b><!--[if IE 7]><!--></a><!--<![endif]-->
                            <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <div class="select_sub">
                                    <ul class="sub">
                                            <li><a href="#nogo">Tipo Producto.</a></li>
                                            <li><a href="#nogo">Clients Details 2</a></li>
                                            <li><a href="#nogo">Clients Details 3</a></li>

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

                            <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
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
                        <h1><?php echo $NombreMenu ?></h1>
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