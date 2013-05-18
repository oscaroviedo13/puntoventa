<?php
require ('xajax_core/xajax.inc.php');
$xajax = new xajax();
$xajax->configure('debug', true);
$xajax->configure('javascript URI', '');
$xajax->setCharEncoding('ISO-8859-1');
$xajax->setFlag("decodeUTF8Input",true);
?>