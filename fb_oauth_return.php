<?php 
	session_start();
	include_once("configuration/common.php");
    include_once("classes/Login.class.php");
    include_once("classes/User.class.php");
    require 'src/facebook.php';

	$facebook = new Facebook(array(
    'appId'  => '643937622292048',
    'secret' => 'f6a03b22d001a113a93de1a68ce51fe1',
	));
?>


        <pre><?php 
		$user = $facebook->getUser();
/*echo "user is here: ". $user;
echo "<br>";*/

		//error_reporting(0);
//print_r($_SESSION);

/*$_SESSION['fb_id'] = $user;
echo $_SESSION['fb_id'];
echo "<br>";
echo $_SESSION['tweet_id'];*/
$tweet_id = $_SESSION['tweet_id'];

//$grouppath = 'me?fields=groups.fields(name,description,members.fields(id,email,picture),picture),friends.fields(id,name,email,picture)';
// print_r($_SESSION);

 $fb_id = $user;
 if ($user) {
    try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

if(($fb_id) || ($tweet_id)){

	        $data_array = array();
			$tweet_array = array(); 
			$fb_array = array();
    		$objLogin=new Login();
			$objLogin->fnSetFb_Id($fb_id);
			$objLogin->fnSetTweet_Id($tweet_id);
			$sql=$objLogin->fnFbLogin(TBL_USERS);
			if($db->query($sql) && $db->get_num_rows() > 0)
			{
			  for($i=0;$i<$db->get_num_rows();$i++){
      		     $row = $db->fetch_row_assoc();
		         array_push($data_array,$row);
			           }
               $mytweet_id = $data_array[0]['tweet_id'];  
    		   if(empty($mytweet_id)){
			    	echo "<script language=\"javascript\">window.location = 'tweet_signup.php';</script>";
          			exit();			  
			
			   }else{
				   
			    	echo "<script language=\"javascript\">window.location = 'index.php';</script>";
          			exit();			  
				   
				   }
			}
			 else {

			  if(empty($tweet_id)){
			
					   			/// enter new user record.
			  	$objUser = new User();
//				echo $user_profile['name'];
//				echo "<br>";
                $user_name = $user_profile['username']; 
    			$user_friends = $facebook->api('/me/friends');
                $friends_count = count ($user_friends['data']);

				$image_url = "https://graph.facebook.com/".$user_name."/picture"; 
                $screen_name = $_SESSION['screen_name'];
				$status = 1;
				$objUser = new User();
				$objUser->fnSetUserName($user_profile['name']);
				$objUser->fnSetFb_Id($fb_id);
				$objUser->fnSetProfileImage($image_url);
				$objUser->fnSetFriendsCount($friends_count);
				$objUser->fnScreenName($screen_name);
				$objUser->fnSetStatus($status);
				//inserting value into fb table
    	    	$sql_add = $objUser->fb_insert(TBL_FB);
				 if($db->query($sql_add)){
				      $msgsuccess= "record has been added.";;	 
					}
			    
				// add new twitter user record   
    		 	//echo "<br>";
     	    	$sql_add = $objUser->fb_user_insert(TBL_USERS,$fb_id);

			 if($db->query($sql_add)){
				      $msgsuccess= "record has been added.";;	 
					}
	   echo "<script language=\"javascript\">window.location = 'tweet_signup.php';</script>";
						
		exit;
	 }else{
	 
			$objLogin->fnSetTweet_Id($tweet_id);
            $sql=$objLogin->fnTweetLogin(TBL_USERS);
             if($db->query($sql) && $db->get_num_rows() > 0)
			{
			  for($i=0;$i<$db->get_num_rows();$i++){
      		     $row = $db->fetch_row_assoc();
		         array_push($data_array,$row);
			           }
			 }

				/// enter new user record.
			  	$objUser = new User();
                $user_name = $user_profile['username']; 
    			$user_friends = $facebook->api('/me/friends');
                $friends_count = count ($user_friends['data']);
				$image_url = "https://graph.facebook.com/".$user_name."/picture"; 
                $screen_name = $_SESSION['screen_name'];
				$status = 1;
				$objUser = new User();
				$objUser->fnSetUserName($user_profile['name']);
				$objUser->fnSetFb_Id($fb_id);
				$objUser->fnSetProfileImage($image_url);
				$objUser->fnSetFriendsCount($friends_count);
				$objUser->fnScreenName($screen_name);
				$objUser->fnSetStatus($status);
				//inserting value into twitter table
                $sql_add = $objUser->fb_insert(TBL_FB);
     
				 if($db->query($sql_add)){
				      $msgsuccess= "record has been added.";;	 
					}
			    
				// add new twitter user record   
				$objUser->fnSetFb_Id($fb_id);
 	 			$objUser->fnSetTweet_Id($tweet_id);
				$friends_count = $friends_count + $data_array[0]['friends_count'];
				$objUser->fnSetFriendsCount($friends_count);
              	$sql_add = $objUser->update_user_fb(TBL_USERS,$tweet_id);
    

			 if($db->query($sql_add)){
				      $msgsuccess= "record has been added.";;	 
					}
		
	  echo "<script language=\"javascript\">window.location = 'index.php';</script>";
	 	 exit;
						 
						 }
				
				}
}
			   
			

			/*	echo '<pre>';
				echo "data array ";
				print_r($data_array);	
				echo "fb array ";
				print_r($fb_array);	
				echo "tweet array ";
				print_r($tweet_array);	
				echo '</pre>';
exit;		*/		
	
?>
<?php
	// exit;
	//	unset($_SESSION['adminAllowed']);
//		unset($_SESSION['AdminId']);
//		unset($_SESSION['AdminName']);
//		unset($_SESSION);
//	session_destroy();
//	header("Location: signup.php");
//	exit();
?>
  </pre>
        
