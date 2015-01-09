<?php
//error_reporting(0);
session_start();
	include_once("configuration/common.php");
    include_once("classes/Login.class.php");
    include_once("classes/User.class.php");
	require 'src/facebook.php';
    require_once('twitteroauth/twitteroauth.php');
    require_once('config.php');
	include("inc/ini.php");
		
	$facebook = new Facebook(array(
    'appId'  => '452925158108920',
    'secret' => '80458df25637e8693e2d9b769baf83aa',
));



	$memberId	=	$_REQUEST['member_id'];
	$userDetails	=	$content_obj->getUserDetailsByUserId($memberId);

	$fbId			=	$userDetails['fb_id'];

	$getFbMovementLast	=	$content_obj->getSecondFbMovement($fbId);
	$getFbMovement	=	$content_obj->getFbMovement($fbId);

	$lastFbCount	=	$getFbMovementLast['fb_count'];
	$currentFbCount	=	$getFbMovement['fb_count'];
	if($currentFbCount > $lastFbCount ){
		$socialChange	=	$currentFbCount - $lastFbCount;
		$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/green_arrow.png" width="18" alt="" /> <strong>'.$socialChange.'</strong> </div>';
	}else if($currentFbCount < $lastFbCount ){
		$socialChange	=	$lastFbCount - $currentFbCount;
		$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/red_arrow.png" width="18" alt="" /> <strong>'.$socialChange.'</strong> </div>';
	}else{
		$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/black_box.png" width="18" alt="" /></div>';
	}
	
	
	$getTwitterMovement	=	$content_obj->getTwitterMovement($userDetails['tweet_id']);
	$lastTwitterCount	=	$getTwitterMovement['twitter_count'];
	$getTwitterMovementFirst	=	$content_obj->getFirstTwitterMovement($userDetails['tweet_id']);
	$currentTwitterCount	=	$getTwitterMovementFirst['twitter_count'];
 if($currentTwitterCount > $lastTwitterCount ){
		$socialChangeTwitter	=	$currentTwitterCount - $lastTwitterCount;
		$twitterMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/green_arrow.png" width="18" alt="" /> <strong>'.$socialChangeTwitter.'</strong> </div>';
	}else if($lastTwitterCount > $currentTwitterCount ){
		$socialChangeTwitter	=	$lastTwitterCount - $currentTwitterCount;
		$twitterMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/red_arrow.png" width="18" alt="" /> <strong>'.$socialChangeTwitter.'</strong> </div>';
	}else{
		$twitterMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/black_box.png" width="18" alt="" /></div>';
	}



	$celCountCurrent	=	$currentFbCount + $currentTwitterCount;
	$celCountLast	   =	$lastFbCount + $lastTwitterCount;
	
	if($celCountCurrent > $celCountLast){
		$celCountUp	=	$celCountCurrent - $celCountLast;
		$celCount	=	'<div class="celcount_up"> <img src="images/green_arrow.png" alt="" /> UP '.$celCountUp.' </div>';	
	}else if($celCountLast > $celCountCurrent){
		$celCountDown	=	$celCountLast - $celCountCurrent;
		$celCount	=	'<div class="celcount_up"> <img src="images/red_arrow.png" alt="" /> Down '.$celCountDown.' </div>';
	}else{
		$celCount	=	'<div class="celcount_up"> <img src="images/black_box.png" alt="" /></div>';
	}

	$getTotalUsers	=	$content_obj->getTotalUsersCount();
	$getUserId	=	$content_obj->getUserIdByFaceBookId($fbId);	
	$favouriteGroups  =	$content_obj->getUserFavouriteGroups($memberId); 	
	$favouriteUsers  =	$content_obj->getUserFavouriteUsers($memberId); 	
		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $userDetails['username'] ?> | CelCount</title>
	<?php include("inc/header_tags.php"); ?>
</head>

<body>
	<?php include("inc/header.php"); ?>
<div id="content">
  <div id="banner">
    <h2><?php echo $userDetails['username']; ?> <span>| CELCOUNT<img src="images/star.png" alt="Star" /></span></h2>
    <h3>Favourite</h3>
  </div>
  <div class="clear"></div>
  <div class="user_info_wrap">
    <div class="profile_links">

     <div class="user_pic"> <img  style="border-radius:5px;" height="155"  width="161" 
     src="<?php echo $userDetails['profile_image'];?>" alt="User Image" /> </div>

      
      <a href="index.php">GO TO MY HOMEPAGE <img src="images/profile_home.png" alt="" /></a>  </div>
    <div class="chart_wraper">
    <div class="chart_row">
              <div class="item_name"> <img src="images/fb.png" alt="" /><strong class="pad-top">Friends / Likes</strong>  <? echo $userDetails['username']?> <span class="rating_points"><?php echo $friendcount; ?></span> </div>
       
      </div>
      <div class="chart_row2">
        <div class="item_name"> <img src="images/twtr.png" alt="" /><strong class="pad-top">Twitters</strong> <? echo $userDetails['screen_name'] ?> <span class="rating_points"><?php ?></span> </div>
       </div>

	<div class="chart_bottom">
        <div class="celcount_ico"> <img src="images/celcount_icon.png" alt="" /> <span><?php echo $celCountCurrent;?></span> </div>
        <div class="celcount_up"> <!--<img src="images/green_arrow.png" alt="" /> UP 3--> </div>
        <div class="dwnld_chrt2">   </div>
      </div>
    </div>
   	<?php include("inc/news.php"); ?>
    <div class="clear"></div>
  </div>
  <div class="cmparison_wrap full-width">
    <div class="favorities_group">
    <h2>FAVORITES <span> GROUPS</span></h2> 
    <? if($favouriteGroups){ 
		foreach($favouriteGroups as $groups){
		$groupDetail	=	$content_obj->getGroupByGroupId($groups['group_id']);
		$groupId	=	$groupDetail['group_id'];
		$groupName	=	$groupDetail['group_title'];
		if(file_exists("image/".$groupDetail['group_image'])){	
			$groupImage	=	$groupDetail['group_image'];	
		}else{
			$groupImage	=	'noimage.jpg';	
		}
		$imageThumb	=	$content_obj->resize($groupImage,53,52);
	?>
    <div class="fav-group">
    <div class="ProfileImageHolder"><img src="<?=$imageThumb?>" alt="<?=$groupName?>" /></div>
    <strong class="titleuser"><?=$groupName?></strong>
    <a class="show_members" href="group_memebers.php?group_id=<?=$groupId?>">Show Members</a>
    </div>
    <? } }else{?>
    <p>No Record Found.</p>
    <? } ?>
    <span class="browsgroup">
    <a href="search.php">Search Group</a>
    </span>
    </div>
    <div class="favorities_users"> 
     <h2>FAVORITES <span> USERS</span></h2> 
    <? if($favouriteUsers){
		foreach($favouriteUsers as $users){
			$userDetail	=	$content_obj->getUserDetailsByUserId($users['member_id']);			
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
    </div>
    <? } }else{?>
    <p>No Record Found.</p>
    <? } ?>
    
    <span class="browsgroup">
    <a href="search.php">Search Users</a>
    </div>
    </div>
	<?php include("inc/footer.php"); ?>
</body>
</html>