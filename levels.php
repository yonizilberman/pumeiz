<?php
	if($_GET['uname']!=""){
		$username = ''.$_GET['uname'];
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Levels Gallery</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name='author' content='Eyal Yoni (shenkar.ac.il)'>

	<link rel='stylesheet' type='text/css'  href='css/general_style.css'>
	<link rel='stylesheet' type='text/css' 	href='css/levels_style.css'> 
	<script type="text/javascript" 			src="js/jquery-latest.min.js"></script>
	<script type="text/javascript" 			src="js/levels_gallery.js"></script>
	<link rel="stylesheet" type='text/css' 	href="css/rating.css"> 
	<script type="text/javascript" 			src="js/rating.js"></script>
	<script type="text/javascript" 			src="js/levels_fun.js"></script> 





<body>
<div id="textsearch">
	<div id="searchcenter">
		<div id="ToolKitStyle">
			<div id="tmp">
					<input  type="button" class="button1" name="button1" id="button1"value="back" 
                                                 onClick=<?php echo "\"location.href='index.php?uname=".$username."'\"'"; ?>>
					<input  type="button" class="gallery" name="gallery" id="gallery" value="gallery"  
                                                 onClick=<?php echo "\"location.href='gallery.php?uname=".$username."'\""; ?>>
					<div id="bigtmp">
						<INPUT TYPE="button" class="div" NAME="div" id="puzzleSize" 
                                                       VALUE="3x3" onClick="puzzleGrid()">
					</div>
					    <div id="leftArr">
                                           <!--  <span id='prev'>&#171; Previous</span> -->
                                            <input  type="button" class="prev" name="prev" id="prev"value="<" 
                                                    onClick="location.href='shop.html'">
                        </div>
					    <div id="rightArr">
                                           <!-- <span id='next'>Next &#187;</span>  -->
 					    <input  type="button" class="next" name="next" id="next"value=">" 
                                                     onClick="">

                        </div>
					<div id="level">

<div id='topLinkCon'><a name='topofpg'>&nbsp;</a>
</div>
<div id='leftColumn' class='column'> <!-- Begin left column -->
	<div class='leftContent'> <!-- Begin left content -->
		<div id='demo1'>
			<div id='gallery1' class='gallery1'>
				<div>
					<div class='gcon'><img id='g1' alt='' src=''><div class='gcap' id='gc1'>&nbsp;</div></div>
					<div class='gcon'><img id='g2' alt='' src=''><div class='gcap' id='gc2'>&nbsp;</div></div>
					<div class='gcon'><img id='g3' alt='' src=''><div class='gcap' id='gc3'>&nbsp;</div></div>
					<div class='clearAll'>&nbsp;</div>
				</div>
				<div>
					<div class='gcon'><img id='g4' alt='' src=''><div class='gcap' id='gc4'>&nbsp;</div></div>
					<div class='gcon'><img id='g5' alt='' src=''><div class='gcap' id='gc5'>&nbsp;</div></div>
					<div class='gcon'><img id='g6' alt='' src=''><div class='gcap' id='gc6'>&nbsp;</div></div>
					<div class='clearAll'>&nbsp;</div>
				</div>
				<div>
					<div class='gcon'><img id='g7' alt='' src=''><div class='gcap' id='gc7'>&nbsp;</div></div>
					<div class='gcon'><img id='g8' alt='' src=''><div class='gcap' id='gc8'>&nbsp;</div></div>
					<div class='gcon'><img id='g9' alt='' src=''><div class='gcap' id='gc9'>&nbsp;</div></div>
					<div class='clearAll'>&nbsp;</div>
				</div>
			</div>
			<div id='slideshow'>
				<div class='scon'><img id='s1' alt='' src=''><div class='scap' id='sc1'>&nbsp;</div></div>
			</div>
			<div id='navigation'>
				
				
				<p><span id='back'>Back to the Gallery</span></p>
				<p><span id='auto' title='Toggle Auto-Slide'>Auto-Slide</span> <span id='time'>&nbsp;</span></p>
			</div>
		</div> <!-- end demo1 -->
	</div> <!-- end leftContent -->
</div> <!-- end leftColumn -->

					</div>
			</div>
		</div>
	</div>
</div>
 </body>
</html>
