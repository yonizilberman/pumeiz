<?php

if(!empty($_GET)){
	$username = ''.$_GET['uname'];//
	$pic = ''.$_GET['pic'];
	$str = "";

	$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
	mysql_select_db('gamification');
	$scores = mysql_query("SELECT besttime FROM users WHERE uname='$username'");
	$score = mysql_fetch_row($scores);

	$query = "
	SELECT n.*, ABS( besttime-".$score[0]." ) AS distance FROM (
		(
			SELECT uname,level,wongame,besttime FROM `users` WHERE besttime>=".$score[0]."
			ORDER BY besttime LIMIT 3
		) UNION ALL (
			SELECT uname,level,wongame,besttime FROM `users` WHERE besttime<".$score[0]."
			ORDER BY besttime DESC LIMIT 2
		)
	) AS n
	WHERE wongame>0 ORDER BY besttime LIMIT 5";
	$results = mysql_query($query);
	if ($results) {
		$str = "<table class=\"scoreboardTable\"  id=\"scoreboardTable\" border=\"1\">";
		$str = $str . "<tr><td>User</td><td>Best Time</td></tr>";
		while ($row = mysql_fetch_array($results)) {
		$timestr = "";
		$min = 0;
		$sec = $row[3]%60;
		if ($sec<10) {
			$sec = "0".$sec;
		}
		if ($row[3] > 60) {
			$min = floor($row[3]/60);
		}
		$str = $str . "<tr><td>".$row[0]."</td><td>".$min.":".$sec."</td></tr>";
	}
		$str = $str . "</table>";
	}

	mysql_close($link);
}else{
	echo "Please enter with your account.";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel='stylesheet' type='text/css'  href='css/general_style.css'>
	<link rel="stylesheet" type="text/css" 	href="css/thegame_style.css">
	<link rel="stylesheet" type="text/css"  href="css/scoreboard_style.css">

	<!--******-->
	<script type="text/javascript" src="js/jquery-collision-1.0.1.js"></script>    <!-- var list = $("#selector").collision(".obstacle");-->
	<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="js/clock.js"></script>
    <script type="text/javascript" src="js/AudioStream.js"></script>
	<script type="text/javascript" src="js/puzzle.js"></script>
	<script type="text/javascript" src="js/thegame_javascript.js"></script>


</head>
<body onload="stopwatch('Start');">
<div id="textsearch">
	<div id="searchcenter">
		<div id="ToolKitStyle" NAME="ToolKitStyle">
			<div id="tmp">
					<div><INPUT TYPE="button" class="button1" NAME="button1" id="button1" VALUE="back"       
                                                    onClick=<?php echo "\"location.href='levels.php?uname=".$username."'\"'"; ?>></div>



					<div><INPUT TYPE="button" class="hint" NAME="hint" id="hint" VALUE="hint" onClick=""></div>
					<div><INPUT TYPE="button" class="sound1" NAME="sound1" id="sound1" VALUE="sound" 
                                                    onClick="audioControls();">
                                        </div>
					<div id="bigtmp"> <!--time div-->
						<table bgcolor="BLACK" align="center" border="0" width="200" cellspacing="0">
 						 <tr>
  						    <form name="clock" id="clock">
					     	        <input type="text" size="12" name="stwa" value="00 : 00 : 00" 
                                                        style="text-align:center; background-color:black;color :green; font-size:32px;"
                                                        bgcolor="BLACK"/><br />

      						     	<input type="hidden" name="theButton" onClick="stopwatch('Stop');" value="Stop" />
                                                        <input type="hidden" value="Reset" onClick="resetIt();reset();" /><br />
                                                      </form>
  						</tr>
						</table>
                                        </div>
					<div id="gg">
						<!--******-->
						<div id="PuzzleGirl">
							<div class="puzzle">
								<img id="PuzzlePic" src="<?php echo $pic; ?>" alt="Puzzle Girl" />	
							</div>
						</div>
						<!--******-->
					<div id="ttttt" name="ttttt" class="ttttt">
						<?php
							echo($str);
						?>
					</div>
					</div>
			</div>
		</div>
	</div>
</div>
 </body>
</html>
