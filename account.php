<?php
session_start();
$session = $_SESSION['user'];
$redirect = 'index.php';
if(isset($session)){
	$expiry_time = time()+60*60*72;
	$useridentity = $session;
	setcookie ("id",$useridentity,$expiry_time,"","","",TRUE);
}else{
    header('location:logout.php');
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
        $profile = $row['profilepicture'];
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
	    setcookie ("profile",$profile ,$expiry_time,"","","",TRUE);
	    setcookie ("art_description",$art_description,$expiry_time,"","","",TRUE);
	}
}
}else{
    header('location:logout.php');
}
function edition(){

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
    <link href="<?php echo $_COOKIE['profile'];?>" rel="icon" type="image/jpg">
    <link href="<?php echo $_COOKIE['profile'];?>" rel="icon" type="image/png">
    <!--<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="jqscript.js"></script>
    <title><?php echo'( '.$_COOKIE['username'].' )';?>Art Gallary And Auctioning</title>
	<style>
	#edit_text{
		top:5px;
		z-index:1;
		position:fixed;
		opacity:4;
		border-radius:10px;
	}
	input:focus{
		background:black;
		color:white;
		font-family:calibri-light;
		BORDER:0PX;
	}
	textarea:focus{
		background:black;
		color:white;
		font-family:calibri-light;
	}
	#alert{
		background:green;
		color:white;
		height:30px;
		text-align:center;
		margin-top:10px;
		line-height:30px;
    }
	</style>
  </head>
  <body onload="return ">

  <div id="uploaded" >
    <p class="closed"><a href="#">&times;</a></p>
    <div id="upload" >
	<p>IMAGE OR ART UPLOAD</p>
	<hr>
	   <form class="form-group" action="" method="" enctype="multipart/form-data">
	   <div class="form-group has-upload has-feedback" >
	   <input type="file" class="form-control" placeholder="FILE" name="file">
	   <input type="text" class="form-control" placeholder="CAPTION" name="file">
	   <input type="number" class="form-control" placeholder="PRICE OF YOUR ART" name="file">
	   <input type="text" class="form-control" placeholder="CURRENCY" name="file">
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
  <p style="margin-left:50px;padding:0px;font-size:2em;color:gray;" id="close"><a href="#" style="text-decoration:none;color:white;">&times;</a></p>
	   <form class="form-group" action="account.php" method="POST" enctype="multipart/form-data">

	   <input type="file" class="form-control"  name="file" style="width:120px;">

	   <input type="submit" value="update" name="update" class="btn btn-default">
	   </form>
	 </div>
  <div class="container-fluid" >

    <div class="row" style="margin:30px auto;border:2px solid silver;border-radius:5px;">
    <div class="col-sm-2" style="background:white;height:620px;overflow:auto;">
	<div id="imgnav">
	<a href="home.php" style="color:black;font-size:18px;padding-left:5px;"title='view home posts' ><span class="glyphicon glyphicon-home " ></span></a>
	<a href="#" style="color:black;font-size:18px;padding-left:5px;"><span class="glyphicon glyphicon-bell"><sup><span style="color:black;background:red;font-size:10px;" class="badge">200</span></sup></span></a>
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
	if(!$rowimage == ""){
	echo '<div id="img">'.'<a href="#" title="click to update picture "><img src="'.$rowimage.'" width="150" height="150" class="img-circle"></a>'.'</div>';
	}else{
		echo '<div id="img">'.'<a href="#" title="click to update picture "><img src="images/default.jpg" width="150" height="150" class="img-circle"></a>'.'</div>';
	}
	}

	?>
     </div>
	 <script type="text/javascript">
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
	 <button type="button" class="btn btn-success">ffollowers <span class="badge">45</span></button></br><br>
	 <p><a href="#" style="color:black;" id="script">Profile Info </a>&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip"  data-placement="left" title="<?php echo $_COOKIE['username'];?>"><span class="glyphicon glyphicon-edit" >editprofile</span></a></p>
	 
	 <?php
	 echo '<div id="infomation">';
	 echo '<b>Mobile <span class="glyphicon glyphicon-earphone"></span> : </b>0'.$_COOKIE['phone_number'].'.'.'<br><br>';
	 echo '<b>Email <span class="glyphicon glyphicon-envelope"> : </b>'.$_COOKIE['email'].'.'.'<br><br>';
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
	 <div class="col-sm-6" style="background:white;height:620px;overflow:auto;">
	 <h2>My Art's posts.</h2>
	 <hr>
	 <P>Write a post &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">post a video <span class="glyphicon glyphicon-film"></span></a></p>
	 <form class="form-group" action="account.php" method="POST">
	 <div class="form-group has-pencil has-feedback">
	 <textarea   id="ins"class="form-control" name="postings" placeholder="write your post on my page....">
	 </textarea>
	 <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
	 </div>
	 <input type="submit" class="btn btn-success" value="posts" name="posts">
	 <?php
     if(isset($_POST['posts']) AND !empty($_POST['postings'])){
		 $posting = htmlentities($_POST['postings']);
		 if(!empty($posting)){
			 $conn = mysql_connect('localhost','root','1995');
             $db = mysql_select_db('art_gallary');
			 $posting = mysql_real_escape_string($posting);
			 $intotable = mysql_query("INSERT INTO posts_gallary (user_id,post) VALUES ('$session','$posting')");
			if($intotable){
			 echo'<div id="alert"><p  > new post posted <span class="glyphicon glyphicon-ok"></span></p></div>';
			}else{
			echo '<div id="alert"><p>post not posted try again after 5 mins  <span class="glyphicon glyphicon-remove"></span></p></div>';
		 }
		 }
	 }else{
			echo '<div id="alert"><p>fill in the post field please to add a post <span class="glyphicon glyphicon-remove"></span></p></div>';
		 }
	 ?>
	 </form>
	 <hr>
	 
	 <?php
	 $conn = mysql_connect('localhost','root','1995');
     $db = mysql_select_db('art_gallary');
	 //session present
	 if($session == true){
		$joinselect = mysql_query("SELECT * FROM posts_gallary RIGHT OUTER JOIN art_gallary_table ON posts_gallary.user_id = art_gallary_table.user_id  WHERE art_gallary_table.user_id=$session ORDER BY post_date DESC"); 
		if($joinselect){
			while($row=mysql_fetch_array($joinselect)){
				$post_id = $row['post_id'];
				$user_id = $row['user_id'];
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
				<p style="padding:10px 5px;font-size:15px;">'.$post.'</p>
				<br>
				<form class="form-group" action="account.php" method="POST">
	            <div class="form-group has-pencil has-feedback">
	            <input type="text" class="form-control" name="postings" placeholder="Comment On The Post....">
	            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
	            </div>
	            </form>
				<a href="#"><p>View comments..</p></a>
				<form action"account.php" method="GET">
				<button class="btn btn-info" type="button"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="badge">200</span></button>
				<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="badge">0</span></button>
				<button id="edt" class="btn btn-primary" type="button" title="edit"><a href="account.php? edit='.$post_id.'" style="color:white;"><span class="glyphicon glyphicon-edit"></span>EDIT</a></button>
				<button class="btn btn-warning" type="submit" name="delete"><span class="glyphicon glyphicon-trash"><a href="account.php? delete='.$post_id.'" style="color:white;"> DELETE</a></span></button>
				<button class="btn btn-link" type="button">COMMENTS <span class="badge">100</span></button>
				</form>
				</div>
				';
			if(isset($_SESSION['user'])){
				$sess = $_SESSION['user'];
				if($username == strtoupper($_COOKIE['username']) && $sess = $user_id ){
					if(isset($_GET['delete'])){
					$delete = intval($_GET['delete']);
					$query="DELETE FROM posts_gallary WHERE post_id = '".$delete."'";
					if($del = mysql_query($query)){
					}
				}
				}	
			}
			}
		}
	 }
	 ?>
	 <?php
	 //if (isset($_GET['delete'])){
		   
	 //}
	 ?>
     </div>
	 <div class="col-sm-2">
	 <br>
	 <p><span class="glyphicon glyphicon-bell" ></span><b>Notifications and Trending arts.</b></p>
	 <hr>
     </div>
	 <div class="col-sm-2" style="height:630px;overflow:auto;background:silver;">
	 <br>
	 <form class="form-group" action="account.php" method="GET">
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
			 $seresult = mysql_query("SELECT *  FROM art_gallary_table WHERE username  LIKE '%$search%' order by user_id desc");
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
