<?php
	/* **********************************************************
	   * This is common file.
	   * It contains commonly user variables and functions.	
	   *  
	   *********************************************************/
	
	//error_reporting(5);
		
// Session Check

	if(substr_count($_SERVER['PHP_SELF'],'/admin')>0)
	{
		
		include_once("../configuration/configuration.php");
		include_once("../classes/Database.admin.inc.php");
		
	}
	else
	{
	
		include_once("configuration/configuration.php");
		include_once("classes/Database.admin.inc.php");
		
	}
	
	
	
	
	$db=new Database();
	$db->connect();
	
	$db2=new Database();
	$db2->connect();
	
	function validateAdminSession($session)
	{	
//	echo '<br> Session = '.$session;
//	echo '<pre>';
//	print_r($_SESSION);
//	exit;
		if(empty($session) || trim($session) == "")
		{
			/*echo "<script language=\"javascript\" >window.location = 'index.php';</script>";*/
			header("Location: index.php");
			exit();
		}
	}
	
	function mySqlSafe($val)
	{
			$val=trim($val);
			return htmlspecialchars(mysql_real_escape_string($val));
	}
	
	/*?>function sendEamil($to="tk@kenji-int.com",$from="admin@kenji-int.com",$subject="Quote Request",$message)<?php */
		function sendEamil($to="tk@kenji-int.com",$from="admin@kenji-int.com",$subject="Quote Request",$message)
	{
		
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'To: 	Kenji <tk@kenji-int.com>' . "\r\n";
			$headers .= 'From: Quote Request <admin@kenji-int.com>' . "\r\n";
			/*$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
			$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/
			
			// Mail it
			
			mail($to,$subject,$message,$headers);
			
		}