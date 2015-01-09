<?php 
require_once('config.php');
	include_once("configuration/common.php");
    include_once("classes/Login.class.php");
	$objLogin=new Login();
	$error= " ";


if (CONSUMER_KEY === '' || CONSUMER_SECRET === '') {
  echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://twitter.com/apps">https://twitter.com/apps</a>';
  exit;
} 
if($_POST){

		$username=mySqlSafe($_POST['username']);
	if(empty($username))
		{
			$error="Login Required<br />";
		}
		if(empty($_POST['password']))
        	{
			$error.="Password Required<br />";
		    }
		else
		{
			$objLogin->fnSetLogin($username);
			$objLogin->fnSetPassword
           (base64_encode($_POST['username']));
    		$sql=$objLogin->fnLogin(TBL_USERS);
			if($db->query($sql) && $db->get_num_rows() > 0)
			{
			$row = $db->fetch_row_assoc();
//			$_SESSION['AdminId'] = $row['id'];
//            $_SESSION['AdminName'] = $row['username'];
//			session_write_close();
            $db->close();
			session_start();
            // store session data
            $_SESSION['user']= $username;
            echo "<script language=\"javascript\">window.location = 'index.php';</script>";
			exit();
			}
            else
			{
					$error.="Invalid username or password";
			}
 		}
		
	}

/* Build an image link to start the redirect process. */

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Celcount Home Page</title>
<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css">
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
<div id="content">
   <div class="signup">
    <div class="leftsignup">
     <a href="./redirect.php"><img src="images/twittersign.png" alt="Sign Up With Twitter Here"  /></a>
    </div>
    <div class="rightsignup">
    <form action="" method="post" name="sign up">
    <input type="text" name="username" id="username" value="username:" onfocus="emptyuser();"  />
    <input type="password" name="password" id="password" value="password" onfocus="emptypass();"  />
    <button type="submit" name="signup_submit" />
    </form>
    </div>
    <div style="clear:both;color:red;float:left;margin-left:170px;">
    <?php echo $error;?>


    </div>
   </div>
   
   
</div>

<div id="footer">
      
</div>
</body>
</html>