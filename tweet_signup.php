<?php

require 'src/facebook.php';

$facebook = new Facebook(array(
    'appId'  => '452925158108920',
    'secret' => '80458df25637e8693e2d9b769baf83aa',
));

$user = $facebook->getUser();

if ($user) {
    try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

if ($user) {
    $logoutUrl = 'logout.php';
} else {
    $loginUrl = $facebook->getLoginUrl();
}



// Get User ID
$user = $facebook->getUser();
if ($user) {
    try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

if ($user) {
    $logoutUrl = 'logout.php';
} else {
 $loginUrl = $facebook->getLoginUrl();
	 
    //$loginUrl = "https://www.facebook.com/dialog/oauth?client_id=452925158108920&redirect_uri=http%3A%2F%2Fcelcount.wmedesigns.com.au%2Findex.php&state=627f8ae507237bf56d64063dbf2d1e5a";

}

$larry = $facebook->api('/larryrubin');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Celcount Home Page</title>
<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/oauthpopup.js"></script>


<script language="javascript" type="application/javascript">
function emptyuser() {
	document.getElementById('username').value = '';
	}
function emptypass() {
	document.getElementById('password').value = '';
	}
	
</script>
</head>
<body>
<div id="header" >
  <div id="header_content">
    <div id="logo_con"><a href="index.php"> <img src="images/logo.png" alt="Celcount Logo"  /></a> </div>
    
  </div>
  
</div>
<div id="content" >
  <div id="sign_up">
    <div id="sign_right" style="clear:both; float:right; height:314px; width:610px;">
      <div class="leftsignup" style="float:left; margin-left:185px; margin-top:120px; width:295px;"> <a href="./redirect.php"><img src="images/twitter_sign.png" alt="Sign Up With Twitter Here"  /></a> </div>
      <div id="fb_sign" style="clear:both; float:right; width:295px;margin-top:-97px;"> 
     
    </div>

  </div>
  <div id="login_button" style="text-align:right; margin-right:10px;clear: both;">
<a href="login.php">  <img src="images/login.png" /></a>
  </div>
</div>
</div>
<div id="footer">
      
</div>
</body>
</html>