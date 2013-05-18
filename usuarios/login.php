<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="../css/smoke.css" type="text/css" media="screen" /> 
        <script src="../js/smoke/smoke.min.js" type="text/javascript"></script>	
	<link id="theme" rel="stylesheet" href="../css/themes/dark.css" type="text/css" media="screen" />
    </head>
    <body>
        <?php 
            include ('../conecta.php');
            include ('../funciones.php');
            
            $usuarioIng=$_POST['user'];
            $passIng=$_POST['pass'];
            $localidad_designada_proArray=$_POST['cmbLocalidad'];
            
            for ($index = 0; $index < count($localidad_designada_proArray); $index++) {
                $localidad_designada = $localidad_designada_proArray[$index];
            }
            
            $consultaMD5 = "SELECT md5('$passIng') as clavemd5";
            $rs=$db->Execute($consultaMD5);
    
            if($rs->Recordcount() > 0){
                for($i=0;$i<$rs->Recordcount();$i++){        
                    $passIng = $rs->fields[0];
                }
            }
            
            session_start();
            $consultaGeneral="select * from view_inicio_sesion";
            $rs=$db->Execute($consultaGeneral);
    
            //MD5
            
            $puerta='continuar';
            
            for($i=0;$i<$rs->Recordcount();$i++){        
                
                if($puerta == 'continuar'){
                    $id=$rs->fields[0];
                    $cedulaID=$rs->fields[1];
                    $apellido=$rs->fields[2];
                    $nombre=$rs->fields[3];
                    $usuario=$rs->fields[9];
                    $pass=$rs->fields[10];
                    $id_localidad=$rs->fields[5];
                    $nombre_localidad=$rs->fields[6];
                    $id_comuna=$rs->fields[7];
                    $nombre_comuna=$rs->fields[8];
                    $fecha=$rs->fields[11];
                    $descripcion_perfil = $rs->fields[13];
                    $id_perfil = $rs->fields[14];

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
                                            'id_localidad'=>$id_localidad,
                                            'apellido'=>$apellido,
                                            'cedula'=>$cedulaID,
                                            'descripcion_perfil'=>$descripcion_perfil, 
                                            'localidad_designada'=>$localidad_designada,
                                            'id_perfil'=>$id_perfil
                                );
                            //ir a la pagina restringida
                            $_SESSION['miSession']=$miSession;
                            $_SESSION['contadorSession']=1;
                            ?>
                            <html>
                                <head>
                                    <script>
                                        javascript:smoke.signal('Procesando peticion de <?php echo $usuario; ?> para (<?php echo $localidad_designada; ?>)');
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
                $rs->Movenext();
            }
            $db->close();

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

