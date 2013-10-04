<?php

$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
mysql_select_db('gamification');
$results = mysql_query("SELECT uname,level,wongame,besttime FROM users ORDER BY besttime DESC LIMIT 10");
if ($results) {
	$str = "<table id=\"scoreboardTable\" border=\"1\">";
	$str = $str . "<tr><td>User</td><td>Level</td><td>Games Won</td><td>Score</td></tr>";
	while ($row = mysql_fetch_array($results)) {
		$str = $str . "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
	}
	$str = $str . "</table>";
}

mysql_close($link);

?>

<!DOCTYPE html5>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
</head>
<body>
	<?php
		echo($str);
	?>
</body>
</html>