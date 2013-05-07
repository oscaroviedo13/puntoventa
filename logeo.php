<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="Swf.ico" type="image/x-icon" rel="shortcut icon" />
    <title>Punto de venta.</title>


    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href="css/smoke.css" type="text/css" media="screen" />
    <script src="js/smoke/smoke.min.js" type="text/javascript"></script>
    <link id="theme" rel="stylesheet" href="css/themes/dark.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='//cdn.zopim.com/?190bir6INMNTWbmrwTGUuPc88imSHbVW';z.t=+new Date;$.
        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
    </script>

    
    
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
        <div id="backfond">
	
	<!--  start login-inner -->
	<div id="login-inner">
                    
                    <form id="form1" name="form1" method="post" action="usuarios/login.php">
                    <p>
                      <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                                <td>
                                    <label style="font-family: 'Righteous', cursive;" for="user">Usuario:</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Escriba nombre de usuario" required name="user" value="osjavis" id="user" class="login-inp"/>
                                </td>
                        </tr>
                            <tr>
                                <td>
                                    <label style="font-family: 'Righteous', cursive;" for="pass">Contraseña:</label>
                                </td>
                                <td>
                                    <input type="password" placeholder="Escriba nombre de usuario" required name="pass" value="1234" id="pass" class="login-inp" />
                                </td>
                            </tr>
                            <tr>
                                <td><img src="images/icons/cart_icon.png" alt="" width="48" height="48" />								</td>
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
	<a href="" class="forgot-pwd">¿Olvido su contraseña?</a>
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