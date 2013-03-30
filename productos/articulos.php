<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <!--[if IE]>
    <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
    <![endif]-->

    <!--  jquery core -->
    <script src="../js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

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
    <script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
            $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
    });
    </script>


    <![endif]>

    <!--  styled select box script version 2 --> 
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
            $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
            $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
    });
    </script>

    <!--  styled select box script version 3 --> 
    <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
            $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
    });
    </script>

    <!--  styled file upload script --> 
    <script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
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
    <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

    <!-- Tooltips -->
    <script src="../js/jquery/jquery.tooltip.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
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
    <link rel="stylesheet" href="css/datePicker.css" type="text/css" />
    <script src="js/jquery/date.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
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
    <script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $(document).pngFix( );
    });
    </script>
</head>
    
  
<body> 
<?php include ('../conexion.php');?>



<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Id</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nombre</a></th>
					<th class="table-header-repeat line-left"><a href="">Descripcion</a></th>
					<th class="table-header-repeat line-left"><a href="">Precio</a></th>
					<th class="table-header-repeat line-left"><a href="">Stock</a></th>
					<th class="table-header-repeat line-left"><a href="">Fecha</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
                                <?php 
                                    $consulta=mysql_query("select * from productos order by nombre");
                                    if (isset($_POST['buscar'])){
                                            $consulta=mysql_query("select1 * from productos where nombre like '%".$_POST['buscar']."%'");
                                    }
                                        
                                    $nro_reg=mysql_num_rows($consulta);

                                    if ($nro_reg==0){
                                            echo 'no se han encontrado productos para mostrar';
                                    }

                                    $reg_por_pagina=7;
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
                                    
                                    $consulta=mysql_query("select * from productos order by nombre limit  $inicio,$reg_por_pagina",$conexion);
                                    $can_paginas=ceil($nro_reg/$reg_por_pagina);

                                    while($filas=mysql_fetch_array($consulta)){
                                            $id=$filas['id'];
                                            $nombre=$filas['nombre'];
                                            $desc=$filas['descripcion'];
                                            $precio=$filas['precio'];
                                            $enStock=$filas['cuanto_hay'];
                                            $fecha=$filas['fecha'];


                                ?>
                                <tr>
					<td><?php echo $id ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $desc ?></td>
					<td><?php echo $precio ?></td>
					<td><?php echo $enStock ?></td>
					<td><?php echo $fecha ?></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
				<?php }?>	
                                    
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>

                            <div id ="paginador" align="center">
                            <?php 

                                    if($nro_pagina>1)
                                            echo "<a href='articulos.php?num=".($nro_pagina-1)."'>Anterior</a> ";

                                    for ($i=1;$i<=$can_paginas;$i++){
                                            if ($i==$nro_pagina)
                                                    echo "<span>$i </span> ";
                                                    //echo $i."  ";
                                            else
                                            echo "<a href='articulos.php?num=$i'>$i</a> ";

                                    }
                                    if($nro_pagina<$can_paginas)
                                            echo "<a href='articulos.php?num=".($nro_pagina+1)."'>Siguiente</a> ";
                            ?>
                            </div>
			</td>			
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>


</body>
</html>