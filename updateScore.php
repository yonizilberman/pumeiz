<?php
$gotoLevels="levels.php?uname=";
$defaultUser="";
$adminUser="root";
$adminPass="12345";

if(!empty($_GET)){     
	$username = ''.$_GET['uname'];
	$usertime = ''.$_GET['utime'];
	$userscore = ''.$_GET['uscore'];
        $timebadge=0;
        $wongamesbadge=0;
        /*DB variables to update*/
        $besttimedb=0;         
        $tokendb=0;
        $wongamedb=0;
        $badgesdb="";
        
        if ($username!=$defaultUser){
                switch (true) {
    			case ($usertime<60):
       		               $timebadge=11;
        	               break;
                        case (($usertime>=60)&&($usertime<120)):
                               $timebadge=10;
                               break;
                       case (($usertime>=120)&&($usertime<240)):
                               $timebadge=9;
                               break;
                       case (($usertime>=240)&&($usertime<360)):
                               $timebadge=8;
                               break;
                       case (($usertime>=360)&&($usertime<480)):
                               $timebadge=7;
                               break;
                      default :
                              echo "No time badges";
                              break;
                }

		// echo "connecting to server ...";
       	        $gotoLevels=$gotoLevels.$username;
        	$link = mysql_connect('localhost',$adminUser,$adminPass) or die('Could not connect to MySQL: ' . mysql_error()); 
		mysql_select_db('gamification');
		$query = "SELECT uname,fname,lname,besttime,wongame,level,token,badges FROM users WHERE uname='$username'";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);

        	$besttimedb=$row[3];
                if ($besttimedb>$usertime)
                   $besttimedb=$usertime;        
        	$tokendb=$row[6]+$userscore;
        	$wongamedb=$row[4]+1;
        	$badgesdb=$row[7];

                switch (true) {
    			case ($wongamedb>=250):
       		               $wongamesbadge=6;
        	               break;
                        case ($wongamedb>=100):
                               $wongamesbadge=5;
                               break;
                       case ($wongamedb>=50):
                               $wongamesbadge=4;
                               break;
                       case ($wongamedb>=25):
                               $wongamesbadge=3;
                               break;
                       case ($wongamedb>=10):
                               $wongamesbadge=2;
                               break;
                       case ($wongamedb>=1):
                               $wongamesbadge=1;
                               break;
                      default :
                              echo "No game won badges";
                              break;
                }
                
                $bagesarr=explode( ',', $badgesdb );
		if (!(in_array($timebadge,$bagesarr))) {
   			 array_push($bagesarr,$timebadge);
		}
 

		if (!(in_array($wongamesbadge,$bagesarr))) {
  			array_push($bagesarr,$wongamesbadge);
		}
                sort($bagesarr);
                $badgesdb=implode(",", $bagesarr);
                // echo "No game asdasd";
                
		$query = "UPDATE users SET besttime='$besttimedb',wongame='$wongamedb',token='$tokendb',badges='$badgesdb' WHERE uname='$username' "; 
		$result = mysql_query($query);                               
		mysql_close($link); /*close sql connection*/
        }
        else{
             echo "default User";
            }
}
else{
	echo "Unexpected error.";
        $gotoLevels=$gotoLevels.$defaultUser;
	/*exit();*/
}
/*go to level.html page   */ 
header("Location: $gotoLevels");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<style type="text/css">
		</style>
	</head>
	<body>
		<div id="Container">
		</div>
	</body>
</html>
