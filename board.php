<?php

$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
mysql_select_db('gamification');
$results = mysql_query("SELECT uname,level,wongame,besttime FROM users WHERE wongame>0 ORDER BY besttime LIMIT 10");
if ($results) {
	$i = -1;
	$str = "<table id=\"scoreboardTable\" class=\"scoreboardTable\" border=\"1\">";
	$str = $str . "<tr><td>User</td><td>Level</td><td>Games Won</td><td>Score</td></tr>";
	while ($row = mysql_fetch_array($results)) {
		$i = $i+1;
		$timestr = "";
		$min = 0;
		$sec = $row[3]%60;
		if ($sec<10) {
			$sec = "0".$sec;
		}
		if ($row[3] > 60) {
			$min = floor($row[3]/60);
		}
		$str = $str . "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$min.":".$sec."</td></tr>";
// 		$str = $str . "<tr><td>
// <INPUT TYPE=\"button\" class=\"buttons\" NAME=\"buttons\" id=\"user".$i."\" VALUE=".$row[0].">
// 					</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$min.":".$sec."</td></tr>";
}
	$str = $str . "</table>";
}

mysql_close($link);

?>
<!DOCTYPE html5>
<html5>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel='stylesheet' type='text/css' 	href='css/general_style.css'>
	<link rel="stylesheet" type="text/css" 	href="css/board_style.css">
	<link rel="stylesheet" type="text/css" 	href="css/scoreboard_style.css">
	<script type="text/javascript" 			src="js/board_javascript.js"></script>
	<script type="text/javascript" 			src="js/jquery-latest.min.js"></script>
	<script type="text/javascript" 			src="js/main_javascript.js"></script>
// 	<script type="text/javascript">
// 		$(document).ready(function(){
// $.urlParam = function(name){
//   var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(top.window.location.href); 
//   return (results !== null) ? results[1] : 0;
// }

// 			$("#logindiv").hide();
// 			fadeFlag = 0;

// 			$("#login").click(function () {
// 				$("#searchcenter").fadeTo("fast", 0.5, function () {
// 					$("#logindiv").fadeTo("fast", 0.88);
// 					fadeFlag = 1;
// 				});
// 			});

// 			$(".buttons").click(function () {
// 				$.ajax({
// 					type: "GET",
// 					url: "msgWriter.php",
// 					data: { 
// 						sender: $.urlParam('uname'),
// 						receiver: $(this).val(), 
// 						msgid: 0
// 					},
// 					success: function (response) {
// 						if (response) {
// 							alert("message sent.");
// 						}else{

// 						}
// 					},
// 					error: function (response) {
// 						alert(response);
// 					}
// 				});
// 				// $(this).
// 			});

// 			$("#searchcenter").click(function () {
// 				if (fadeFlag == 1) {
// 					$("#searchcenter").fadeTo("fast", 1, function () {
// 						$("#logindiv").fadeOut("fast");
// 						fadeFlag = 0;
// 					});
// 				};
// 			});

// 			$.ajax({
// 				type: "GET",
// 				url: "msgReader.php",
// 				data: { 
// 					receiver: $.urlParam('uname')
// 				},
// 				success: function (response) {
// 					if (response) {
// 						alert("message receieved: " + response);
// 					}else{

// 					}
// 				},
// 				error: function (response) {
					
// 				}
// 			});
// 		});
// 	</script>
</head>
<body>
	<div id="textsearch">
		<div id="searchcenter">
			<div id="ToolKitStyle" NAME="ToolKitStyle">
				<div id="tmp">
						<div><INPUT TYPE="button" class="button1" NAME="button1" id="button1" VALUE="back" onclick="goBack()"></div>
					<div id="center" name="center" class="center">
						<center>
							<?php
								echo($str);
							?>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--  the  login  popup   -->
	<div id="overlay">
		<div id="logindiv" class="overlay">
			<form action="index.php" method="GET">
				
			</form>
		</div>
	</div>
 </body>
</html5>
