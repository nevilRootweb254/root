<?php
/*header('content-type: image/jpeg');
if(isset ($_GET['source'])){
	$source = $_GET['source'];

$edited = imagecreatefrompng('72.png');
$width = imagesx($edited);
$height = imagesy($edited);

$image = imagecreatetruecolor($width,$height);
$image = imagecreatefromjpeg($source);

$imagesize = getimagesize($source);
$x = $imagesize(0) - $width-10;
$y = $imagesize(1) - $height-10;

imagecopymerge($image ,$edited ,$x ,$y,0,0,$width,$height,0,50);
imagejpeg($image);

}
*/
?>
<?php
//header('content-type: image/jpeg');

if(isset($_GET['image'])){
	$image = $_GET['image'];
	$image_size = getimagesize($image);
    $image_width = $image_size[0];
	$image_height = $image_size[1];
	
	$new_size = ($image_width + $image_height)/($image_width*($image_height/45));
	$newwidth = 250;
	$newheight = 250;
	
	$new_image = imagecreatetruecolor($newwidth,$newheight);
	$old_image = imagecreatefromjpeg($image);
	
	imagecopyresized($new_image,$old_image,0,0,0,0,$newwidth,$newheight,$image_width,$image_height);
	imagejpeg($new_image, $image.'thumb.jpg');
}
echo '<div id="imges" class="col-lg-12">

<div id="close">
<a href="#" title="close" id="btn2" class="resposive"><span class="glyphicon glyphicon-remove-circle"></span></a><br>
</div>
<h3>my gallary</h3>
       <div class="col-lg-4" style="background:ligtgreen;">
       <img src="images/003.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext" class="responsive">
	   <ul class="resposive">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" id="view">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/002.jpgthumb.jpg." class="img-responsive img-thumbnail"  style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" id="viewee">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/001.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext" class="hover-primary">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" id="views">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
       <img src="images/003.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" >view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/002.jpgthumb.jpg." class="img-responsive img-thumbnail"  style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/001.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/001.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   
	   <div class="col-lg-4">
	   <img src="images/002.jpgthumb.jpg." class="img-responsive img-thumbnail"  style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   
      </div>
'
      
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="media.css">
	<link type="image.jpg" href="uploads/art2.jpg" rel="icon">
    <link href="art.jpg" rel="icon" type="image/png">
    <!--<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="jqscript.js"></script>
    <title>Art Gallary And Auctioning</title>
	<style>
	#imges{
		width:500px;
		background:khaki;
		height:650px;
		margin:10px auto;
		display:none;
		left:-500;
		overflow:auto;
		
	}
	#imgesed{
		width:500px;
		background:khaki;
		height:650px;
		margin:10px auto;
		display:non;
		top:-700;
		overflow:auto;
		
	}
	#imgtext ul{
		list-style-type:none;
		
	}
	#imgtext li{
		cursor:pointer;
		height:30px;
		text-align:center;
		
	}
	#imgtext li:hover{
		background:lightblue;
		color:black;
	}
	#imgtext a:hover{
		background:lightblue;
		color:black;
		
	}
	#imgtext a{
		text-decoration:none;
		height:30px;
		line-height:30px;
	}
	#imgtext{
		background:white;
	}
	#btnbtn{
		-webkit-transform:rotate(270deg);
		transform:rotate(270deg);
		top:250;
		position:absolute;
		left:-10;
	}
	#btn2 a{
		text-decoration:none;
		color:black;
	}
	#btn3 a{
		text-decoration:none;
		color:red;
		padding:5px;
	}
	#btn3{
		float:right;
	}
	#closed{
		color:black;
		padding:5px;
		font-size:1.5em;
	}
	#closed span{
		color:black;
	}
	#close span{
		color:red;
	}
	#close{
		color:red;
		padding:5px;
		padding-left:450px;
		position:fixed;
		font-size:2em;
	}
	a:target[title]{
		color:red;
	}
	#viewed{
		background:crimson;
		height:400px;
		width:400px;
		z-index:1;
		position:absolute;
		left:40%;
		top:60px;
		border-radius:10px solid black;
		overflow:auto;
	}
	</style>
	<script>
	$(document).ready(function(){
		$('#btnbtn').click(function(){
			$('#imges').show();
			$('#imges').animate({left:'0px'},"slow");
			$('#btnbtn').hide();
			$('#btnbtn2').show();
			$('#btnbtn2').animate({left:'500px'},600);
		});
		$('#btn2').click(function(){
			$('#imges').animate({left:'-500px'},"slow");
			$('#btnbtn').fadeIn(1000);
			$('#btnbtn').animate({left:'px'},600);
			$('div').clearQueue()
		});
		$('#view').click(function(){
			$('#cool').show();
			$('#cools').hide();
			$('#cooled').hide();
			$('#viewed').fadeIn(1000);
		});
		$('#viewee').click(function(){
			$('#cool').hide();
			$('#cools').hide();
			$('#cooled').show();
			$('#viewed').fadeIn(1000);
		});
		$('#views').click(function(){
			$('#cool').hide();
			$('#cooled').hide();
			$('#cools').show();
			$('#viewed').fadeIn(1000);
		});
		$('#btn3').click(function(){
			$('#viewed').fadeOut(1000);
		});
		$('#left').click(function(){
			$('#viewed').animate({left:'20px'},600);
		});
		$('#right').click(function(){
			$('#viewed').animate({left:'40%'},600);
		});
	});
	</script>
</head>
<body>
<div id="btn">
<button type="button" class="btn btn-default " id="btnbtn">PROFILE PICS</button>
<div id="viewed" class="col-lg-12" style="background:white;display:none;">

<div id="closed">
<button type="button" class="btn btn-warning" style="float:left;" id="left"><span class="glyphicon glyphicon-chevron-left" ></button>
<button type="button" class="btn btn-warning" style="float:left;margin-left:3px" id="right"><span class="glyphicon glyphicon-chevron-right" ></button>
<a href="#" title="close" id="btn3" class="resposive"><span class="glyphicon glyphicon-remove-circle"></span></a><br>
</div>
<div class="col-lg-12 " style="">
<br>
<img src="images/003.jpg" class="img-responsive img-thumbnail" id="cool" style="border:1px solid black;display:none;">
<img src="images/002.jpg" class="img-responsive img-thumbnail" id="cooled" style="border:1px solid black;display:none;">
<img src="images/001.jpg" class="img-responsive img-thumbnail" id="cools" style="border:1px solid black;display:none;">
</div>

<div class="col-lg-4"style="padding-top:10px;">
<button type="button" class="btn btn-primary"> likes</button>
</div>
<div class="col-lg-4"style="padding-top:10px;">
<button type="button" class="btn btn-warning">dislikes</button>
</div>
<div class="col-lg-4"style="padding-top:10px;">
<button type="button" class="btn btn-link">delete</button>
</div>
<div class="col-lg-4"style="padding-top:10px;">
<button type="button" class="btn btn-primary">repost</button>
</div>

<div class="col-lg-8"style="padding-top:10px;">
<button type="button" class="btn btn-link">view all comments</button>
</div>

<form class="form-group">
<div class="col-lg-8"style="padding-top:10px;">
<input type="text" class="form-control" placeholder="comment"></div>
<div class="col-lg-4"style="padding-top:10px;">
<input type="submit" class=" btn btn-success" value="comment">
</div>
</form>
<br>


</div>
<div id="imgesed" class="col-lg-12">

<div id="closest">
<a href="#" title="close" id="btn4" class="resposive"><span class="glyphicon glyphicon-remove-circle"></span></a><br>
</div>
<h3>my gallary</h3>
       <div class="col-lg-4" style="background:ligtgreen;">
       <img src="images/003.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext" class="responsive">
	   <ul class="resposive">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" id="view">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/002.jpgthumb.jpg." class="img-responsive img-thumbnail"  style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" id="viewee">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/001.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext" class="hover-primary">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" id="views">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
       <img src="images/003.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#" >view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/002.jpgthumb.jpg." class="img-responsive img-thumbnail"  style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/001.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   <div class="col-lg-4">
	   <img src="images/001.jpgthumb.jpg." class="img-responsive img-thumbnail" style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   
	   <div class="col-lg-4">
	   <img src="images/002.jpgthumb.jpg." class="img-responsive img-thumbnail"  style="border-radius:0px;">
	   <div id="imgtext">
	   <ul class="">
	   <li><a href="#">+ profile</a></li>
	   <li><a href="#">delete</a></li>
	   <li><a href="#">view</a></li>
	   </ul>
	   </div>
	   </div>
	   
      </div>
</body>
</html>