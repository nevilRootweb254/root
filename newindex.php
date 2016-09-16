<?php
include('datasub.php');

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
			echo '<meta http-equiv="refresh" content="1;url=home.php"' ;
		}
			   }else{
                    echo'<p><i class="fa fa-warning" id="warning"> </i> error wrong username or password</p><i class="fa fa-spinner" id="spin"></i>';
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.theme-css">
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
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
      <style>
          #warning{
              animation:warn 1s infinite linear.
          } 
          #spin{
              animation: spin 1s infinite linear ;
          }
          @keyframes spin{
              100%{
                  transform: rotate(360deg);
              }  
          }
        @keyframes warn{
            100%{
                color:red;
            }
          }
      </style>
   
    <title>Art Gallary And Auctioning</title>
</head>
<body style="background:ghostwhite;">
<div class="container-fluid" style="background:ghostwhite;">

<section class="row">
<div class="col-sm-4">
</div>
<div class="col-sm-4">

<div class="row">
<div class="col-lg-2">
</div>
<div class="col-lg-8 " style="padding-left:10px;padding:10px;">
<center>
<img src="images/art2.jpg" width="100" height="100" class="img-circle" style="margin-top:20px;margin-bottom:10px;">
<h4 style="font-family:calibrilight;">Sign In To ArtG</h4>
</center>
<div class="thumbnail" style="padding:20px;border:1px solid silver;" >
<form role="form" action="newindex.php" method="POST" id="form_new">
<div class="form-group has-user has-feedback">
<label for="login|_field">Username or email address.</label>
<input type="text" class="form-control" placeholder="USERNAME OR EMAIL ADDRESS..." name="user" id="user">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-lock has-feedback">
<label for="password">Password.</label>
<input type="password" class="form-control" placeholder="PASSWORD..." name="pass" id="pass">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<input type="submit" class="btn btn-block btn-success" name="submitin" value="LOGIN" style="font-family:chiller;font-style:bold;"><br>
<?php login();?>
</form>
</div>

<div class="thumbnail" style="padding:15px;background:ghostwhite;border:1px solid silver;">
<center>
<p> New to ArtGallery? 
<a href="index.php">create an account.</a></p>
</center>
</div>


</div>
<div class="col-lg-2"  id="">

</div>
</div>


</div>
<div class="col-sm-4">
</div>
</section>
<footer class="row">
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<!---->
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<center style="color:darkgray;">
<a href="#" style="color:black;padding-left:5px;"><i class=""> Terms</i></a>
<a href="#" style="color:black;padding-left:5px;"><i class="">  Contact Us</i></a>
<a href="#" style="color:black;padding-left:5px;"><i class=""> about ArtG</i></a>
<a href="#" style="color:black;padding-left:5px;"><i class=""> FAQs</i></a>
<br>
<br>
</center>
</div>
<div class="col-sm-2">
</div>
</div>
<!----->
</div>
<div class="col-sm-4">
</div>
</footer>
</div>

<!-- footer Start
        ====================================================================== -->

        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="footer-contant">
                                <h3>Follow us , Get In Touch.</h3>
                                <div class="social-icon">
                                    <a href="#" title="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" title="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" title="google"><i class="fa fa-google"></i></a>
                                    <a href="#" title="flickr"><i class="fa fa-flickr"></i></a>
                                    <a href="#" title="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" title="youtube"><i class="fa fa-youtube"></i></a>
                                </div>
                                <div class="support-link">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-phone"></span> Contact</a></li>
                                        <li><a href="#"><span class="fa fa-question"></span> FAQ's</a></li>
                                        <li><a href="#" ><span class="fa fa-file"></span> Support</a></li>
                                        <li><a href="#"> <span class="fa fa-desktop"></span> Developers</a></li>
                                        <li><a href="#"><span class="fa fa-key"></span> Privacy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </section><!-- #footer -->
<div id="help-btn">
<li class="fa fa-chevron-down"> HELP</li>
</div>
<div id="feed">
<h5 id="backward" class="fa fa-chevron-up" style="float:right;margin-top:-5px;cursor:pointer;"></h5>
<br>
<h5 class="title" >Ask you Question?...</h5>

<form class="form-group" >
<label>EMAIL : </label>
<input type="text" name="email" placeholder="example@mail.com" class="form-control"><br>
<label>USERNAME : </label>
<input type="text" name="USERNAME" placeholder="USERNAME" class="form-control"><br>
<label>QUESTION</label>
<textarea class="form-control" placeholder="Ask you Question?..."></textarea><br>

<button class="btn btn-block btn btn-success">submit <li class="fa fa-done_all"></li></button>
</form>
</div>
<!---script configuration---->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery.js"></script>
<script src="jqscript.js"></script>
<script src = "respons.art.js"></script>
<!---end of script configuration------->
</body>
</html>