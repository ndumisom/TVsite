<?php 
require_once("config.php");
$episodeID = $_SERVER['QUERY_STRING'];
$query = mysql_fetch_array(mysql_query("select * from clip where episodeID = '$episodeID'"));

?>
<html>
<head>
<title>Mbete TV</title>
<link href="episodes.css" rel="stylesheet" type="text/css" />
</head>
<body>



<div class="header"><img src="logo.png" /><a href="/mbetetv" class="schedule">Schedule Today</a><a href="/mbetetv/shows" class="schedule">Shows</a><a href="/mbetetv/info.php" class="schedule">About the site</a>
<?php
	if($_SESSION['username'] =="")
	{
?>
<a href="/mbetetv/login.php" class="schedule">Login</a></div>
<?php
	}
	else
	{
?>
		<a href="/mbetetv/logout.php" class="schedule">Logout</a></div>
<?php
	}
?>
</div>
<div class="right">
<div id="login">
<?php
	echo"Hello :".$_SESSION['username'];
?>
</div>
<br />
<?php
if($_SESSION['username'] != "")
{
?>
<a href="/mbetetv/addshow.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><strong>Add a show<strong></u></a>
<?php
}
?>
</div>
<div class="left">
	<div id="coming_up_header">Clips</div>
	<div id="episode">
	
		<embed src="http://localhost/mbetetv/videos/<?php echo $query['URL'];?>" height="180"
 autostart="true" />

		
	<div>

</div>

</body>
</html>

