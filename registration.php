<?php
session_start();
require_once("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	
	if(trim($username) != "" && trim($password) != "" && trim($confirm_password) != "")
	{
	$check_username = mysql_query("select * from staff where username = '$username'");
	if(mysql_num_rows($check_username) == 0 && $password == $confirm_password)
	{	
		$encrypted = md5($password);
		mysql_query("insert into staff (username,password) values('$username','$encrypted')");
		header("Location: /mbetetv/success.php");
	}
	else
	{
		if(mysql_num_rows($check_username) !=0)
			$error_msg = "Username already exists";
		else
		{
			$error_msg = "Passwords Do Not Match!!!";
		}
	}
	
	$query = mysql_query("insert into item (name,info) values('$name','$info')");
	
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


<div class="header"><img src="logo.png" /><a href="/mbetetv" class="schedule">Schedule</a><a href="/mbetetv/shows" class="schedule">Shows</a><a href="/mbetetv/clips.php" class="schedule">Clips</a>

</div>

<div class="left">
	<div id="coming_up_header">Register Below</div>
	<div id="episode">
	<?php
		echo $empty_fields;
		echo $error_msg;
	?>
		<form action="/mbetetv/registration.php" enctype="multipart/form-data" method="POST">
			<table border="0">
				<tr>
					<td width="10"></td>
					<td width="120">Username</td><td><INPUT type="text" name="username"></td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">Password</td><td><INPUT type="password" name="password"></td>
				</tr>
				<tr>
					<td width="10"></td>
					<td width="120">Confirm Password</td><td><INPUT type="password" name="confirm_password"></td>
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
					<td><p><INPUT TYPE="submit" name="go" VALUE="Register">
</p></td>
				</tr>
			</table>
		</form>
			<div id="horizontal_line"></div>

		
	<div>

</div>

</body>
</html>

