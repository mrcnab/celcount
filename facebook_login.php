<?php
session_start();
define('YOUR_APP_ID', '452925158108920');
define('YOUR_APP_SECRET', '80458df25637e8693e2d9b769baf83aa');

function get_facebook_cookie($app_id, $app_secret) { 
    $signed_request = parse_signed_request(@$_COOKIE['fbsr_' . $app_id], $app_secret);
    // $signed_request should now have most of the old elements
    $signed_request['uid'] = $signed_request['user_id']; // for compatibility 
    if (!is_null($signed_request)) {
        // the cookie is valid/signed correctly
        // lets change "code" into an "access_token"
  // openssl must enable on your server inorder to access HTTPS
        $access_token_response = file_get_contents("https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=&client_secret=$app_secret&code={$signed_request['code']}");
        parse_str($access_token_response);
        $signed_request['access_token'] = $access_token;
        $signed_request['expires'] = time() + $expires;
    }
    return $signed_request;
}

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
  return base64_decode(strtr($input, '-_', '+/'));
}

if (isset($_COOKIE['fbsr_' . YOUR_APP_ID]))
{ 
$cookie = get_facebook_cookie(YOUR_APP_ID, YOUR_APP_SECRET);

$user = json_decode(@file_get_contents(
    'https://graph.facebook.com/me?access_token=' .
    $cookie['access_token']));
 
/*
Uncomment this to show all available variables
echo "<pre>";
 - print_r function expose all the values available to get from facebook login connect.
print_r($user);
 1. Save nessary values from $user Object to your Database
 2. Register a Sesion Variable based on your user account code
 3. Redirect to Account Dashboard
echo "</pre>";
*/
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facebook Login Connect for Website Demo</title>
<style type="text/css">
body,td,th {
 font-family: Verdana, Geneva, sans-serif;
 font-size: 14px;
 color: #333;
}
body {
 margin-left: 50px;
 margin-top: 50px;
}
</style>
</head>
<body>
<?php if (@$cookie) { ?>
<h2>Welcome <?= $user->name ?> </h2> <br />
E-mail ID: <?= $user->email ?>
<br />
<a href="javascript://" onclick="FB.logout(function() { window.location='facebook-login.php' }); return false;" >Logout</a>
<?php } else { ?>
<h2>Welcome Guest! </h2>    
<div id="fb-root"></div>
<fb:login-button perms="email" width="width_value" show_faces="true" autologoutlink="true" size="large">Login with Facebook</fb:login-button>
<?php } ?>


<script src="http://connect.facebook.net/en_US/all.js"></script>   
<script>
 // Initiate FB Object
 FB.init({
   appId: '<?= YOUR_APP_ID ?>', 
   status: true,
   cookie: true, 
   xfbml: true
   });
 // Reloading after successfull login
 FB.Event.subscribe('auth.login', function(response) { 
 window.location.reload(); 
 });
</script>
</body>
</html>