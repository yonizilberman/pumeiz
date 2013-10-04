<?php

if(!empty($_GET)){
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
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<style type="text/css">
			#viewport {
				width: 200px; /* viewport width */
				height: 118px; /* viewport heigth */
				overflow: auto; /* scrollbars */
				/*overflow:scroll; /*sidescrollbar*/
				background: white; /* contrast */
				white-space: nowrap; /* image flow not stack */
				/* could use float: left or other approach */
				margin: 0 auto; /* Mozilla page centering */
				text-align: left; /* IE centering fix */
			}
			#viewport img {
				height: 100px; /* max height scaling of images */
				width: 100px;
				border-width: 0; /* remove a link border on images */
			}
		</style>


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
				$("#viewport").append("<img id='badge'"+badges[i]+" class='img' title='"+arr[badges[i]-1]+"' src='Badges/won"+badges[i]+".jpg'/>");
			}

			$('.img')
			.error(function(){
				$(this).remove();
			});
		});
	</script>

	</head>
	<body>
		<div id="viewport">
		</div>
	</body>
</html>
