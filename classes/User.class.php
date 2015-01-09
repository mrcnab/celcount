<?php
	class User
	{
		private $id;
		private $tweet_id;
		private $fb_id;
		private $username;
		private $password;
		private $screen_name;
		private $profile_image;
		private $friends_count;
		private $created_at;
		private $status;
		
		function User()
		{
			$this->id = 0;
			$this->username = "";
			$this->password = "";
			$this->tweet_id = "";
			$this->fb_id = "";
            $this->screen_name = "";
            $this->profile_image = "";
		    $this->friends_count = "";
		    $this->created_at = "";
		    $this->status = "1";
    	}
		
		function fnSetID($var)
		{
			$this->id=$var;
		}
		function fnSetUserName($var)
		{
			$this->username=$var;
			//echo $this->username;
		}
		function fnSetTweet_Id($var)
		{
			$this->tweet_id=$var;
			//echo $this->username;
		}
    	function fnSetFb_Id($var)
		{
			$this->fb_id=$var;
			//echo $this->username;
		}

		function fnScreenName($var)
		{
			$this->screen_name=$var;
		}
		function fnSetProfileImage($var)
		{
			$this->profile_image=$var;
			//echo $this->username;
		}
		function fnSetFriendsCount($var)
		{
			$this->friends_count=$var;
			//echo $this->username;
		}
		function fnSetCreatedAt($var)
		{
			$this->created_at=$var;
			//echo $this->username;
		}
		function fnSetStatus($var)
		{
			$this->status=$var;
			//echo $this->username;
		}
		
		function fnSetPassword($var)
		{
			$this->password=$var;
			//echo $this->password;
		}
	

		
		
	////////////////// Validate///////////////////////////////	
		function validate()
		{
				
		if(empty($this->username))
			$error .= "&nbsp; &bull; &nbsp;Please enter Login.<br>";
				
		if(empty($this->password))
			$error .= "&nbsp; &bull; &nbsp;Please enter Password.<br>";
			
		return $error;	
		}
		
	//////////////////////////////////////////////////////////////////////////////		

	function insert($table)
		{
				$sql = "INSERT INTO $table set 
									tweet_id      = '".mySqlSafe($this->tweet_id)."',
									name          = '".mySqlSafe($this->username)."',
									profile_image  = '".mySqlSafe($this->profile_image)."',
									friends_count  = '".mySqlSafe($this->friends_count)."',
									created_at 	   = NOW(),
									status 		   = '".mySqlSafe($this->status)."'";
							return $sql;
		}
		function fb_insert($table)
		{
				$sql = "INSERT INTO $table set 
									fb_id      = '".mySqlSafe($this->fb_id)."',
									name          = '".mySqlSafe($this->username)."',
									profile_image  = '".mySqlSafe($this->profile_image)."',
									friends_count  = '".mySqlSafe($this->friends_count)."',
									created_at 	   = NOW(),
									status 		   = '".mySqlSafe($this->status)."'";
							return $sql;
		}

	function tweet_insert($table)
		{
				$sql = "INSERT INTO $table set 
									tweet_id      = '".mySqlSafe($this->tweet_id)."',
									username	   = '".mySqlSafe($this->username)."',
									password       = '".mySqlSafe($this->password)."',
									screen_name    = '".mySqlSafe($this->screen_name)."',
									profile_image  = '".mySqlSafe($this->profile_image)."',
									friends_count  = '".mySqlSafe($this->friends_count)."',
									created_at 	   = NOW(),
									status 		   = '".mySqlSafe($this->status)."'";
							return $sql;
		}
	function fb_user_insert($table)
		{
				$sql = "INSERT INTO $table set 
									fb_id      = '".mySqlSafe($this->fb_id)."',
									username	   = '".mySqlSafe($this->username)."',
									password       = '".mySqlSafe($this->password)."',
									screen_name    = '".mySqlSafe($this->screen_name)."',
									profile_image  = '".mySqlSafe($this->profile_image)."',
									friends_count  = '".mySqlSafe($this->friends_count)."',
									created_at 	   = NOW(),
									status 		   = '".mySqlSafe($this->status)."'";
							return $sql;
		}
		
		function update_user($table,$id)
		{
				$sql = 		"UPDATE $table set 
									tweet_id      = '".mySqlSafe($this->tweet_id)."',
									screen_name   = '".mySqlSafe($this->username)."',
									profile_image  = '".mySqlSafe($this->profile_image)."',
									friends_count  = '".mySqlSafe($this->friends_count)."',
									created_at 	   = NOW(),
									status 		   = '".mySqlSafe($this->status)."'							
									WHERE fb_id =".$id;
							return $sql;
		}
		function update_user_fb($table,$id)
		{
				$sql = 		"UPDATE $table set 
									fb_id      = '".mySqlSafe($this->fb_id)."',
									screen_name   = '".mySqlSafe($this->username)."',
									profile_image  = '".mySqlSafe($this->profile_image)."',
									friends_count  = '".mySqlSafe($this->friends_count)."',
									created_at 	   = NOW(),
									status 		   = '".mySqlSafe($this->status)."'							
									WHERE tweet_id =".$id;
							return $sql;
		}

		

		
		function fnUser($table)
		{
			/*echo $this->password;
			echo $this->username;*/

			 $qry="SELECT * from ".$table." WHERE social_id ='".mySqlSafe($this->social_id)."';";
			 return $qry;
		}
		
	function fnUserCount($table)
	{
			$qry="SELECT 1 from ".$table." WHERE username ='".mySqlSafe($this->username)."' AND password ='".mySqlSafe($this->password)."';";
			return $qry;
		}
		
		
		function fnLogout()
		{
			session_destroy();
		}
		
	}