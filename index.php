<?php
error_reporting(0);
session_start();

$conn = mysql_connect('localhost','root','1995');
$db = mysql_select_db('art_gallary');
if(isset($_POST['submit'])){
	$firstname = stripcslashes($_POST['firstname']);
	$lastname = stripcslashes($_POST['lastname']);
	$username = stripcslashes($_POST['username']);
	$password = stripcslashes($_POST['password']);
	$password2 = stripcslashes($_POST['password2']);
	$country = stripcslashes($_POST['country']);
	$city = stripcslashes($_POST['city']);
	$phone_number = stripcslashes($_POST['number']);
	$email = stripcslashes($_POST['email']);
	
	if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password) && !empty($country) && !empty($city) && !empty($phone_number) && !empty($email)){
		if($password == $password2){
	$firstname = mysql_real_escape_string($firstname);
	$lastname = mysql_real_escape_string($lastname);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$password = md5($password);
	$country = mysql_real_escape_string($country);
	$city = mysql_real_escape_string($city);
	$phone_number = mysql_real_escape_string($phone_number);
	$email = mysql_real_escape_string($email);
	$in = "INSERT INTO art_gallary_table (firstname,secondname,username,password,country,city,phone_number,email) 
			VALUES ('$firstname','$lastname','$username','$password','$country','$city','$phone_number','$email')";
	$insert = mysql_query($in,$conn);
			if($insert == true){
			echo '<script type="text/javascript" document="javascript" >alert("your account is created log in to proceed");</script>';
			}
		}else{
			echo '
			<script type="text/javascript" document="javascript">
			alert("the passwords does not match");
			</script>
			';
		}
	}else{
		echo '
		<script type="text/javascript" document="javascript">
			alert("please input all the required field");
		</script>
		';
	}
}

/*

*/
function login(){
$conn = mysql_connect('localhost','root','1995');
$db = mysql_select_db('art_gallary');
if(isset($_POST['submitin'])){
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']);
	$pass = md5($pass);
	$select = "SELECT * FROM art_gallary_table WHERE (username = '$user' OR email = '$user') AND password = '$pass'";
	$query = mysql_query($select,$conn) or die('something went wrong please try again');
	$row = mysql_fetch_array($query,MYSQL_ASSOC);
	if(($row['username'] === $user OR $row['email'] === $user) AND $row['password'] == $pass ){
		
		if($_SESSION['user'] = $row['user_id']){
			echo '<script type="text/javascript" document="javascript">
			        open("createthanks.php");
				  </script>
			';
		}
			   }else{
				   echo '<input type="button" name="submit" class="btn btn-link" value="forgotten password" style="color:black;"><br><br>';
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
	<link rel="stylesheet" href="media.css">
	<link type="image.jpg" href="uploads/art2.jpg" rel="icon">
    <link href="art.jpg" rel="icon" type="image/png">
	<!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!---fort owsome link-->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="jqscript.js"></script>
    <title>Art Gallary And Auctioning</title>
     <style>
	 	@keyframes spin{
	100%{
		transform:rotate(360deg);
	}
}
@keyframes spin{
	100%{
		-webkit-transform:rotate(360deg);
		transform:rotate(360deg);
	}
}
@keyframes spin{
	100%{
		-moz-transform:rotate(360deg);
		transform:rotate(360deg);
	}
}
@keyframes spin{
	100%{
		-o-transform:rotate(360deg);
		transform:rotate(360deg);
	}
}
	#loading{
		width:55px;
		height:55px;
		border-radius:100%;
		position:fixed;
		border:4px solid #CCC;
		border-top-color:gray;
		border-right-color:black;
		border-right-color:transparent;
		position:fixed;
		z-index:1;
		left:50%;
		top:50%;
		animation:spin 0.7s infinite linear;
		-moz-animation:spin 0.7s infinite linear;
		-o-animation:spin 0.7s infinite linear;
		-webkit-animation:spin 0.7s infinite linear;
	}
	input:hover{
		border:2px solid lightgreen;
	}
	input:focus{
		border:2px solid silver;
		background:black;
		color:white;
		font-family:calibrilight;
	}
	 </style>
	 <script>
    function load(){
		document.getElementById('loading').style.display="none";
	}
	</script>
	</head>
  <body onload="return load()">
  <div id="loading"></div>
	<div class="container-fluid"style="margin:20px auto;background:silver;padding-top:20px;">
	<div class="row" style="background:silver;">
	<div class="col-sm-2">
	 </div>
	<div class="col-sm-8" style="background:white;" >
	<header id="header">
	<a href="art.php" style="color:white;text-decoration:none;" class="h"><h3 style="color:black;font-family:forte;float:left;" >ART GALLARY AND AUCTIONING</h3></a>
	<i class="fa fa-spinner fa-spin"></i>
	
	<button class="btn btn-default" style="background:black;float:right;color:white" id="CREATE-ACCOUNT">CREATE ACCOUNT</button>
	<a href="art.php" style="color:black;float:right;margin-top:35px;margin-right:25px;"><span class="glyphicon glyphicon-refresh" ></span></a>
	</header>
      <div class="row" style="margin-top:10px;">
	  <!--first column-->
	   <div class="col-sm-1">
	   </div>
	   <!--second col-->
	   <div class="col-sm-8">
	   <h2 style="font-family:chiller;color:lightblack"id="h-w"><strong>TRENDING #ARTS OF THE DAY.<span class="glyphicon glyphicon-pencil">.....</span></strong></h2>
	   <div class="row">
	   <div class="col-sm-6">
	   <div class="posts">
	   
		<img src="uploads/art.jpg" title="<?php echo 'art by nevil rose';?>" class="img-responsive" width="200px" height="200px">
		<br>
		<h4 style="text-decoration:underline;color:black">portrait details</h4>
		<ul class="details">
		<li>price : $20 OR 200 Ksh.</li>
		<li>uploaded date : 20/3/2016.</li>
		<li style="color:red">Auctioned price = $100</li>
		<li><button class="btn btn-success" title="delete portrait" id="call"><span class="glyphicon glyphicon-earphone">&nbsp;&nbsp;view number</span></button></li>
		</ul>
		
		<button class="btn btn-primary" title="like portrait"><span class="glyphicon glyphicon-thumbs-up"></span></button>
		<button class="btn btn-warning" title="unlike portrait"><span class="glyphicon glyphicon-thumbs-down"></span></button>
		<button class="btn btn-info" title="buy"><span >buy </span></button>
		<br><br>
	   </div>
	   </div>
	  <div id="col-sm-6">
	   <!-- seecond pic-->
	   <div class="posts">
		<img src="uploads/art2.jpg" title="<?php echo 'art by nevil rose';?>" class="img-responsive" width="200px" height="200px">
		<br>
		<h4 style="text-decoration:underline;color:black">portrait details</h4>
		<ul class="details">
		<li>price : $20 OR 200 Ksh.</li>
		<li>uploaded date : 20/3/2016.</li>
		<li style="color:red">Auctioned price = $100</li>
		<li><button class="btn btn-success" id="call2" title="delete portrait"><span class="glyphicon glyphicon-earphone">&nbsp;&nbsp;view number</span></button></li>
		</ul>
	
		<button class="btn btn-primary" title="like portrait"><span class="glyphicon glyphicon-thumbs-up"></span></button>
		<button class="btn btn-warning" title="unlike portrait"><span class="glyphicon glyphicon-thumbs-down"></span></button>
		<button class="btn btn-info" title="buy"><span >buy </span></button>
		<br><br>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	   <!--third col-->
	   <div class="col-sm-3" style="margin-top:50px;">
	   <!--login form-->
	   <form role="form" action="index.php" method="POST">
	   <div class="form-group has-user has-feedback">
		<input type="text" class="form-control" placeholder="USERNAME" name="user">
		<span class="glyphicon glyphicon-user form-control-feedback"></span>
	   </div>
	   <div class="form-group has-lock has-feedback">
		<input type="password" class="form-control" placeholder="PASSWORD" name="pass">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	   </div>
	   <input type="submit" class="btn btn-info" name="submitin" value="LOGIN" style="font-family:chiller;font-style:bold;"><br>
	   <?php login();?>
	   </form>
	   <!--form ended-->
	   </div>
	   
	  </div>
	  
	  </div>
	  <div class="contact">
	  <p>Call Me On Or Whatsapp Me On : </p>
	  <h4><span class="glyphicon glyphicon-earphone">&nbsp;254 700145432</span></h4>
	  <p>Also mail please for more info:</p>
	  <button class="btn btn-success"><a href="mailto:0700145432" style="color:white;text-decoration:none;">CALL</a></button >
	  <button class="btn btn-info"><span class="glyphicon glyphicon-envelope">&nbsp;</span><a href="mailto:nevilross2@gmail.com" style="color:white;text-decoration:none;">MAIL</a></button >
	  <button class="btn btn-danger" id="cancel">CANCEL</button >
	  </div>
	  
	  <div id="createaccount">
	  <button class="btn btn-default" id="crete">CREATE ACCOUNT</button>
	  <span id="close_remove" class="glyphicon glyphicon-remove" style="cursor:pointer;float:right;color:red;font-size:1.5em;"></span>
	  <hr style="border-color;black;">
	  
	  <!----CREATE ACCOUNT FORM BELOW---->
	  <form class="form2" action="<?php $_PHP_SELF; ?>" method="POST" style="margin:10px 0px 0px 0px;" id="classform" >
	  <div class="form-group">
		<input type="text" class="form-control" name="firstname" placeholder="FIRSTNAME">
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" name="lastname" placeholder="LASTNAME">
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" name="username" placeholder="USERNAME">
	  </div>
	   <div class="form-group">
		<input type="password" class="form-control" name="password" placeholder="PASSWORD">
	  </div>
	  <div class="form-group">
		<input type="password" class="form-control" name="password2" placeholder="CONFIRMPASSWORD">
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" name="country" placeholder="COUNTRY">
	  </div>
	  <div class="form-group">
		<input type="text" class="form-control" name="city" placeholder="CITY">
	  </div>
	   <div class="form-group">
		<input type="number" class="form-control" name="number" placeholder="PHONE NUMBER">
	  </div>
	  <div class="form-group">
		<input type="email" class="form-control" name="email" placeholder="EMAIL">
	  </div>
	   <input type="submit" class="btn btn-info" name="submit" value="CREATE ACCOUNT" style="font-family:chiller;font-style:bold;">
	   
	  </form>
	  </div>
	  <div class="col-sm-2">
	  </div>
	  
	  </div>
	  <footer>
	  
	   <div class="row" ">
	  <div class="col-sm-2"> 
	  
	  </div>
	  <div class="col-sm-8">
	   <div class="row" style="background:white;">
	   <hr>
	  <div class="col-sm-2"> 
	  
	  </div>
	  <div class="col-sm-8">
	  <div class="col-sm-6">
	  <h5>Follow us on </h5>
	  <img src="icons/email.png" width="50" height="50" title="GMAIL" class="img">
	  <img src="icons/fb.png" width="50" height="50" title="FACEBOOK" class="img">
	  <img src="icons/twitter2.png" width="50" height="50" title="TWITTER" class="img">
	  <img src="icons/instagram.png" width="50" height="50" title="INSTAGRAMN" class="img">
	  </div>
	  
	  <div class="col-sm-6">
	  <h5><a href="#" style="color:blue;">About arts page</a></h5>
	  <h5><a href="#" style="color:blue;">contact us </a></h5>
	  <h5><a href="#" style="color:blue;" >faq</a></h5>
	  <h5"><a href="#" style="color:blue;">art's page news</h5></a>
	  </div>
	  
	  </div>
	  <div class="col-sm-2"> 
	  
	  </div>
	  </div>
	  </div>
	  <div class="col-sm-2">
	  </div>
	  </div>
	  </footer>
	  
	  </div>
  </body>
</html>