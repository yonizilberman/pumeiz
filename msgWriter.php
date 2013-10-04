<?php 
$result = false;
	if(!empty($_GET)){
		$sender = $_GET['sender'];
		$receiver = $_GET['receiver'];
		$msgid = $_GET['msgid'];

		$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
		mysql_select_db('gamification');
		$query = "INSERT INTO usermessages (usersender, userrceives, nummessagge) values ('$sender','$receiver','$msgid');";
		mysql_query($query) or die('Query failed 1: ' . mysql_error()); 
		$result = true;
	}
echo $result;
?>