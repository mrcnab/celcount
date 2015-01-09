<?php
 
$app_id = "452925158108920";
$app_secret = "80458df25637e8693e2d9b769baf83aa";
$my_url = "http://celcount.wmedesigns.com.au/mytestindex.php";
$scope="email";
 
$code = $_REQUEST["code"];
 
if(empty($code)) {
$dialog_url = "http://www.facebook.com/dialog/oauth?client_id="
. $app_id . "&redirect_uri=" . urlencode($my_url)."&scope=".$scope;
 
echo("<script> top.location.href='" . $dialog_url . "'</script>");
}
 
$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
. $app_id . "&redirect_uri=" . urlencode($my_url) . "&client_secret="
. $app_secret . "&code=" . $code;
 
$access_token = file_get_contents($token_url);
 
$graph_url = "https://graph.facebook.com/me?" .$access_token;
 
$user = json_decode(file_get_contents($graph_url));
 
if($user->email) {
 
// Code to handle successful authentication. 
echo("$user->name:  - $user->email  - authorized -signing in now...");
// Take user to main page.
echo "<script> setTimeout(function(){window.location='/'}, 3000);</script>";
}
else {
 
// Code to handle failure or refusal.
 
echo "Something went wrong while trying to authorize your account with Facebook.";
}
?>