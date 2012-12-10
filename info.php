<?php 
session_start();
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
<div class="left">

<div id="coming_up_header">Mbete Ndumiso <img  src="http://localhost/images/theoffice.png"alt="My sad moments"width="80" height="50"/></div>
<p>The owner of this site was born and bred from remote rural areas of Idutywa.<br/>He did his foundation studies at his family,he went on to do his junior studies at Ntsimba jss in Engcobo.<br/>
<div id="horizontal_line"></div>The guy went on to do his high school studies at Mazizini sss in Idutywa specialing in maths and physical sciences.<br/> He matriculated on 2006 and went on to do his tertiary studies at Walter Sisulu University.<br/>This guy had to choose with sorber minds the best degree he wants to do.<br/><div id="horizontal_line"></div>He had three degrees in minds Bcom accounting,Medicine and Computer Sciences.<br/>It was not an easy decision for him to make but weighing up these degrees he chosen computer science.<br/><div id="horizontal_line"></div>He finished his degree on 2010,now he is still trying to further his  studies on computer science,currently he is doing honours degree in computer science </p>
</div>
<div class="right">
<div id="login"><?php echo"Hello :".$_SESSION['username'];?></div>
</div>
</body>
</html>


