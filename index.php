<?php
session_start();
require_once("config.php");
$date = date("Y-m-d");
$result = mysql_query("select * from slot where date = '$date'");
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

// display the logged in user's username
	echo "Hello ".$_SESSION['username'];
?>
</div>
<br />
<?php
// if a user has logged in, the link to adding a show is displayed
if($_SESSION['username'] != "")
{
?>
<a href="/mbetetv/addshow.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><strong>Add a show</strong></u></a>
<?php
}
?>
</div>
<div class="left">
	<div id="coming_up_header"> Schedule -  <?php echo date("F d, Y"); ?></div>
	<div id="episode">
		
<?php
	if(mysql_num_rows($result) ==0)
	{
		echo "No episodes today";
	}
	while($row = mysql_fetch_array($result))
	{
		
		$episode = $row['episodeID'];
		$item = mysql_fetch_array(mysql_query("select * from episode where episodeID = '$episode'"));
		$itemID = $item['itemID'];
		$item_data = mysql_fetch_array(mysql_query("select * from item where itemID = '$itemID'"));
		$item_name = $item_data['name'];
		//$itemName = mysql_fetch_row(mysql_query("select * from  item where itemID = '$itemID'"));
		//echo $itemName['name'];
?>
			<table border="0">
			<tr>
				<td><img src="/mbetetv/images/<?php echo $item_data['thumbnail'];?>" /></td>
				<td /><td />
				<td><a href="/mbetetv/show.php?<?php echo $itemID;?>"><?php echo $item_name;?></a><br /><?php echo $item['info'];?><br />Start <?php echo $row['start'];?><br />End : <?php echo $row['end'];?><br /><br />View <a href="/mbetetv/clips.php?<?php echo $episode;?>">clip</a></td>
			</tr>
			</table>
			<div id="horizontal_line"></div>
<?php
}
?>
		
	<div>

</div>

</body>
</html>

