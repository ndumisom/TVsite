<?php
session_start();
require_once("config.php");
$showID = $_SERVER['QUERY_STRING'];
$result = mysql_fetch_array(mysql_query("select * from item where itemID = '$showID'"));

$result2 = mysql_query("select * from episode where itemID = '$showID'");



?>
<html>
<head>
<title>Mbete TV</title>
<link href="episodes.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="header"><img src="logo.png" /><a href="/mbetetv" class="schedule">Schedule</a><a href="/mbetetv/shows" class="schedule">Shows</a><a href="/mbetetv/clips.php" class="schedule">Clips</a>
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
	<div id="coming_up_header"><?php echo $result['name'];?></div>
	<div id="episode">
		
<?php

?>
			<table border="0">
			<tr>
				<td /><img src="images/<?php echo $result['thumbnail'];?>">
				<td /><?php echo $result['name']."<br />";?>
				<?php echo $result['info'];?><br /><br /><br /><br />
				<?php 
					if($_SESSION['username'] == "")
					{
				?>
					<i><a href="/mbetetv/login.php" >Login to add episodes</a></i>
				<?php
					}
					else
					{
					?>
						<a href="/mbetetv/addepisode.php?<?php echo $showID;?>">Add episode</a>
					<?php
					}
				?>
			</tr>
			</table>
			<div id="horizontal_line"></div>
			Episodes<br /><br />
			<?php
				if(mysql_num_rows($result2) ==0)
				{
					echo "No episodes coming up, try later!!";
				}
				while($query = mysql_fetch_array($result2))
				{
					$episodeID = $query['episodeID'];
					$slot_data = mysql_fetch_array(mysql_query("select * from slot where episodeID = '$episodeID'"));
					echo $slot_data['date']." - <span class='time'>".$slot_data['start']."</span> to <span class='time'>".$slot_data['end']."</span><a href='/mbetetv/clips.php?$episodeID' title='click here to view video clip' ><u> ".$query['info']."</u></a><br />";
					echo "<div id='horizontal_line'></div>";
					
				}
					
			
			?>

		
	<div>

</div>

</body>
</html>

