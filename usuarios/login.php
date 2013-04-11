<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="../css/smoke.css" type="text/css" media="screen" /> 
        <script src="../js/smoke/smoke.min.js" type="text/javascript"></script>	
	<link id="theme" rel="stylesheet" href="../css/smoke/themes/dark.css" type="text/css" media="screen" />
    </head>
    <body>
        <?php 
            include ('../conexion.php');
            $usuarioIng=$_POST['user'];
            $passIng=$_POST['pass'];
            
            $consultaMD5=mysql_query("SELECT md5('$passIng') as clavemd5");
            
            while($filasMD5=mysql_fetch_array($consultaMD5)){
                $passIng = $filasMD5['clavemd5'];                
            }
            
            
            
            session_start();
            $consultaGeneral=mysql_query("select * from view_inicio_sesion");
            
            //MD5
            
            $puerta='continuar';	
            while($filas=mysql_fetch_array($consultaGeneral)and $puerta='continuar'){

                $id=$filas['id'];
                $nombre=$filas['nombre'];
                $usuario=$filas['login'];
                $pass=$filas['pwd'];
                $id_localidad=$filas['id_localidad'];
                $nombre_localidad=$filas['nombre_localidad'];
                $id_comuna=$filas['id_comuna'];
                $nombre_comuna=$filas['nombre_comuna'];
                $fecha=$filas['fecha_creacion_usuario'];
                $fecha=$filas['fecha_creacion_contrasena'];


                if (isset($usuarioIng)and isset($passIng)){
//                    echo $pass.'-'.$passIng;
                    if ($usuario==$usuarioIng and $passIng == $pass){
                        
                        $miSession=array('id'=>$id,
                                        'nombre'=>$nombre,
                                        'usuario'=>$usuario,
                                        'pass'=>$pass,
                                        'fecha'=>$fecha,
                                        'id_comuna'=>$id_comuna,
                                        'nombre_comuna'=>$nombre_comuna,
                                        'nombre_localidad'=>$nombre_localidad,
                                        'id_localidad'=>$id_localidad);
                        //ir a la pagina restringida
                        $_SESSION['miSession']=$miSession;
                        $_SESSION['contadorSession']=1;
                        ?>
                        <html>
                            <head>
                                <script>
                                    javascript:smoke.signal('Procesando peticion...');
                                </script>
                                <meta http-equiv="refresh" content="3; url= ../plantilla/general.php">   
                            </head>
                        </html>
                <?php
                        $puerta='salir';
                        exit; 
                    }else{
                        $resutado='no';				
                    }
                }
            }

            if ($resutado=='no'){
//                echo 'su usuario o contraseÃ±a no se encontraron.';
                        ?>
                <html>
                    <head>
                        <meta http-equiv="refresh" content="3; url= ../logeo.php">   
                        <script>
                        javascript:smoke.alert('Contraseña o usuario incorrecto. ');
                        </script>
                        
                    </head>
                    </html>
            <?php

            }
        ?>
    </body>
</html>

