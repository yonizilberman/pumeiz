<?php 
error_reporting(0);
$targetfolder = "images/gallery_images/";
$tinyprefix = "tn";
$mainprefix = "shell";
$newheight = 360;
$newwidth = 360;
$newtinyheight = 67;
$newtinywidth = 100;

 define ("MAX_SIZE","2000");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
  
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	$image =$_FILES["file"]["name"];
	$uploadedfile = $_FILES['file']['tmp_name'];
 
 	if ($image) 
 	{
 		$filename = stripslashes($_FILES['file']['name']);
  	$extension = getExtension($filename);
 		$extension = strtolower($extension);
    if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
 			$errors=1;
 		}
 		else
 		{
      $size=filesize($_FILES['file']['tmp_name']);

      if ($size > MAX_SIZE*1024)
      {
      	$errors=1;
      }

      if($extension=="jpg" || $extension=="jpeg" )
      {
        $uploadedfile = $_FILES['file']['tmp_name'];
        $src = imagecreatefromjpeg($uploadedfile);
      }
      else if($extension=="png")
      {
        $uploadedfile = $_FILES['file']['tmp_name'];
        $src = imagecreatefrompng($uploadedfile);
      }
      else 
      {
        $src = imagecreatefromgif($uploadedfile);
      }
      // find how many images in folder
      $count = (count(glob($targetfolder . "*.{jpg,png,gif,bmp}", GLOB_BRACE))/2)+1;
      $suffix = str_pad($count, 4, "0", STR_PAD_LEFT);
      // get the image's proportions
      list($width,$height)=getimagesize($uploadedfile);
      $tmp=imagecreatetruecolor($newwidth,$newheight);
      $tmp1=imagecreatetruecolor($newtinywidth,$newtinyheight);
      // copying the file in the new sizes
      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
      imagecopyresampled($tmp1,$src,0,0,0,0,$newtinywidth,$newtinyheight,$width,$height);
      // saving the file
      $filename = $targetfolder . $mainprefix . $suffix . "." . $extension;
      $filename1 = $targetfolder . $tinyprefix . $mainprefix . $suffix ."." . $extension;

      imagejpeg($tmp,$filename,100);
      imagejpeg($tmp1,$filename1,100);

      imagedestroy($src);
      imagedestroy($tmp);
      imagedestroy($tmp1);
    }
  }
  if(!empty($_GET)){
    $url = 'gallery.php?uname='.$_GET['uname'];
  }
}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
  return "success";
 }
 header('location:'.$url);
 ?>