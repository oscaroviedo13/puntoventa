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
    
    
    <style>
		.inferior{
			-moz-border-radius: 50px;
			-webkit-border-radius: 50px;
			border-radius: 50px;
			/*IE 7 AND 8 DO NOT SUPPORT BORDER RADIUS*/
			-moz-box-shadow: 0px 0px 20px #000000;
			-webkit-box-shadow: 0px 0px 20px #000000;
			box-shadow: 0px 0px 20px #000000;
			/*IE 7 AND 8 DO NOT SUPPORT BLUR PROPERTY OF SHADOWS*/
			opacity: 0.53;
			-ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity = 53);
			/*-ms-filter must come before filter*/
			filter: alpha(opacity = 53);
			/*INNER ELEMENTS MUST NOT BREAK THIS ELEMENTS BOUNDARIES*/
			/*All filters must be placed together*/

		}
	
	</style>
    
    
        
    <link href="../css/caja/395758.css" type="text/css" rel="stylesheet" />
</head>    
    <body>
    <div id="wrapper">
        <div id="headerwrap">
        <div id="header">
            <p>This is the Header</p>
        </div>
        </div>
        <div id="navigationwrap">
        <div id="navigation">
            <p>This is the Menu</p>
        </div>
        </div>
        <div id="contentliquid"><div id="contentwrap">
        <div id="content">
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. </p><p>Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. </p><p>Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec, blandit vel, egestas et, augue. Vestibulum tincidunt malesuada tellus. Ut ultrices ultrices enim. Curabitur sit amet mauris. Morbi in dui quis est pulvinar ullamcorper. Nulla facilisi. Integer lacinia sollicitudin massa. Cras metus. Sed aliquet risus a tortor. Integer id quam. </p>
        </div>
        </div></div>
        <div id="rightcolumnwrap">
        <div id="rightcolumn" class="inferior">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.</p>
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