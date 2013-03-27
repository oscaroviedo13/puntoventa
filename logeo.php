<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Punto de venta.</title>

<!--    <style type="text/css">

            div{
        border:0px solid black;
            padding: 5px 20px;
            background: #FFFFCC;
            width: 150px;
            height: 160px;
            border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            box-shadow:5px 2px 30px #888888;/*sombra*/
            -webkit-box-shadow:5px 2px 30px #888888;
            -moz-box-shadow:5px 2px 30px #888888;
            word-wrap:break-word; /*corta palabras*/

    }
    </style>-->

    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" />


    </head>

    
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login" width="156" height="40">
<!--		<a href="index.php"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
                    
                    <form id="form1" name="form1" method="post" action="usuarios/login.php">
                    <p>
                      <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                                <td>
                                    <label for="user">Usuario:</label>
                                </td>
                                <td>
                                    <input type="text" name="user" value="osjavis" id="user" class="login-inp"/>
                                </td>
                        </tr>
                            <tr>
                                <td>
                                    <label for="pass">Contraseña:</label>
                                </td>
                                <td>
                                    <input type="password" name="pass" value="12345" id="pass" class="login-inp" />
                                </td>
                            </tr>
                            <tr>
								<td>
								
								</td>
                                <td align="right">
<!--                                <p><input type="submit" name="button" id="button" value="Entrar" class="submit-login"/></p>-->
                                <p><input class="boton negro redondo" name="button" type="submit" value="Ingresar"></p>
                              </td>
                            </tr>
                      </table>
                    </p>
                    </form>
                
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">¿Desea renovar su contraseña?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>