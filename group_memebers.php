<?php
 	include("inc/ini.php");
	$groupId	=	$_REQUEST['group_id'];	 
	$groupDetail=	$content_obj->getGroupByGroupId($groupId);
	//print_r($groupDetail);
	$allusers	=	$content_obj->getAllUserIdsByGroupId($groupId);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$groupDetail['group_title']?> Members | CelCount</title>
	<?php include("inc/header_tags.php"); ?>
</head>

<body>
	<?php include("inc/header.php"); ?>
<div id="content">
  <div id="banner">
    <h2><?=$groupDetail['group_title']?> Members  <span>| CELCOUNT<img src="images/star.png" alt="Star" /></span></h2>
    <h3>Members Detail</h3>
  </div>
  <div class="clear"></div>
  <div class="cmparison_wrap full-width">
    <div class="favorities_group" style="width:auto;">
    <? if($allusers) 
		foreach($allusers as $users){
			$userDetail	=	$content_obj->getUserDetailsByUserId($users['user_id']);			
			$userId	=	$userDetail['id'];
			$userName	=	$userDetail['username'];
			if($userDetail['profile_image']){
				$userImage	=	$userDetail['profile_image'];	
			}else{
				$userImage	=	$content_obj->resize('noimage.jpg',53,52);
			}
	?>
    <div class="fav-group">
    <div class="ProfileImageHolder"><img src="<?=$userImage?>" alt="pimg" /></div>
    <strong class="titleuser"><?=$userName?></strong>
    <a class="show_members" href="member_detail.php?member_id=<?=$userId?>">Member Detail</a>
    <a class="addtofavorities" href="#">Add to Favorities</a>
    </div>
    <? } ?>
    </div>
    
    </div>
	<?php include("inc/footer.php"); ?>
</body>
</html>