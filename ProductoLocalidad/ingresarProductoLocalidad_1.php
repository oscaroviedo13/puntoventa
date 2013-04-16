<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Internet Dreams</title>
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
    <script src="../js/Validador.js" type="text/javascript"></script>
    
    <script>
    function selectInCombo(combo,text)
    {
        var dato = document.getElementById(text).value;
//        document.getElementById(combo).selectedIndex = dato;
        
        for(var indice=0 ;indice<document.getElementById(combo).length;indice++)
        {
            if (document.getElementById(combo).options[indice].text == dato )
                document.getElementById(combo).selectedIndex =indice;
        }
    }
    
    
    
   </script>
</head>
    <body>
        <?php 
            include ('../conexion.php');
            session_start();
            $varNombreComunaSe=$_SESSION['miSession']['nombre_comuna'];
            $varNombreLocalidadSe=$_SESSION['miSession']['nombre_localidad'];
            
            if (isset($_POST['cmbComuna'])){
                $criterioComunaArray=$_POST['cmbComuna'];

                for ($index = 0; $index < count($criterioComunaArray); $index++) {
                    $varNombreComunaSe = $criterioComunaArray[$index];
                }
            }
            
            
        ?>
    
    <table width="200" border="1" align="center" cellpadding="2" cellspacing="4">
      <tr>
          <td height="25" colspan="3"><label><?php echo "Comuna seleccionada: ".$varNombreComunaSe;?></label></td>
        <td></td>
      </tr>
      <tr>
        <td>Comuna</td>
        <td colspan="2"><form id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <p>
            <select onchange="this.form.submit();" class="styledselect" name="cmbComuna[]" id="cmbComuna">
                <?php 
                    $consulta=mysql_query("select id_comuna, nombre_comuna from comuna",$conexion);

                    while($filas= mysql_fetch_array($consulta)) {	
                        $varId_comuna=$filas['id_comuna'];
                        $varNombre_comuna=$filas['nombre_comuna'];
                ?>
                        <option value="<?php echo $varNombre_comuna ?>"><?php echo $varNombre_comuna ?></option>
                <?php 
                    }
                ?>
            </select>
             <input type="hidden" id="desc_comuna" class="inp-form" value="<?php echo $varNombreComunaSe ?>"/>
             <script>selectInCombo('cmbComuna','desc_comuna')</script>
                      
          </p>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Localidad</td>
        <td colspan="2"><form id="form2" method="post" action="">
          <p>
            <select name="cmbLocalidad" class="styledselect" id="cmbLocalidad">
                <?php 
                    $consulta=mysql_query("select id_localidad, nombre_localidad from view_informacion_localidad WHERE nombre_comuna LIKE '%$varNombreComunaSe%' order by nombre_localidad",$conexion);

                    while($filas= mysql_fetch_array($consulta)) {	
                        $varId_localidad=$filas['id_localidad'];
                        $varNombre_localidad=$filas['nombre_localidad'];
                ?>
                        <option value="<?php echo $varId_localidad ?>"><?php echo $varNombre_localidad ?></option>
                <?php 
                    }
                ?>
            </select>
              <input type="hidden" id="desc_localidad" class="inp-form" value="<?php echo $varNombreLocalidadSe ?>"/>
             <script>selectInCombo('cmbLocalidad','desc_localidad')</script>
          </p>
        </form></td>
        <td>&nbsp;</td>
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
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
        
    </body>
</html>