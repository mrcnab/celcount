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
    'appId'  => '643937622292048',
    'secret' => 'f6a03b22d001a113a93de1a68ce51fe1',
));

$user = $facebook->getUser();

if($user == '0'){
	    header("Location: http://localhost/celcount/signup.php");
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

/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
$tweet_id = $_SESSION['tweet_id'];
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
/* If method is set change API call made. Test is called by default. */

$content = $connection->get('account/verify_credentials');
// tweeter ends here 
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

$user_graph = $facebook->api('/me/');
	}
	
	
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Celcount | Welcome <?php echo $data_array[0]['username'] ?></title>
	<?php include("inc/header_tags.php"); ?>
     <script type="text/javascript" src="https://www.google.com/jsapi"></script>    
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

      
      <a href="profile.php">EDIT MY PROFILE <img src="images/profile_edit.png" alt="" /></a> 
	<form method="post" action="index.php">
		<input type="hidden" name="fb_id" value="<?php echo $myfb_id; ?>" />
		<input type="hidden" name="fb_count" value="<?php echo $fb_array[0]['friends_count']; ?>" />
		<input type="hidden" name="twitter_id" value="<?php echo $tweet_array[0]['tweet_id']; ?>" />
		<input type="hidden" name="twitter_count" value="<?php echo $tweet_array[0]['friends_count']; ?>" />
		<input type="submit"  name="updateSocialLinks" id="updateSocialLinks" value="REFRESH MY RANK " />
	</form> 
</div>
   <div class="chart_wraper">

      <div class="chart_row">
              <div class="item_name"> <img src="images/fb.png" alt="" /><strong class="pad-top">Friends / Likes</strong>  <? echo $user_profile['username']?> <span class="rating_points"><?php if($fb_array[0]['friends_count']){echo $friendcount; }?></span> </div>
        <?=$fbMovement?>
        <div class="dwnld_chrt"> <a class='inline' href="#chart_div" >Chart</a> </div>
      </div>
      <div class="chart_row2">
        <div class="item_name"> <img src="images/twtr.png" alt="" /><strong class="pad-top">Twitters</strong> <? echo $tweet_array[0]['name'] ?> <span class="rating_points"><?php if($tweet_array[0]['friends_count']){echo $tweet_array[0]['friends_count']; }?></span> </div>
        <?=$twitterMovement?>
        <?php $celcount_friends = $tweet_array[0]['friends_count'] + $fb_array[0]['friends_count'];   ?>
        <div class="dwnld_chrt"> <a href="#" class="blue_button">Chart</a> </div>
      </div>
      <div class="chart_bottom">
        <div class="celcount_ico"> <img src="images/celcount_icon.png" alt="" /> <span><?php echo $celCountCurrent;?></span> </div>
        <?=$celCount?>
        <div class="dwnld_chrt2"> <a href="#" class="blue_button">Chart</a> </div>
      </div>
    </div>
	<?php include("inc/news.php"); ?>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
   <?php include("inc/home_compare_group.php"); ?>
   <?php include("inc/movingup.php"); ?>

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
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <div style="display:none;">
        <div id="chart_div"></div>
    </div>
</body>
</html>
