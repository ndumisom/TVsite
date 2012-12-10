<?php
session_start();
require_once("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$encrypted = md5($password);
	
	$query = mysql_query("select * from staff where username = '$username' AND password = '$encrypted'");
	if(mysql_num_rows($query) == 1)
	{
		session_start();
		$_SESSION['username'] = $username;
		header("Location: /mbetetv");
	}
	else
	{
		$error_msg = "<div id='error_msg'>Wrong Username or Password! </div>";
	}
	
	

}
	

?>

<html>
<head>
<title>Mbete TV</title>
<link href="episodes.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="header"><img src="logo.png" /><a href="/mbetetv" class="schedule">Schedule Today</a><a href="/mbetetv/shows" class="schedule">Shows</a><a href="/mbetetv/info.php" class="schedule">About the site</a></div>

<div class="left">
	<div id="coming_up_header">Login or <a href="/mbetetv/registration.php">Register</a></div>
	<div id="episode">
	<?php 
		echo $error_msg;
	?>
		<form action="/mbetetv/login.php" method="POST">
			<table border="0">
				<tr>
					<td width="10"></td>
					<td width="120">username</td><td><INPUT type="text" name="username"></td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">password</td><td><INPUT type="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						
						
					</td>
					<td />
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><p><INPUT TYPE="submit" name="go" VALUE="Login">
</p></td>
				</tr>
			</table>
		</form>
			<div id="horizontal_line"></div>

		
	<div>

</div>

</body>
</html>

