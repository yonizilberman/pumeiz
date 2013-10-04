<?php
	if(!empty($_GET)){
		$url = "'picupload.php?uname=".$_GET['uname']."'";
	}
	if($_GET['uname']!=""){
		$username = ''.$_GET['uname'];
	}
?>

<!DOCTYPE html5 >
<html5>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel='stylesheet' type='text/css'  href="css/general_style.css">
	<link rel='stylesheet' type='text/css' 	href="css/gallery_style.css">
	<link rel='stylesheet' type='text/css' 	href="css/enhanced.css">
	<script type="text/javascript" 			src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" 			src="js/enhance.js"></script>
	<script language=javascript>
		var numberOfPicInFolder=0;

		numberOfPicInFolder = <?php $targetfolder = "images/gallery_images/";
	    	$count = (count(glob($targetfolder . "*.{jpg,png,gif,bmp}", GLOB_BRACE))/2);
	    	echo $count; 
			?>
	</script> 
    <script type="text/javascript" 			src="js/gallery_javascript.js"></script>
    <script type="text/javascript" 			src="js/gallery_fun.js"></script>     
</head>
<body>
<div id="textsearch">
	<div id="searchcenter">
		<div id="ToolKitStyle" NAME="ToolKitStyle">
			<div id="tmp">
					<div><INPUT TYPE="button" class="button1" NAME="button1" id="button1" VALUE="back"
						   onClick=<?php echo "\"location.href='levels.php?uname=".$username."'\"'"; ?>>
					</div>
					<div class="uploadDiv" id="uploadDiv">
						<form action=<?php echo $url; ?> method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="customfile">
                       						 <span class="customfile-button" aria-hidden="true">Browse</span>
                       						 <span class="customfile-feedback" aria-hidden="true">No file selected...</span>
                       				   		<input class="customfile-input" name="file" id="file" type="file"></div>
								<input name="upload" id="upload" value="Upload photo" type="submit">
							</fieldset>
						</form>
					</div>
					<div id="leftArr">
						<!--  <span id='prev'>&#171; Previous</span> -->
                    	<input  type="button" class="prev" name="prev" id="prev" value="<" onClick="">
					</div>
					
					<div id="rightArr">
					<!-- <span id='next'>Next &#187;</span>  -->
 					    <input  type="button" class="next" name="next" id="next"value=">" onClick=""></div>
					<div id="level">
					
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
</html5>
