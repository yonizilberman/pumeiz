<?php 
$result = false;
	if(!empty($_GET)){
		$receiver = $_GET['receiver'];

		$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
		mysql_select_db('gamification');
		$query1 = "SELECT * FROM usermessages WHERE userrceives = '$receiver';";
		$msgs1 = mysql_query($query1) or die('Query failed 0: ' . mysql_error()); 
		$row1 = mysql_fetch_row($msgs1);
		//var_dump($row1);
		$msgid = $row1['nummessagge'];

		$query2 = "SELECT * FROM messages WHERE id = '$msgid';";
		$msgs2 = mysql_query($query2) or die('Query failed 1: ' . mysql_error()); 
		$row2 = mysql_fetch_row($msgs2);
		$result = $row2[1];
		//var_dump($row2);
		//var_dump($result);
	}
echo $result;
?>