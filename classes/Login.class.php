<?php
	class Login
	{
		private $id;
		private $fb_id;
		private $tweet_id;
		private $login;
		private $password;
		
		function Login()
		{
			$this->id = 0;
			$this->fb_id = 0;
			$this->tweet_id = 0;
			$this->login = "";
			$this->password = "";
			
		}
		
		function fnSetID($var)
		{
			$this->id=$var;
		}
		function fnSetFb_Id($var)
		{
			$this->fb_id=$var;
		}
		function fnSetTweet_Id($var)
		{
			$this->tweet_id=$var;
		}
		
		
		function fnSetLogin($var)
		{
			$this->login=$var;
			//echo $this->login;
		}
		
		function fnSetPassword($var)
		{
			$this->password=$var;
			//echo $this->password;
		}
	

		
		
	////////////////// Validate///////////////////////////////	
		function validate()
		{
				
		if(empty($this->login))
			$error .= "&nbsp; &bull; &nbsp;Please enter Login.<br>";
				
		if(empty($this->password))
			$error .= "&nbsp; &bull; &nbsp;Please enter Password.<br>";
			
		return $error;	
		}
		
	//////////////////////////////////////////////////////////////////////////////		
	
	
		

		
		function fnLogin($table)
		{
			/*echo $this->password;
			echo $this->login;*/
			 $qry="SELECT * from ".$table." WHERE username ='".mySqlSafe($this->login)."' AND password ='".mySqlSafe($this->password)."';";
			
			return $qry;
		}
		function fnTweetLogin($table)
		{
			/*echo $this->password;
			echo $this->login;*/
			 $qry="SELECT * from ".$table." WHERE tweet_id ='".mySqlSafe($this->tweet_id)."' ";
			
			return $qry;
		}
		
		function fnFbLogin($table)
		{
			/*echo $this->password;
			echo $this->login;*/
     $qry="SELECT * from ".$table." WHERE fb_id ='".mySqlSafe($this->fb_id)."'";
			
			return $qry;
		}
		
		function fnMainLogin($table)
		{
			/*echo $this->password;
			echo $this->login;*/
     $qry="SELECT * from ".$table." WHERE fb_id ='".mySqlSafe($this->fb_id)."' OR tweet_id ='".mySqlSafe($this->tweet_id)."'";
			
			return $qry;
		}
		
	function fnLoginCount($table)
	{
			$qry="SELECT 1 from ".$table." WHERE username ='".mySqlSafe($this->login)."' AND password ='".mySqlSafe($this->password)."';";
			return $qry;
		}
		
		
		function fnLogout()
		{
			session_destroy();
		}
		
	}