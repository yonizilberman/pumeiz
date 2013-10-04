//passes the selected picture to the game page in the url
$(document).ready(function(){
			     $("img").click(
				            function(){
						      var size=3;
						      var user="Default";
                                                      var checkSize="";
                                                      var picName="http://localhost/gamesite/images/shell0001.jpg"
  

        					      var urlstring=window.location;
        					      var urlPath=urlstring.href;
       						      var uNameStart=urlPath.search("uname=")+6;
       						      user=urlPath.substr(uNameStart); 
                                                      if (user=="")
							user="";
                                                      picName=$(this).attr("src");
                                                      picName=picName.replace("tn","");
                                                      /*
                                                      checkSize=document.getElementById('puzzleSize').value;
						      switch(checkSize)
						      {
							case "3x3":
  								size=3;
  								break;
							case "4x4":
  								size=4;
 								 break;
							default:
  								size=3;
						       }*/

					              window.location = "thegame.php?pic="+picName+ "&size=" + size + "&uname=" + user;
				                      });
		            });

window.location = "contact.aspx?name=" +name + "&email=" + email + "&message=" + message;

/*
//changes the puzzle grid division   
function puzzleGrid()
{
var puzzleSize="4x4";
puzzleSize=document.getElementById('puzzleSize').value;

switch(puzzleSize)
{
case "3x3":
  document.getElementById('puzzleSize').value="4x4";
  break;
case "4x4":
  document.getElementById('puzzleSize').value="3x3";
  break;
default:
  document.getElementById('puzzleSize').value="3x3";
}

}*/


