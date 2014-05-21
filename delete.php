<?php
require_once("config.php");
$itemID = $_SERVER['QUERY_STRING'];

mysql_query("delete from item where itemID ='".mysql_real_escape_string($itemID)."'");
header("Location:/mbetetv/shows/");
?>
