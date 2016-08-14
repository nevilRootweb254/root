<?php
session_start();
session_destroy();
$expirytime = time()-60*60*72;
setcookie ("id",'',$expirytime,"","","",TRUE);
setcookie ("username",'',$expirytime,"","","",TRUE);
setcookie ("age",'',$expirytime,"","","",TRUE);
setcookie ("profile",'',$expirytime,"","","",TRUE);
setcookie ("email",'',$expirytime,"","","",TRUE);
setcookie ("phone_number",'',$expirytime,"","","",TRUE);
setcookie ("sex","",$expirytime,"","","",TRUE);
setcookie ("country","",$expirytime,"","","",TRUE);
setcookie ("city","",$expirytime,"","","",TRUE); 
setcookie ("art_type","",$expirytime,"","","",TRUE);
setcookie ("art_description","",$expirytime,"","","",TRUE);
$_redirect = 'index.php';
if(session_destroy){
	header('location:'.$_redirect);
}else{
	header('location:'.$_redirect);
}
?>