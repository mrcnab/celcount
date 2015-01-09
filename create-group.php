<?php 
ob_start();
session_start();
	include_once("configuration/common.php");
    include_once("classes/Login.class.php");
    include_once("classes/User.class.php");
	require 'src/facebook.php';
    require_once('twitteroauth/twitteroauth.php');
    require_once('config.php');
 include("inc/ini.php");
$randomName	=	strtotime(date('Y-m-d H:i:s'));
$facebook = new Facebook(array(
    'appId'  => '452925158108920',
    'secret' => '80458df25637e8693e2d9b769baf83aa',
));

$user = $facebook->getUser();
if($user == '0'){
	    header("Location: http://celcount.wmedesigns.com.au/signup.php");
}
$userDetails	=	$content_obj->getUserIdByFaceBookId($user);
$userID	=	$userDetails['id'];
if(isset($_POST['btnSubmit'])){
		$group_title	=	$_POST['group_title'];
		$group_type  =	$_POST['group_type'];
		$group_image		=	$_FILE['group_image'];	
		$uploaddir = "image/data/";
		$photo = $uploaddir . str_replace(" ", "", $randomName.$_FILES['group_image']['name']);
		$photo1 = "data/". str_replace(" ", "", $randomName.$_FILES['group_image']['name']);

		move_uploaded_file( $_FILES['group_image']['tmp_name'], $photo ) ;
		$group_init	=	substr($group_title,0,1);
		$addGroup	=	$content_obj->addGroup($group_title, $group_init, $group_type, $photo1,$userID);
		
		if($addGroup == TRUE){		
			$msg	=	"<div class='good_msg'>You group added successfully.</div>";
		}else{
			$msg	=	"<div class='bad_msg'>There is some error, Please try again.</div>";			
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Celcount | Welcome <?php echo $data_array[0]['username'] ?></title>
	<?php include("inc/header_tags.php"); ?>
</head>

<body>
	<?php include("inc/header.php"); ?>
    <div id="content">
<div class="creat-group">

  <div id="banner">
    <h2>Creat a Group <span>| CELCOUNT<img src="images/star.png" alt="Star" /></span></h2>
    <h3>Creat a Group</h3>
  </div>
  <div class="cap">
  <?=$msg;?>
  <form action="create-group.php" method="post"  enctype="multipart/form-data">
    <ul>
    <li><input name="group_title" type="text" value="Group Title:" onclick="this.value=''" /></li>
    <li><select name="group_type">
    <option>Group Type</option>
    <option value="Global">Global</option>
    <option value="Work">Work</option>
    <option value="My Gang">My Gang</option>
     </select></li>
    <li>Upload Image: &nbsp; <input style="width:150px; background: none repeat scroll 0 0 #FFFFFF; border: 2px solid #AEDADF !important;" class="textBox" name="group_image" type="file" size="55" height="40" width="200"  /></li>
    <li><input name="btnSubmit" id="btnSubmit" type="submit" class="btn" value="Create" style="float:left;" /></li>
    </ul>
     </form>
  </div>
  
   
  <div class="user_info_wrap">
    
	<?php include("inc/news.php"); ?>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div id="banner_bottom">
    <h2 style="float:left;width:190px; font-size:12px;color:#065f69;margin-left:195px;margin-top:10px;">Keep track of the popularity
      of the most important person
      in the world<span style="color:#5db809;">... you!!!</span></h2>
    <div id="ban_right" style="float:right;margin-right:60px;margin-top: 10px;">
      <p style="font-size:10px;"> Matthew, Carlos Cee and 3 others use CelCount.</p>
      <img src="images/img1.png" alt="image 1" /> <img src="images/img2.png" alt="image 1" /> <img src="images/img3.png" alt="image 1" /> <img src="images/img4.png" alt="image 1" /> <img src="images/img5.png" alt="image 1" /> <img src="images/img6.png" alt="image 1" /> </div>
  </div>
</div></div>
	<?php include("inc/footer.php"); ?>
</body>
</html>