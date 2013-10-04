<?php

if(!empty($_GET) && ($_GET['uname']!="")){
	$username = ''.$_GET['uname'];

	$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
	mysql_select_db('gamification');

	$query = "SELECT uname,fname,lname,besttime,wongame,level,token,badges FROM users WHERE uname='$username'";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$desc = array();
	if($row[7]){
		$result2 = mysql_query('SELECT `description` FROM achievements WHERE `ID` IN (' . $row[7] . ')'); //IN (0,1,2,3)
		while($row2=mysql_fetch_row($result2))
		{
			array_push($desc, $row2[0]);
		}
	}

	mysql_close($link);
}else{
	echo "Please enter with your account.";
	exit();
}

?>
<!DOCTYPE html5>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel='stylesheet' type='text/css'  href='css/general_style.css'>
	<link rel="stylesheet" type="text/css" 	href="css/profile_style.css">
	<script type="text/javascript"			src="js/jquery-latest.min.js"></script>
	<script type="text/javascript">
		//var score = <?= $row[3] ?>;
		//var wongame = <?= $row[4] ?>;
		<?php
			echo 'var badges = new Array(' . $row[7] . ');';
			echo 'var arr = new Array(';
			foreach ($desc as $r) {
				$desc = $desc . ',"' . $r . '"';
			}
			echo (substr($desc, 6)) . ');'; // to cut out userless bits.
		?>

		$(document).ready(function(){
			for (i=1; i<badges.length; i++) {
				$("#viewport").append("<div class='achievementDiv'><img id='badge'"+badges[i]+" class='img' src='Badges/"+badges[i]+".png'/><h3>"+arr[i-1]+"</h3></div>");
				// if (i%4==0) {
				// 	$("#viewport").append("<br/><br/>");
				// };
			}

			$('.img')
			.error(function(){
				$(this).remove();
			});
		});
		

		function goBack(){
  			window.history.back()
  		}
	
	</script>
</head>
<body>
<div id="textsearch">
	<div id="searchcenter">
		<div id="ToolKitStyle" NAME="ToolKitStyle">
			<div id="topArr">
				<div class="part">
					<div><INPUT TYPE="button" class="button1" NAME="button1" id="button1" VALUE="back" onClick="goBack()"></div>
					<div class="gaps1"></div>
					<div><INPUT TYPE="button" class="button1" NAME="button1" id="button1" VALUE="shop" onClick="location.href='shop.html'"></div>
				</div>
				<div class="part">
					<div id="lefttextarr" class="lefttextarr"><p DIR="LTR"><?php echo $row[6]; ?>$</p></div>
					<div class="gaps1"></div>
					<div><INPUT TYPE="button" NAME="gallery" class="bottomBi" VALUE="gallery" onClick=<?php echo "\"location.href='gallery.php?uname=".$username."'\""; ?>></div>
				</div>
				<div class="part">
					<div id="righttextarr" class="righttextarr"><p DIR="LTR"><?php echo $row[1],'  ',$row[2]; ?></p></div>
					<div class="gaps1"></div>
					<div><INPUT TYPE="button" NAME="board" class="bottomBi" VALUE="board" onClick=<?php echo "\"location.href='board.php?uname=".$username."'\""; ?>></div>
				</div>
				<div class="part">
					<div id="photo"></div>
					<div id="level"><p DIR="LTR"><div id="levelp"></div><div id="levelp"><?php echo $row[5]; ?></div></p></div>
				</div>
			</div>
			<center>
				<div id="viewport" class="Achievements">
				</div>
			</center>
			
		</div>
	</div>
</div>
</body>
</html>
