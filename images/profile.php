<?php
//error_reporting(0);
session_start();
	include_once("configuration/common.php");
    include_once("classes/Login.class.php");
    include_once("classes/User.class.php");
	require 'src/facebook.php';
    require_once('twitteroauth/twitteroauth.php');
    require_once('config.php');

$facebook = new Facebook(array(
    'appId'  => '452925158108920',
    'secret' => '80458df25637e8693e2d9b769baf83aa',
));


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
//print_r($user_profile);

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
//print_r($content);
// tweeter ends here 
/*echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/


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
/*echo "name is ";					   
echo $data_array[0]['username'];
echo "<br>";		   
	   
				echo '<pre>';
				echo "data array ";
				print_r($data_array);	
				echo "fb array ";
				print_r($fb_array);	
				echo "tweet array ";
				print_r($tweet_array);	
				echo '</pre>';*/

$user_graph = $facebook->api('/me/');
/*print_r($user_graph);
			  echo '</pre>';*/	
			

 		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Celcount Home Page</title>
<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header" >
  <div id="header_content">
    <div id="logo_con"><a href="index.php"> <img src="images/logo.png" alt="Celcount Logo"  /></a> </div>
    <div id="head_right">
      <ul>
        <li><a href="index.php">HOME PAGE </a> </li>
        <li><a href="contactus.php">CONTACT US</a> </li>
        <li><a href="howitworks.php">HOW IT WORKS</a> </li>
      </ul>
    </div>
  </div>
  <div id="header_bottom">
    <div id="bottom_left">
      <h2>GLOBAL GROUP LIST:</h2>
      <a class="heade" href="#">A-G  | </a> <a class="heade" href="groups.php"> H-M  | </a> <a class="heade" href="#"> N-Z  | </a> </div>
    <div id="bottom_right">
      <ul>
        <li><a href="logout.php">LOGOUT</a> </li>
        <li><a href="profile.php">PROFILE </a> </li>
        <li><a href="#">SEARCH</a> </li>
        <li><a href="#">FAVORITIES</a> </li>
      </ul>
    </div>
  </div>
</div>
<div id="content">
  <div id="banner">
    <h2><?php echo $data_array[0]['username']; ?> <span>| CELCOUNT<img src="images/star.png" alt="Star" /></span></h2>
    <h3>Edit Profile</h3>
  </div>
  <div class="clear"></div>
  <div class="star_rating"> <img src="images/star4.png" alt="" /> <img src="images/star4.png" alt="" /> <img src="images/star4.png" alt="" /> </div>
  <div class="clear"></div>
  <div class="user_info_wrap">
    <div class="profile_links">

     <div class="user_pic"> <img  style="border-radius:5px;" height="155"  width="161" 
     src="<?php echo $data_array[0]['profile_image'];?>" alt="User Image" /> </div>

      
      <a href="#">GO TO MY HOMEPAGE <img src="images/profile_home.png" alt="" /></a>  </div>
    <div class="chart_wraper">
      <div class="chart_row">
              <div class="item_name"> <img src="images/fb.png" alt="" /> Friends / Likes</div>
        <div class="movment"> <!--<span>Movement</span> <img src="images/green_arrow.png" width="18" alt="" /> <strong>1.200</strong>--> </div>
        <div class="dwnld_chrt"> <a href="#" class="blue_button">Edit Link</a> </div>
      </div>
      <div class="chart_row2">
        <div class="item_name"> <img src="images/twtr.png" alt="" /> Followers</div>
        <div class="movment"> <!--<span>Movement</span> <img src="images/red_arrow.png" alt="" /> <strong>1.200</strong>--> </div>
        
        <div class="dwnld_chrt"> <a href="#" class="blue_button">Edit Link</a> </div>
      </div>
      <div class="chart_bottom">
        <div class="celcount_ico"> <img src="images/celcount_icon.png" alt="" /> <span><?php echo $celcount_friends;?></span> </div>
        <div class="celcount_up"> <!--<img src="images/green_arrow.png" alt="" /> UP 3--> </div>
        <div class="dwnld_chrt2">   </div>
      </div>
    </div>
    <div class="news_wraper">
      <h3>HEADLINES <span>| NEWS</span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus ante in mauris feugiat et rhoncus libero hendrerit. Fusce ultrices elit vel nibh accumsan id maleasuada nisl lacinia. Mauris dapibus quam eget lacus malesuada tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis felis est, tristique consequat placerat vitae, condimentum vitae ligula. Phasellus semper faucibus ante sed rutrum. Nam sit </p>
      <a href="#" class="blue_button">More</a> </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="cmparison_wrap">
    <h2>COMMON GROUP</h2>
    <div class="comparison_box">
      <div class="category"> Global </div>
      <div class="rank"> C-Rank </div>
      <div class="nmbrs"> 96,057,563 <span>of</span> 106,057,563 </div>
      <div class="mvmnt2"> <span>Movement <img src="images/green_arrow.png" width="18" /></span> 457,563 <a href="#" class="blue_button">More</a> </div>
    </div>
    <div class="comparison_box">
      <div class="category"> Work </div>
      <div class="rank"> C-Rank </div>
      <div class="nmbrs"> 96,057,563 <span>of</span> 106,057,563 </div>
      <div class="mvmnt2"> <span>Movement <img src="images/black_box.png" width="18" /></span> 457,563 <a href="#" class="blue_button">More</a> </div>
    </div>
    <div class="comparison_box">
      <div class="category"> My Gang </div>
      <div class="rank"> C-Rank </div>
      <div class="nmbrs"> 96,057,563 <span>of</span> 106,057,563 </div>
      <div class="mvmnt2"> <span>Movement <img src="images/green_arrow.png" width="18" /></span> 457,563 <a href="#" class="blue_button">More</a> </div>
    </div>
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
<div id="footer">
  <div id="footer_content">
    <ul>
      <li><a href="#">ABOUT </a> |</li>
      <li><a href="#">CONTACT</a> |</li>
      <li><a href="#">CAREERS</a> |</li>
      <li><a href="#">PERKS</a> |</li>
      <li><a href="#">DEVELOPERS</a> |</li>
      <li><a href="#">BLOG</a> </li>
    </ul>
  </div>
</div>
</body>
</html>