<?php
session_start();
require_once("config.php");
$showID = $_SERVER['QUERY_STRING'];
$date = date("F d, Y");
$query = mysql_fetch_array(mysql_query("select * from item where itemID = '$showID'"));

function UploadOne($fname)
{
$uploaddir = 'videos/';
if (is_uploaded_file($fname['tmp_name']))
{
$filname = basename($fname['name']);
$uploadfile = $uploaddir . basename($fname['name']);
if (move_uploaded_file ($fname['tmp_name'], $uploadfile))
$res = "File " . $filname . " was successfully uploaded and stored.<br>";
else
$res = "Could not move ".$fname['tmp_name']." to ".$uploadfile."<br>";
}
else
$res = "File ".$fname['name']." failed to upload.";
return ($res);
}


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$episodeInfo = $_POST['episode_info'];
	$startTime = $_POST['start_time'];
	$endTime = $_POST['end_time'];
	$date = $_POST['date'];
	
	$res = UploadOne($_FILES['video']);
	$filname = $_FILES['video']['name'];
	echo ($res);
	
	
	if(trim($episodeInfo) != "" && trim($startTime) !="" && trim($endTime)  !="" && trim($date) != "")
	{
		mysql_query("insert into episode (info,itemID) values('$episodeInfo','$showID')");
		$episodeData  = mysql_fetch_array(mysql_query("select * from episode where info = '$episodeInfo'"));
		$episodeID = $episodeData['episodeID'];
		mysql_query("insert into slot (date,start,end,episodeID) values('$date','$startTime','$endTime','$episodeID')");
		mysql_query("insert into clip (URL,episodeID) values('$filname','$episodeID')");
	}
	else
	{
		$empty_fileds = "<div id='error_msg'>All fields are mandatory</div>";
	}
}
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
	<div id="coming_up_header">Add an episode for <?php echo $query['name'];?></div>
	<div id="episode">
	<?php
		echo $empty_fileds;
	?>
		<form action="/mbetetv/addepisode.php?<?php echo $showID;?>" enctype="multipart/form-data" method="POST">
			<table border="0">
				<tr>
					<td width="10"></td>
					<td width="120">Episode info</td><td><INPUT type="text" name="episode_info"></td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">Start time</td><td><INPUT type="text" name="start_time">(hh:mm)</td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">End time</td><td><INPUT type="text" name="end_time">(hh:mm)</td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">Date</td><td><INPUT type="text" name="date">(yyyy-mm-dd)</td>
				</tr>
				<tr>
					<td></td>
					<td>
					</td>
					<td>
						<input type="file" name="video" />
					</td>
					<td />
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><p><INPUT TYPE="submit" name="go" VALUE="Done">
</p></td>
				</tr>
			</table>
		</form>
			<div id="horizontal_line"></div>

		
	<div>

</div>

</body>
</html>

