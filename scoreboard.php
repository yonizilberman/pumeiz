<?php

if(!empty($_GET)){
	$username = ''.$_GET['uname'];//
	$str = "";

	$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
	mysql_select_db('gamification');
	$scores = mysql_query("SELECT besttime FROM users WHERE uname='$username'");
	$score = mysql_fetch_row($scores);

	$query = "
	SELECT n.*, ABS( besttime-".$score[0]." ) AS distance FROM (
		(
			SELECT uname,level,wongame,besttime FROM `users` WHERE besttime>=".$score[0]."
			ORDER BY besttime LIMIT 2
		) UNION ALL (
			SELECT uname,level,wongame,besttime FROM `users` WHERE besttime<".$score[0]."
			ORDER BY besttime DESC LIMIT 1
		)
	) AS n
	ORDER BY besttime LIMIT 3";
	$results = mysql_query($query);
	if ($results) {
		$str = "<table border=\"1\">";
		while ($row = mysql_fetch_array($results)) {
			$str = $str . "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		}
		$str = $str . "</table>";
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
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-latest.min.js" type="text/javascript"></script>
</head>
<body>
	<?php
		echo($str);
	?>
</body>
</html>