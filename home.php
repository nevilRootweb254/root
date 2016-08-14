<?php
session_start();
$session = $_SESSION['user'];
$redirect = 'index.php';
if(isset($session)){
	$expiry_time = time()+60*60*72;
	$useridentity = $session;
	setcookie ("id",$useridentity,$expiry_time,"","","",TRUE);
}else{

}
?>
<?php
if(isset($session)){

$connect = mysql_connect("localhost","root","1995");
$data = mysql_select_db("art_gallary");
$sele = mysql_query("SELECT * FROM art_gallary_table where user_id=$session");

if($sele){
	while($row = mysql_fetch_array($sele,MYSQL_ASSOC)){
		$user = $row['username'];
		$country = $row['country'];
		$city = $row['city'];
		$phone = $row['phone_number'];
		$email = $row['email'];
        $age = $row['age'];
        $gender = $row['sex'];
        $art = $row['type_of_art'];
        $art_description = $row['art_description'];
		$expiry_time = time()+60*60*72;
	    setcookie ("username",$user,$expiry_time,"","","",TRUE);
	    setcookie ("age",$age,$expiry_time,"","","",TRUE);
	    setcookie ("sex",$gender,$expiry_time,"","","",TRUE);
	    setcookie ("country",$country,$expiry_time,"","","",TRUE);
	    setcookie ("city",$city,$expiry_time,"","","",TRUE);
	    setcookie ("email",$email,$expiry_time,"","","",TRUE);
	    setcookie ("phone_number",$phone,$expiry_time,"","","",TRUE);
	    setcookie ("art_type",$art,$expiry_time,"","","",TRUE);
	    setcookie ("art_description",$art_description,$expiry_time,"","","",TRUE);
	}
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
    <link href="art.jpg" rel="icon" type="image/png">
    <!--<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="jqscript.js"></script>
    <title>Art Gallary And Auctioning</title>


  </head>
  <body onload="return ">
  <div id="uploaded" >
    <p class="closed"><a href="#">&times;</a></p>
    <div id="upload" >
	<p>video and image upload</p>
	   <form class="form-group" action="" method="" enctype="multipart/form-data">
	   <div class="form-group has-upload has-feedback" >
	   <input type="file" class="form-control" placeholder="SEARCH" name="file">
	   <span class="glyphicon glyphicon-upload form-control-feedback"></span>
	   </div>
	   <input type="submit" value="upload" name="upload" class="btn btn-default">
	   </form>
	   
	 </div>
	 </div>
	 <!---second upload simillar but not the same are using the same div tag---->
  <div id="uploaded">
  <p class="closed" ><a href="#">&times;</a></p>
  <div id="about">

  </div>
  </div>
  <div id="uploads" >
  <p style="margin-left:50px;padding:0px;font-size:2em;color:white;" id="close"><a href="#" style="text-decoration:none;color:white;">&times;</a></p>
	   <form class="form-group" action="account.php" method="POST" enctype="multipart/form-data">

	   <input type="file" class="form-control"  name="file" style="width:120px;">

	   <input type="submit" value="update" name="update" class="btn btn-default">
	   </form>
	 </div>
  <div class="container-fluid" >

    <div class="row" style="margin:30px auto;border:2px solid silver;border-radius:5px;">
    <div class="col-sm-2" style="background:white;height:620px;overflow:auto;">
	<div id="imgnav">
	<a href="home.php" style="color:black;font-size:18px;padding-left:5px;"><span class="glyphicon glyphicon-home " ></span></a>
	<a href="#" style="color:black;font-size:18px;padding-left:5px;"><span class="glyphicon glyphicon-bell"></span></a>
	<a href="#" style="color:black;font-size:18px;padding-left:5px;"><span class="glyphicon glyphicon-envelope"></span></a>
	<a href="#" class="upload" style="color:black;font-size:18px;padding-left:5px;"><span class="glyphicon glyphicon-upload"></span></a>
	<a href="logout.php" style="color:black;font-size:18px;padding-left:5px;"><span class="glyphicon glyphicon-off"></span></a>
	<hr>
	<h4 style="font-family:forte;"><strong><a href="account.php">my account</a></strong></h4>
	<?php
	$nameuser = $_COOKIE['username'];
	$nameuser = strtoupper($nameuser);
	echo $nameuser;
	?>
	<br>
	</div>
	<!--END OF NAV TOP-->
	<div id="img-image">
	<?php
	 $conn = mysql_connect("localhost","root","1995");
    $db = mysql_select_db("art_gallary");
	$sel = "SELECT * FROM art_gallary_table where user_id=$session";
	$sq = mysql_query($sel,$conn);
	while($row = mysql_fetch_array($sq,MYSQL_ASSOC)){
	$rowusername = $row['username'];

    $rowimage = $row['profilepicture'];
	echo '<div id="img">'.'<a href="#" title="click to update picture "><img src="'.$rowimage.'" width="150" height="150" class="img-circle"></a>'.'</div>';
	}

	?>
     </div>
	 <script>
	$(document).ready(function(){
	$('#img').click(function(){
		$('#uploads').show();
	});
	$('#close').click(function(){
		$('#uploads').hide();
	});
	});
	 </script>
	 <br>
	 <?php
	 if(isset($_POST['update'])){
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
				if($up){
					echo '<meta http-equiv="refresh" content="1;url=account.php">';
				}
			 }
		  }
	  }
  }
  ?>
	 <p style="color:blue;">profile completed</p>
	 <div class='progress'>
	 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="99%" aria-valuemin="0%" aria-valuemax="99%" style="width:99%">
	  99% profile complete.
	 </div>
	 </div>
	 <div id="account">
	 <button type="button" class="btn btn-success">following <span class="badge">45</span></button><br><br>
	 <button type="button" class="btn btn-success">ffollowers <span class="badge">45</span></button><br><br>
	 <p><a href="#" style="color:black;" id="script">Profile Info </a>&nbsp;&nbsp;&nbsp;<a href="#"><span class="glyphicon glyphicon-edit" >editprofile</span></a></p>
	 <?php
	 echo '<div id="infomation">';
	 echo '<b>Mobile <span class="glyphicon glyphicon-earphone"></span> : </b>0'.$_COOKIE['phone_number'].'.'.'<br><br>';
	 echo '<b>Email : </b>'.$_COOKIE['email'].'.'.'<br><br>';
	 echo '<b>Age : </b>'.$_COOKIE['age'].'Years Old'.'.'.'<br><br>';
	 echo '<b>Gender : </b>'.$_COOKIE['sex'].'.'.'<br><br>';
	 echo '<b>country : </b>'.$_COOKIE['country'].'.'.'<br><br>';
	 echo '<b>city : </b>'.$_COOKIE['city'].'.'.'<br><br>';
	 echo '<b>Art type : </b>'.$_COOKIE['art_type'].'.'.'<br><br>';
	 echo '<b>art description : </b>'.$_COOKIE['art_description'].'.'.'<br><br>';

	 echo '</div>';
	 ?>
	 </div>
	 <button class="btn btn-success" type="button">My Gallary </button>
	 <br><br>
	 <ul id="menuimg">
	 <li><a href="#">My image arts</a></li>
	 <li><a href="#">My video arts</a></li>
	 </ul>
	 <!--end of first column in the first row-->
     </div>
	 <div class="col-sm-6" style="background:white;height:620px;overflow:scroll;">
	 <h2>Art posts</h2>
	 <form class="form-group" action="home.php" method="POST">
	 <div class="form-group has-pencil has-feedback">
	 <input type="text"  class="form-control" name="postings" placeholder="write your post on my page....">
	 <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
	 </div>
	 <input type="submit" class="btn btn-success" value="posts" name="posts">
	 </form>
	 <hr>
	 <?php
	 $conn = mysql_connect('localhost','root','1995');
     $db = mysql_select_db('art_gallary');
     if(isset($_POST['posts'])){
		 $posting = htmlentities($_POST['postings']);
		 if(!empty($posting)){
			 $posting = mysql_real_escape_string($posting);
			 $intotable = mysql_query("INSERT INTO posts_gallary (user_id,post) VALUES ('$session','$posting')");
			if($intotable){
				echo '';
			}
		 }
	 }
	 ?>
	 <?php
	 $conn = mysql_connect('localhost','root','1995');
     $db = mysql_select_db('art_gallary');
	 //session present
	 if($session == true){
		$joinselect = mysql_query("SELECT * FROM posts_gallary RIGHT OUTER JOIN art_gallary_table ON posts_gallary.user_id = art_gallary_table.user_id ORDER BY post_id desc"); 
		if($joinselect){
			while($row=mysql_fetch_array($joinselect)){
				$username= $row['username'];
				$username = strtoupper($username);
				$picture= $row['profilepicture'];
				$sign_up = $row['sighn_up_date'];
				$post= $row['post'];
				$post_date= $row['post_date'];
				$time = strtotime($post_date);
				$myFormatForView = date("g:i A", $time);
				$datestr = date("m-d-y",$time);
				$day = date("m-d-y",strtotime("-1 days"));
				$weekday = date("m-d-y",strtotime("-2 days"));
				$weekdays = date("m-d-y",strtotime("-3 days"));
				$weekdayf = date("m-d-y",strtotime("-4 days"));
				$weekdayfv = date("m-d-y",strtotime("-5 days"));
				$weekdayfs = date("m-d-y",strtotime("-6 days"));
				$week = date("m-d-y",strtotime("-7 days"));
				$eightweek = date("m-d-y",strtotime("-8 days"));
				$nineweek = date("m-d-y",strtotime("-9 days"));
				$tenweek = date("m-d-y",strtotime("-10 days"));
				$elevenweek = date("m-d-y",strtotime("-11 days"));
				$twelveweek = date("m-d-y",strtotime("-12 days"));
				$thirteenweek = date("m-d-y",strtotime("-13 days"));
				$twoweeks = date("m-d-y",strtotime("-14 days"));
				if($datestr == date('m-d-y')){
					$datestr = "today";
				}else{
					$datestr =$datestr;
				}
				if($day == $datestr){
					$datestr = "yesterday";
				}else{
					$datestr =$datestr;
				}
				if($week == $datestr){
					$datestr = "a week ago at";
				}else if($weekday == $datestr){
					$datestr ='2 day ago at';
				}else if($weekdays == $datestr){
					$datestr ='3 days ago at';
				}else if($weekdayf == $datestr){
					$datestr ='4 days ago at';
				}else if($weekdayfv == $datestr){
					$datestr ='5 days ago at';
				}else if($weekdayfs == $datestr){
					$datestr ='6 days ago at';
				}else if($eightweek == $datestr){
					$datestr ='1 week and a day ago at';
				}else if($nineweek == $datestr){
					$datestr ='1 weeks 2 days ago at';
				}else if($tenweek == $datestr){
					$datestr ='1 weeks 3 days ago at';
				}else if($elevenweek == $datestr){
					$datestr ='1 week 4 days ago at';
				}else if($twelveweek == $datestr){
					$datestr ='1 week 5 days ago at';
				}else if($thirteenweek == $datestr){
					$datestr ='1 week 6 days ago at';
				}else if($twoweeks == $datestr){
					$datestr ='2 weeks ago at';
				}else{
					$datestr =$datestr;
				}
				//profile pic logics 
				if($picture == ""){
					$picture = 'images/default.jpg';
				}else{
					$picture = $picture;
				}
				echo '
				<div id="myposts">
				<div class="row">
				<div class="col-sm-1">
				<img src="'.$picture.'" width="60" height="60" class="img-circle" title="Sign Up Date : '.$sign_up.'">
				</div>
				<div class="col-sm-4">
				<p style="padding-left:15px;font-family:calibri;">'.$username.' : <em style="font-family:calibri;"><b>posted.</b></em></p>
				<p style="padding-left:15px;"><b>POSTED ON : </b>'.$datestr.' &nbsp;'.$myFormatForView.'</p>
				</div>
				</div>
				<p style="padding:10px 5px;font-size:15px;font-family:calibri;">'.$post.'</p>
				<br>
				
				<form class="form-group" action="account.php" method="POST">
	            <div class="form-group has-pencil has-feedback">
	            <input type="text" class="form-control" name="postings" placeholder="Comment On The Post....">
	            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
	            </div>
	            </form>
				<a href="#"><p>View comments</p></a>
				<button class="btn btn-info" type="button"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="badge">200</span></button>
				<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="badge">0</span></button>
				<button class="btn btn-link" type="button">COMMENTS <span class="badge">100</span></button>
				</div>
				';
			}
		}
	 }
	 ?>
     </div>
	 <div class="col-sm-2">
	 <br>
	 <p><span class="glyphicon glyphicon-bell" ></span><b>Notification</b></p>
	 <hr>
     </div>
	 <div class="col-sm-2" style="height:630px;overflow:auto;background:silver;">
	 <br>
	 <form class="form-group" action="home.php" method="GET">
	 <div class="form-group has-search has-feedback" >
	 <input type="text" name="search" class="form-control" placeholder="SEARCH">
	 <span class="glyphicon glyphicon-search form-control-feedback">
	 </div>
	 </form>
	 <p><span class="glyphicon glyphicon-search" ></span><b>search results.</b></p>
	 <hr>
	 <?php
	 $conn = mysql_connect('localhost','root','1995');
     $db = mysql_select_db('art_gallary');
     if(isset($_GET['search'])){
		 $search = htmlentities($_GET['search']);
		 if(!empty($search)){
			 $search = mysql_real_escape_string($search);
			 $seresult = mysql_query("SELECT *  FROM art_gallary_table WHERE username  LIKE '%$search%' order by user_id");
			if($seresult){
				while($snow = mysql_fetch_array($seresult)){
					$snowimage = $snow['profilepicture'];
					$snowuser  = $snow['username'];
					$snowart = $snow['type_of_art'];
					$description = $snow['art_description'];
					$phone_number = $snow['phone_number'];
					$email = $snow['email'];
					if($snowimage == ""){
						$snowimage = "images/default.jpg";
					}else{
						$snowimage = $snowimage;
					}
					echo
					'<div class="row">'.
					'<div class="col-sm-4">'.
					'<img src="'.$snowimage.'" width="60" height="60" class="img-circle" title="art_description:'.$description.'">'.
					'</div>'.
					'<div class="col-sm-8">'.
					'<p>'.'<a href="#">'.$snowuser.'</a>'.'<p/>'.
					'<p>'.'<b>type of art:</b>'.$snowart .'<p/>'.
					'</div>'.
					'</div>'.
					'<div id="follow">'.
					'<button class="btn btn-info">follow</button>'.'&nbsp;'.'&nbsp;'.
					'<button class="btn btn-info">View Gallary</button>'.
					'</div>'.
					'<hr>'
					;
				}

			}
		 }
	 }
	 ?>
     </div>
     </div>
  </div>
  </body>
</html>
