<?php
session_start();
require_once("config.php");

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

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	
	$name = $_POST['show_name'];
	$info = $_POST['show_info'];
	
	$res = UploadOne($_FILES['picture']);
	$filname = $_FILES['picture']['name'];
	echo ($res);

	if(trim($name) != "" && trim($info) != "")
	{
	$query = mysql_query("insert into item (name,info,thumbnail) values('$name','$info','$filname')");
	}
	else
	{
		$empty_fields = "<div id='error_msg'>All fields are mandatory</div>";
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
<a href="/mbetetv/addshow.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><strong>Add a show<strong></u></a>
</div>
<div class="left">
	<div id="coming_up_header">Add Show</div>
	<div id="episode">
	<?php
		echo $empty_fields;
	?>
		<form action="/mbetetv/addshow.php"  method="POST">
			<table border="1">
				<tr>
					<td width="10"></td>
					<td width="120">Show name</td><td><INPUT type="text" name="show_name"></td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">Show info</td><td><INPUT type="text" name="show_info"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td /><input type="file" name="picture" />
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

