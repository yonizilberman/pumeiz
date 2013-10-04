<?php

$str = "<INPUT TYPE=\"button\" NAME=\"login\" id=\"login\" VALUE=\"Login\" onClick=\"setVisible(1)\"/>
		<INPUT TYPE=\"button\" NAME=\"signup\" id=\"signup\" VALUE=\"Sign Up\" onClick=\"setVisible(2)\"/>";
$logout = "<div><INPUT TYPE=\"button\" NAME=\"logout\" id=\"logout\" VALUE=\"logout\" onClick=\"location.href='index.php'\"></div>";

if(!empty($_GET)){
	$username = $_GET['uname'];
	$firstname = ''.$_GET['fname'];
	$lastname = ''.$_GET['lname'];
	$password = ''.$_GET['pwd'];

	
	$check = 0; // normal intro page
	if (!empty($username)) {
		if (!empty($firstname)) {
			$check = 1; // after Signup
		} else {
			if (!empty($pwd)) {
				$check = 2; // after Login
			} else {
				$check = 3; // returning to the page
			}
			
		}
	}
	
	$link = mysql_connect('localhost','root','12345') or die('Could not connect to MySQL: ' . mysql_error()); 
	mysql_select_db('gamification');

                switch ($check) {
    			case (1):
 				$result = mysql_query("SELECT * FROM users WHERE uname='$username'");
				$row = mysql_fetch_row($result);
				if($row[0]){ // exists
					$str = "<div style=\"color:white;margin:10px;float:left;\">User Already Exists</div>" . $str;
				}else{
			            $query = "INSERT INTO users (uname,fname,lname,password) values ('$username','$firstname','$lastname','$password');";
				    mysql_query($query) or die('Query failed 1: ' . mysql_error()); 
				    $id = mysql_insert_id();
				    $str = "<div style=\"color:white;margin:10px;float:left;\">Welcome " . $username . "</div>";
                                    }
				    $str = $str.$logout;
        	               break;
                        case (3):
				$result = mysql_query("SELECT * FROM users WHERE uname='$username'") ;
				$row = mysql_fetch_row($result);
				if($row[0]){ // exists
					$str = "<div style=\"color:white;margin:10px;float:left;\">Welcome Back " . $username . "</div>";
				} else {
					$str = "<div style=\"color:white;margin:10px;float:left;\">Please Check Details</div>" . $str;
				}
				$str = $str.$logout;
                                
                               break;
                       case (0):
                                
                               break;

                      default :
				$result = mysql_query("SELECT * FROM users WHERE uname='$username' AND password='$password'") ;
				$row = mysql_fetch_row($result);
				if($row[0]){ // exists
					$str = "<div style=\"color:white;margin:10px;float:left;\">Welcome Back " . $username . "</div>";
				} else {
					$str = "<div style=\"color:white;margin:10px;float:left;\">Please Check Details</div>" . $str;
				}
				$str = $str.$logout;
                              break;
                }




	mysql_close($link);
}

?>

<!DOCTYPE html5>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel='stylesheet' type='text/css' 	href='css/general_style.css'>
	<link rel="stylesheet" type="text/css" 	href="css/main_style.css">
	<script type="text/javascript" 			src="js/jquery-latest.min.js"></script>
	<script type="text/javascript" 			src="js/main_javascript.js"></script>
</head>
<body>
	<div id="textsearch">
		<div id="searchcenter">
			<div id="ToolKitStyle" NAME="ToolKitStyle">
				<div id="loginsinup">
					<?php
						echo $str;
					?>
				</div>
				<center>
					<div id="center1" name="center1">
						<div id="center2" name="center2">
							<div><INPUT TYPE="button" NAME="bigButtons" id="bigButtons" VALUE="Play" onClick=<?php echo "\"location.href='levels.php?uname=".$username."'\"'"; ?>></div>
							<div class="gaps"></div>
							<div><INPUT TYPE="button" class="buttons" NAME="buttons" id="buttons" VALUE="profile" onClick=<?php echo "\"location.href='profile.php?uname=".$username."'\""; ?>></div>
							<div class="gaps"></div>
							<div><INPUT TYPE="button" class="buttons" NAME="buttons" id="buttons" VALUE="about" onClick="location.href='about.html'"></div>
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>
	<!--  the  login  popup   -->
	<div id="overlay">
		<div id="logindiv" class="overlay">
			<form action="index.php" method="GET">
				<label for="uname">User Name:</label><br/>
				<input type="text" id="uname" name="uname"/><br/>
				<label for="pwd">Password:</label><br/>
				<input type="password" id="pwd" name="pwd"/><br/>
				<br/><input type="submit" value="Submit" />
			</form>
		</div>
		<div id="signupdiv" class="overlay">
			<form action="index.php" method="GET">
				<label for="uname">User Name:</label><br/>
				<input type="text" id="uname" name="uname"/><br/>
				<label for="fname">First Name:</label><br/>
				<input type="text" id="fname" name="fname"/><br/>
				<label for="lname">Last Name:</label><br/>
				<input type="text" id="lname" name="lname"/><br/>
				<label for="pwd">Password:</label><br/>
				<input type="password" id="pwd" name="pwd"/><br/>
				<br/><input type="submit" value="Submit" />
			</form>
		</div>
	</div>
</body>
</html>
