<?php
//error_reporting(0);
ob_start();
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

$user = $facebook->getUser();
if($user == '0'){
	    header("Location: http://celcount.wmedesigns.com.au/signup.php");
}


$myfriends = $facebook->api('/'.$user.'/friends');
$friendcount =  COUNT($myfriends['data']) + 1;

if($_POST['updateSocialLinks']){
	$fb_id	=	$_POST['fb_id'];
	$fb_count	=	$friendcount;
	$twitter_id	=	$_POST['twitter_id'];
	$twitter_count	=	$_POST['twitter_count'];
	$updateCounts	=	$content_obj->updateSocialCounts($fb_id, $fb_count, $twitter_id, $twitter_count);
	if($updateCounts == TRUE){		
			$msg	=	"&nbsp;<span class='good_msg'>Your social rank is updated.</span>";
		}else{
			$msg	=	"&nbsp;<span class='bad_msg'>There is some error, Please try again.</span>";			
		}	
}


$fb_id = $facebook->getUser();
$user = $facebook->getUser();
if ($user) {
     try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}



// echo($user_profile['username']);

/* If access tokens are not available redirect to connect page. */
/*echo "<br>";
echo "Here is Facebook id : ". $fb_id;
echo "<br>";
echo 
echo "<br>";
echo '<pre>';*/
/// tweeter starts here

/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
$tweet_id = $_SESSION['tweet_id'];
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
/* If method is set change API call made. Test is called by default. */

$content = $connection->get('account/verify_credentials');
// tweeter ends here 

//print_r($content);


if(($fb_id) || ($tweet_id)){
	        $data_array = array();
			$tweet_array = array(); 
			$fb_array = array();
    		$objLogin=new Login();
			$objLogin->fnSetFb_Id($fb_id);
            $objLogin->fnSetTweet_Id($tweet_id);			 
    	    $sql=$objLogin->fnMainLogin(TBL_USERS);
			if($db->query($sql) && $db->get_num_rows() > 0)
			{
			  for($i=0;$i<$db->get_num_rows();$i++){
      		     $row = $db->fetch_row_assoc();
		         array_push($data_array,$row);
			    }
			}
 // ($data_array);
// echo($data_array[1]['username']);

// collecting tweeter data
                  $mytweet_id = $data_array[0]['tweet_id'];
                  $objLogin->fnSetTweet_Id($mytweet_id);			 
         		  $sql=$objLogin->fnTweetLogin(TBL_TWEET);
				  if($db->query($sql) and $db->get_num_rows()>0){
				  for($i=0;$i<$db->get_num_rows();$i++){
				  $row = $db->fetch_row_assoc();
				  array_push($tweet_array,$row);
				                                                }
			           }
// collecting facebook data		
			     
				  
                  $myfb_id = $data_array[0]['fb_id'];
	          	  $objLogin->fnSetFb_Id($fb_id);
    			  $sql=$objLogin->fnFbLogin(TBL_FB);
				  if($db->query($sql) and $db->get_num_rows()>0){
				  for($i=0;$i<$db->get_num_rows();$i++){
				  $row = $db->fetch_row_assoc();
				  array_push($fb_array,$row);
				                                                }
			           }

// print_r($data_array[0]['username']);	
		/*		echo '<pre>';
				echo "data array ";
				print_r($data_array);	
				echo "fb array ";
				print_r($fb_array);	
				echo "tweet array ";
				print_r($tweet_array);	
				echo '</pre>';*/

$user_graph = $facebook->api('/me/');
//echo "<pre>";
// print_r($user_graph);
	//		  echo '</pre>';			

 	
	}else{
		//	header('Location: http://www.celcount.wmedesigns.com.au/logout.php');
	}
// print_r($tweet_array[0]);
//echo ($tweet_array[0]['tweet_id']);

	$getFbMovement	=	$content_obj->getFbMovement($myfb_id);
	//print_r($getFbMovement);
	$lastFbCount	=	$getFbMovement['fb_count'];
	$currentFbCount	=	$friendcount;
	if($currentFbCount > $lastFbCount ){
		$socialChange	=	$currentFbCount - $lastFbCount;
		$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/green_arrow.png" width="18" alt="" /> <strong>'.$socialChange.'</strong> </div>';
	}else if($currentFbCount < $lastFbCount ){
		$socialChange	=	$lastFbCount - $currentFbCount;
		$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/red_arrow.png" width="18" alt="" /> <strong>'.$socialChange.'</strong> </div>';
	}else{
		$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/black_box.png" width="18" alt="" /></div>';
	}


	$getTwitterMovement	=	$content_obj->getTwitterMovement($tweet_array[0]['tweet_id']);
//print_r($getTwitterMovement);
	$lastTwitterCount	=	$getTwitterMovement['twitter_count'];
	$currentTwitterCount =	$tweet_array[0]['friends_count'];

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
	$ah_user_id	=	$data_array[0]['id'];
	$celCountChange	=	$celCountCurrent - $celCountLast;
	$updateTopFiveMovers	=	$content_obj->updateTopFiveMovers($ah_user_id, $celCountChange);
	$groupCreater	=	$content_obj->getUserCreatedGroupsByUserId($ah_user_id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php echo $data_array[0]['username'] ?> | Celcount</title>
	<?php include("inc/header_tags.php"); ?>
</head>

<body>
	<?php include("inc/header.php"); ?>
<div id="content">

  <div id="banner">
    <h2><?php echo $data_array[0]['username']; ?> <span>| CELCOUNT<img src="images/star.png" alt="Star" /></span></h2>
    <h3>Home Page</h3>
  </div>
  <div class="clear"></div>
  <div class="star_rating"> <img src="images/star4.png" alt="" /> <img src="images/star4.png" alt="" /> <img src="images/star4.png" alt="" /> <?=$msg?> </div>
  <div class="clear"></div>
  <div class="user_info_wrap">
    <div class="profile_links">

     <div class="user_pic"> <img  style="border-radius:5px;" height="155"  width="161" 
     src="<?php echo $data_array[0]['profile_image'];?>" alt="User Image" /> </div>

      
<a href="index.php">GO TO MY HOMEPAGE <img src="images/profile_home.png" alt="" /></a> 
<a href="create-group.php">CREATE A GROUP</a>  </div>
   <div class="chart_wraper">

      <div class="chart_row">
              <div class="item_name"> <img src="images/fb.png" alt="" /><strong class="pad-top">Friends / Likes</strong>  <? echo $user_profile['username']?> <span class="rating_points"><?php if($fb_array[0]['friends_count']){echo $friendcount; }?></span> </div>
        <?=$fbMovement?>
       
      </div>
      <div class="chart_row2">
        <div class="item_name"> <img src="images/twtr.png" alt="" /><strong class="pad-top">Twitters</strong> <? echo $tweet_array[0]['name'] ?> <span class="rating_points"><?php if($tweet_array[0]['friends_count']){echo $tweet_array[0]['friends_count']; }?></span> </div>
        <?=$twitterMovement?>
        <?php $celcount_friends = $tweet_array[0]['friends_count'] + $fb_array[0]['friends_count'];   ?>
       
      </div>
      <div class="chart_bottom">
        <div class="celcount_ico"> <img src="images/celcount_icon.png" alt="" /> <span><?php echo $celCountCurrent;?></span> </div>
        <?=$celCount?>
        <div class="dwnld_chrt2"> <!--<a href="#" class="blue_button">Chart</a>--> </div>
      </div>
    </div>
	<?php include("inc/news.php"); ?>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
   <?php include("inc/profile_bottom_porition.php"); ?>   
   <div class="cmparison_wrap">
    <h2>PERSONAL GROUPS</h2>
    <?  if($groupCreater)
		foreach($groupCreater as $groupOwner){ 
		$groupDetails	=	$content_obj->getGroupByGroupId($groupOwner['group_id']);
		$allUsersOfThisGroup	=	$content_obj->getAllUserIdsByGroupId($groupOwner['group_id']); ?>
    <div class="comparison_box">
      <div class="category"><?=$groupDetails['group_title']?></div>
      <div class="rank"><?=$groupDetails['group_type']?></div>
      <div class="nmbrs"> <?=$getTotalUsers['TOTAL_USERS']?>  <span>of</span> <?=count($allUsersOfThisGroup);?> </div>
      <div class="mvmnt2"><a style="margin-top:10px;" href="group_memebers.php?group_id=<?=$groupOwner['group_id']?>"  class="show_members" >Show Members</a> </div>
    </div>    
    <? } ?>
  </div>
  
  <div id="banner_bottom">
    <h2 style="float:left;width:190px; font-size:12px;color:#065f69;margin-left:195px;margin-top:10px;">Keep track of the popularity
      of the most important person
      in the world<span style="color:#5db809;">... you!!!</span></h2>
    <div id="ban_right" style="float:right;margin-right:60px;margin-top: 10px;">
      <p style="font-size:10px;"> Matthew, Carlos Cee and 3 others use CelCount.</p>
      <img src="images/img1.png" alt="image 1" /> <img src="images/img2.png" alt="image 1" /> <img src="images/img3.png" alt="image 1" /> <img src="images/img4.png" alt="image 1" /> <img src="images/img5.png" alt="image 1" /> <img src="images/img6.png" alt="image 1" /> </div>
  </div>
</div>
	<?php include("inc/footer.php"); ?>
</body>
</html>
