<?php?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
    <link href="KINK 3.png" rel="icon" type="image/png">
    <!--<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="jqscript.js"></script>
    <title>Art Gallary And Auctioning</title>
	

  </head>
  <body onload="return ">
  
  <!---first popup--->
  	<div id="uploader" >
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
	 
	 <!--message beggining--->
	 <div id="massage" class="visible-lg">
	 <header style="width:600px; position:fixed;height:auto;left:300px;top:1px;background:black;color:white;">
	 <h6><b> ART CHAT</b></h6>
	 <p style="border-bottom:1px solid black;padding:bottom:3px;"><b>To : nevil art saul <?php?></b> <span style="color:green;">&nbsp;&nbsp;&nbsp;online now</span></p>
	 <br>
	 
	 </header>
	 <br>
	 <br>
	 <br>
	 
	 <div class="row">
	 <div class="col-sm-2" style="position:fixed;background:gray;color:white;padding:5px;top:120px;">
	  <img src="uploads/art2.jpg" class="img-rounded" width="100" height="100">
	  <br>
	  <ul id="nav-menu" >
		<li ><a href="#" class="NewChart">New Chart</a></li>
		<li class="NewMassage"><a href="#">New Massage</a></li>
		<li class="inbox"><a href="#">inbox</a></li>
		<li class="Spam"><a href="#">Spam</a></li>
	  </ul>
	 </div>
	 
	 <div class="col-sm-9" style="margin-left:230px;">
	 <div id="text">
	 <p >your  arts are  cool bro</p>
	 </div>
	 <div id="reply">
	 <p >Oh  bro haha i thought it was relly cool budy;</p>
	 </div>
	 <div id="text">
	 <p>ha no you are kidding bro u dont know</p>
	 </div>
	  <div id="reply">
	 <p >realy nigah!</p>
	 </div>
	 <div id="text">
	 <p>y dont you teach me bro al pay</p>
	 </div>
	 <div id="reply">
	 <p >realy nigah!</p>
	 </div>
	 <div class="mmh">
	 <form class="form-group" action="" method="">
	 <br>
	   <div class="form-group has-upload has-feedback" >
	   <input type="text" class="form-control" placeholder="REPLY" name="reply">
	   <span class="glyphicon glyphicon-paperclip form-control-feedback" title="attach"><a href="#"></a></span>
	   </div>
	   </form>
	   </div>
	 </div>
	 </div>
	 
	 </div>
	 
	 <!--/end of message bar-->
	</div>
	<span id="confirm" class="glyphicon glyphicon-ok" style="color:green;font-size:3em;z-index:1;position:absolute;top:10px;left:10px;"></span>
	<!--end of first pop up-->
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
	<!---second popup--->
	
	<!--end of first pop up-->
	<div class="container-fluid"style="margin:1px auto;padding-top:20px;">
	<!---row beggining--->
	
	<div class="row" style="margin:0px 6px;">
	<div class="col-sm-2" style="height:500px;background:white;padding-top:6px;margin-right:5px;">
	<a href="account.php" title="HOME" style="text-decoration:none;"><span class="glyphicon glyphicon-home" ></span></a>&nbsp;&nbsp;&nbsp;
	<a href="#" title="MASSAGE" style="text-decoration:none;" class="mess"><span class="glyphicon glyphicon-envelope"  ></span></a>&nbsp;&nbsp;&nbsp;
	<a href="#" title="NOTIFICATIONS" style="text-decoration:none;"><span class="glyphicon glyphicon-bell" ><sup style="color:red;">1</sup></span></a>&nbsp;&nbsp;&nbsp;
	<a href="#" title="MY GALLARY" style="text-decoration:none;"><span class="glyphicon glyphicon-picture" ></span></a>&nbsp;&nbsp;&nbsp;
	<a href="#" title="UPLOAD ART" style="text-decoration:none;" class="upload"><span class="glyphicon glyphicon-upload" ></span></a>&nbsp;&nbsp;&nbsp;
	<a href="#" title="LOGOUT" style="text-decoration:none;"><span class="glyphicon glyphicon-off"></a></span><br><br>
	<!--inner row for profile system-->
	
	<img src="uploads/art.jpg" class="img-circle" width="140" height="140"><br></br>
	<!---beginning of progress 1-->
<div id="progress1">
  <h6>profile completed:</h6>
  <div class="progress"class="hide">
    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%" >
      30% profile Complete(danger)
    </div>
</div>
<!---end of progress 1-->



  </div>
	<button	class="btn btn-link" type="button">edit profile</button><br>
	<button	class="btn btn-link" type="button">change pic profile</button> <br>
	<button	class="btn btn-link" type="button">likes &nbsp;<span class="badge">10000</span></button><br>
	<button	class="btn btn-link" type="button">unlikes &nbsp;<span class="badge">10</span></button> 
	</br>
	
	<!--end-->
	
	
	
	<button	class="btn btn-link" type="button">my videos</button> 
	</div>
	<div class="col-sm-6" style="background:white;margin-right:4px;">
   
	   <h1>my posts</h1>
	  
	   <img src="uploads/art2.jpg" class="img-responsive" width="400" height="400">
	 </div>
	 <div class="col-sm-2" style="padding-top:20px;background:white;">
	    <form class="form-group" action="" method="" >
	   <div class="form-group has-search has-feedback">
	   <input type="search" class="form-control" placeholder="SEARCH" name="search">
	   <span class="glyphicon glyphicon-search form-control-feedback"></span>
	   </div>
	   </form>
	   <p><a href="#">result</a></p>
	   
	   </div>
	<aside class="visible-lg" style="float:left;width:180px;padding:0px 10px;background:transparent;">
	<h4 style="border-bottom:1px solid white;font-family:chiller;color:lightblack"id="h-w"><strong>NOTIFICATION&nbsp;<span class="glyphicon glyphicon-bell">.</span></strong></h4>
	<div id="">
	<button type="button" class="btn btn-success">Trending arts</button>
	</div>
	</aside>
	</div>

	</div>
	  
    
</body>
</html>