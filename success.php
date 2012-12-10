<?php
session_start();
require_once("config.php");


	

?>

<html>
<head>
<title>Mbete TV</title>
<link href="episodes.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="header"><img src="logo.png" /><a href="/mbetetv" class="schedule">Schedule</a><a href="/mbetetv/shows" class="schedule">Shows</a><a href="/" class="schedule">Clips</a>

</div>

<div class="left">
	<div id="coming_up_header">Success.</div>
	<div id="episode">
	
		<form action="/mbetetv/registration.php" enctype="multipart/form-data" method="POST">
			<table border="0">
				<tr>
					<td width="10"></td>
					<td width="120"><div id="success">Registration Successful<br />Click <a href="/mbetetv">here</a> to go to the homepage OR <a href="/mbetetv/login.php">here</a> to login</div></td>
				</tr>
				
			</table>
		</form>
			<div id="horizontal_line"></div>

		
	<div>

</div>

</body>
</html>

