<?php
include("adodb5/adodb.inc.php");
$db = NewADOConnection('mysql');
$db->Connect("localhost", "root", "", "tienda");
//$db->debug = true;
?>
