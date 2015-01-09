<?php
/**
 * @file
 * Take the user when they return from Twitter. Get access tokens.
 * Verify credentials and redirect to based on response from Twitter.
 */

/* Start session and load lib */
ob_start();
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require 'src/facebook.php';
include_once("configuration/common.php");
include_once("classes/Login.class.php");
include_once("classes/User.class.php");
include("inc/ini.php");

$facebook = new Facebook(array(
    'appId'  => '452925158108920',
    'secret' => '80458df25637e8693e2d9b769baf83aa',
));

 $user = $facebook->getUser();
$fb_id = $user;
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
 if ($user):
		
			

 endif;
/* If the oauth_token is old redirect to the connect page. */
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
  $_SESSION['oauth_status'] = 'oldtoken';
  header('Location: ./clearsessions.php');
}

/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

/* Request access tokens from twitter */
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

/* Save the access tokens. Normally these would be saved in a database for future use. */
$_SESSION['access_token'] = $access_token;

/* Remove no longer needed request tokens */
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);

/* If HTTP response is 200 continue otherwise send to connect page to retry */
if (200 == $connection->http_code) {
  /* The user has been verified and the access tokens can be saved for future use */
  $_SESSION['status'] = 'verified';
    
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
	}
  $access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */


 
$content = $connection->get('account/verify_credentials');

/*echo $content->name;

echo $content->profile_image_url_https;

echo '<pre>';
print_r($content);
exit;*/
echo '<pre>';
print_r($content);
$tweet_id = $content->id;
$tweet_friends = $content->friends_count;
if($tweet_id){

	        $data_array = array();
			$tweet_array = array(); 
			$fb_array = array();
    		$objLogin=new Login();
			$objLogin->fnSetTweet_Id($tweet_id);
			$sql=$objLogin->fnTweetLogin(TBL_USERS);

			if($db->query($sql) && $db->get_num_rows() > 0)
			{
			  for($i=0;$i<$db->get_num_rows();$i++){
      		     $row = $db->fetch_row_assoc();
		         array_push($data_array,$row);
			    }


			$latestTwitterId			=	$content->id_str;
			$latestTwitterFriendsCount  =	$content->friends_count;
			$latestTwitterScreenName	=	$content->screen_name;
			$latestTwitterProfileImg	=	$content->profile_image_url;
				
			$updateTwitter	=	$content_obj->updateTwitterRecordByTwitterId($latestTwitterId, $latestTwitterFriendsCount, $latestTwitterScreenName, $latestTwitterProfileImg);
			$updateTwitterUserTable	=	$content_obj->updateTwitterRecordByTwitterIdUserTweet($latestTwitterId, $latestTwitterFriendsCount, $latestTwitterScreenName, $latestTwitterProfileImg);

		     header("Location: http://localhost/celcount/index.php");
                exit;
   
// collecting tweeter data

    			 /* $objLogin->fnSetTweet_Id($tweet_id);
       			  $sql=$objLogin->fnTweetLogin(TBL_TWEET);
				  if($db->query($sql) and $db->get_num_rows()>0){
				  for($i=0;$i<$db->get_num_rows();$i++){
				  $row = $db->fetch_row_assoc();
				  array_push($tweet_array,$row);
				                                                }
			           }*/
// collecting facebook data		
			      $myfb_id = $data_array[0]['fb_id'];
				  if($myfb_id){
					      header("Location: http://localhost/celcount/index.php");
                           exit;
    		
			           }else {
						   $_SESSION['tweet_id'] = $tweet_id;
                           header("Location:  http://localhost/celcount/fb_signup.php");
                           exit;
						   }
				 
					   
/*					echo $user_array[0]['fb_id'];   
				  echo '<pre>';
				  echo "data array ";
				  print_r($data_array);	
				  				  echo "fb array ";
				  print_r($fb_array);	
				  				  echo "tweet array ";
				  print_r($tweet_array);	
				  
				  echo '</pre>';*/
			}else // Not Already User.
			{
			/// enter new user record.
			  	$objUser = new User();
				$status = 1;
				$objUser = new User();
				$objUser->fnSetUserName($content->name);
				$objUser->fnSetTweet_Id($tweet_id);
				$objUser->fnSetProfileImage($content->profile_image_url);
				$objUser->fnSetFriendsCount($content->friends_count);
				$objUser->fnSetStatus($status);
				//inserting value into twitter table
//echo '<pre>';
				//inserting value into user table		
				if($user){
                 $sql_add = $objUser->insert(TBL_TWEET);				

				 if($db->query($sql_add)){
				      $msgsuccess1= "record has been added.";;	 
					}
					
				  $objLogin->fnSetTweet_Id($tweet_id);			 
                  $objLogin->fnSetFb_Id($fb_id);
        		  $sql=$objLogin->fnFbLogin(TBL_USERS);
				  if($db->query($sql) and $db->get_num_rows()>0){
				  for($i=0;$i<$db->get_num_rows();$i++){
				  $row = $db->fetch_row_assoc();
				  array_push($tweet_array,$row);
				                                                }
			           }
    			$friends_count =  $tweet_friends + $tweet_array[0]['friends_count'];
					$objUser->fnSetFriendsCount($friends_count);
                $sql_add = $objUser->update_user(TBL_USERS,$fb_id);


				 if($db->query($sql_add)){
				      $msgsuccess= "record has been added.";;	 
					}					
					
				 header("Location: http://celcount.wmedesigns.com.au/index.php");
        		 exit;
				}else{
				

				$sql_add = $objUser->tweet_insert(TBL_USERS);

			     
				 if($db->query($sql_add)){
				      $msgsuccess= "record has been added.";;	 
					}

                 $sql_add = $objUser->insert(TBL_TWEET);				


				 if($db->query($sql_add)){
				      $msgsuccess1= "record has been added.";;	 
					}
				 $_SESSION['tweet_id'] = $tweet_id;
                  header("Location:  http://localhost/celcount/fb_signup.php");
                  exit;
						   	
//echo "record 1 ". $msgsuccess . "record 2 ". $msgsuccess1;					
			}
			
			
			
			}
			
			
			}
			
			
			
			}
