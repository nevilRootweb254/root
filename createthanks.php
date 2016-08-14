<?php
session_start();
$session = $_SESSION['user'];
$redirect = 'createthanks.php';
$redirect2 = 'account.php';
if(isset($session)){
	mysql_connect('localhost','root','1995');
	mysql_select_db('art_gallary');
	$sel = mysql_query("select * FROM art_gallary_table WHERE user_id=$session");
	if($sel == true){
		while($rows = mysql_fetch_array($sel)){
			$rowprofile = $rows['profilepicture'];
			$rowsex = $rows['sex'];
			$rowage = $rows['age'];
			$rowtype_of_art = $rows['type_of_art'];
			$rowart_description = $rows['art_description'];
			if($rowprofile === "" or $rowsex === "" or $rowage === "0" or $rowtype_of_art === "" or $rowart_description === ""){
			
			}else{
				header('location:'.$redirect2);
			}
		}
	}
}else{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="media.css">
    <link href="images/art2.png" rel="icon" type="image/png">
    <!--<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="jqscript.js"></script>
    <title>Art Gallary And Auctioning</title>
	<style>
	#border{
		position:absolute;
		top:250px;
		left:92%;
		cursor:pointer;
		color:white;
		width:160px;
		height:50px;
		border-radius:6px;
		line-height:50px;
		border:1px solid black;
		-webkit-transform:rotate(270deg);
		transform:rotate(270deg)
	}
	#border p{
		text-align:center;
	}
	#follow{
		display:non;
		z-index:1;
		position:absolute;
		top:129px;
		left:110%;
		color:white;
		width:120px;
		height:auto;
		border-radius:6px;
		line-height:50px;
		border:1px solid black;
		padding-bottom:10px;
	}
	</style>

	<script>
	$(document).ready(function(){
		$('#border').click(function(){
			$('#border').fadeOut(1000);
			$('#follow').animate({left:'89%'},1000);
			$('#fb').show(1200);
			$('#email').show(2200);
			$('#twit').show(3000);
			$('#instagram').show(4000);
		});
		$('#righted').click(function(){
			$('#border').fadeIn(5000);
			$('#fb').hide(3200);
			$('#email').hide(2400);
			$('#twit').hide(1600);
			$('#instagram').hide(800);
			$('#follow').animate({left:'110%'},4000);
		});
	});
	</script>
  </head>
  <body onload="return ">
  <!----container fluid wrapper--->
  <div id="border" class="bg-primary" id="followbtn">

  <p style ="font-family:forte;">FOLLOW US ON</p>

  </div>
  <div id="follow" class="bg-primary">
  
  <center>
  <button type="button" class="btn btn-danger" style="float:left;margin-left:3px" id="righted"><span class="glyphicon glyphicon-chevron-right" ></button><br>
  <a href="#"><img src="icons/facebook.png" width="50" height="50"id="fb" style="display:none;"></a><br>
  <a href="#"><img src="icons/email.png" width="50" height="50" id="email" style="margin-top:10px;display:none;"></a><br>
  <a href="#"><img src="icons/twitter2.png" width="50" height="50" id="twit" style="margin-top:10px;display:none;"></a><br>
  <a href="#"><img src="icons/instagram.png" width="50" height="50" id="instagram" style="margin-top:10px;display:none;"></a><br>
  </center>
  </div>

  <div id="uploaded" >
    <p class="closed"><a href="#">&times;</a></p>
    <div id="upload" >
	<p>profile picture upload</p>
	   <form class="form-group" action="createthanks.php" method="POST" enctype="multipart/form-data">
	   <div class="form-group has-upload has-feedback" >
	   <input type="file" class="form-control"  name="file">
	   <span class="glyphicon glyphicon-upload form-control-feedback"></span>
	   </div>
	   <input type="submit" value="upload" name="upload" class="btn btn-default">
	   </form>
	   
	 </div>
	 </div>

  <div class="container-fluid">
  <!----1 body row --->
  <div class="row" style="margin:50px 0px;">
  <div id="cret" class="visible-lg">
  <h4 style="color:white;padding-left:50px;line-height:10px;font-family:forte;" > Sign Up Complition Art Gallary page</h4>
  </div>
  <!------->
   <div class="col-sm-2">
  </div>
  <!------->
  <!------->
  <div class="col-sm-8">
  
  <!---second row in the first row --->
  <div class="row" style=";background:white;border-radius:10px;">
  <h4 style="color:black;padding-left:50px;line-height:10px;font-family:forte;" class="visible-sm"> Sign Up Complition Art Gallary page</h4>
  <!---first column in second row --->
  <div class="col-sm-6" style="background:white;padding:30px 20px;">
  
  <h3 style="font-family:forte;text-align:center;">choose your profile picture</h3>
  <p style="font-family:forte;text-align:center;">click the pic to choose<br> your ptofilephoto</p>
  <center>
  <?php
  if(isset($_POST['upload'])){
	  $name = htmlentities($_FILES['file']['name']);
	  $tmp_name = htmlentities($_FILES['file']['tmp_name']);
	  $type = htmlentities($_FILES['file']['type']);
	  
	  $extension = strtolower(substr($name,strpos($name, '.')+1));
	  $path = 'images/'.$name;
	  if(!empty($name)){
		  if($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png' || $extension === 'gif'){
			 $move = move_uploaded_file($tmp_name,$path);
			 if($move == true){
				$conn = mysql_connect('localhost','root','1995');
			    $db = mysql_select_db('art_gallary');
			    $update_pro = "UPDATE art_gallary_table SET profilepicture = '$path' where user_id = $session";
				$up = mysql_query($update_pro,$conn);
				if($up == true){
					$select =mysql_query("SELECT * FROM art_gallary_table WHERE user_id = $session");
					while($row = mysql_fetch_array($select)){
						$rowprofpic = $row['profilepicture'];
						$rowuser = $row['username'];
						echo '<a href ="#" id="image" title="click the pic to edit your profile pic"><img src="'.$rowprofpic.'" width = "250" height = "250" class="img-circle"></a>';
					}
				}else{
					echo '<a href ="#" id = "image" title="click the pic to edit your profile pic"><img src="images/default.jpg" width = "250" height = "250" class="img-circle"></a>';
				}
			 } 
		  }else{
			  echo '<a href ="#" id = "image" title="click the pic to edit your profile pic"><img src="images/default.jpg" width = "250" height = "250" class="img-circle"></a><br>';
			  echo 'please chose an image';
			  
		  }
	  }else{
		  echo'<a href ="#" id = "image" title="click the pic to edit your profile pic"><img src="images/default.jpg" width = "250" height = "250" class="img-circle"></a><br>';
		  echo 'choose profile picture';
	  }
	  
  }else{
		  echo'<a href ="#" id = "image" title="click the pic to edit your profile pic"><img src="images/default.jpg" width = "250" height = "250" class="img-circle"></a>';

	  }
  ?>
  </center>
  <script>
  $(document).ready(function(){
	$('#image').click(function(){
		$('#uploaded').show();
	});
	});
  </script>
  </div>
  <!---div end of the first column in second row---->
  <!---second column in second row --->
  <div class="col-sm-6" style="padding:30px 20;background:white;">
  <form role="form" class="form-group" action="createthanks.php" method="POST"><br><br><br>
  <label style="font-family:forte;font-weight:bolder;">SEX ( GENDER )</label>
  <input type="text" class="form-control" name="sex" placeholder="SEX ( GENDER )"><br>
  <label style="font-family:forte;font-weight:bolder;">AGE.</label>
  <input type="number" class="form-control" name="age" placeholder="AGE"><br>
  <label style="font-family:forte;font-weight:bolder;">ART TYPE.</label>
  <input type="text" class="form-control" name="art_type" placeholder="ART TYPE"><br>
  <label style="font-family:forte;font-weight:bolder;">ABOUT YOUR SELF AND YOUR ART.</label>
  <input type="text" class="form-control" name="art_description" placeholder="ABOUT YOUR SELF AND YOUR ART "><br>
  <input type= "submit" value="complete process" class="btn btn-info" name= "complete"><br>
  </form>
  <?php
  mysql_connect('localhost','root','1995');
   mysql_select_db('art_gallary');
   if(isset($_POST['complete'])){
	$sex = htmlentities($_POST['sex']);
	$age = htmlentities($_POST['age']);
	$art_type = htmlentities($_POST['art_type']);
	$art_description = htmlentities($_POST['art_description']);
	if(!empty('$sex') || !empty('$age') || !empty('$art_type') || !empty('$art_description')){
		$sex = mysql_real_escape_string($sex);
	    $age = mysql_real_escape_string($age);
	    $art_type =mysql_real_escape_string($art_type);
	    $art_description = mysql_real_escape_string($art_description);
		$updated = mysql_query("UPDATE art_gallary_table SET sex='$sex',age='$age',type_of_art='$art_type',art_description='$art_description'  WHERE user_id = $session ");
		if($updated == 1){
			header('location:'.$redirect2);
		}else{
			echo 'not updated';
		}
	}
	else{
	   echo 'fill in all the fields please';
   }
   }else{
	   echo 'fill in all the fields please';
   }
   
  ?>
  </div>
  <!---div end of the second column in second row---->
  <hr>
  
  </div>
  <!---end second row in the first row ---->
  </div>
  <!------->
  <!------->
  <div class="col-sm-2">
  </div>
  
  <!------->

  </div>
  <!----end of row --->
  
  </div>
  <!---end of container wrapper---->
</body>
</html>