<?php
session_start();
require_once("../config.php");
$date = date("Y-m-d");
$result = mysql_query("select * from item");
?>
<html>
<head>
<title>Mbete TV</title>
<link href="../episodes.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="header"><img src="../logo.png" /><a href="/mbetetv/" class="schedule">Schedule</a><a href="/mbetetv/shows" class="schedule">Shows</a><a href="/mbetetv/clips.php" class="schedule">Clips</a>
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
		<a href="/mbetetv/logout.php" class="schedule">Hello</a></div>
<?php
		
	}
?>

</div>
<div class="right">
<div id="login">
<?php
	echo $_SESSION['username'];
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
	<div id="coming_up_header">Shows</div>
	<div id="episode">
		
<?php
	
	while($row = mysql_fetch_array($result))
	{
		
?>
			<table border="0">
			<tr>
				<td width="70"><img src="/mbetetv/images/<?php echo $row['image'];?>" /></td>
				<td />
				<td />
				<td width="385"><a href="/mbetetv/show.php?<?php echo $row['itemID'];?>" ><?php echo $row['name'];?></a><br /><?php echo $row['info'];?><br /><br /></td>
				<td>
				<?php
if($_SESSION['username'] != "")
{
?>
				<a href="/mbetetv/delete.php?<?php echo $row['itemID']?>" class="delete">delete</a><br /><br /><br />
				<?php
}
?>
				</td>
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

