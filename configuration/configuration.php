<?php
	/* *************************** *
	   * This is configuration file.
	   * It contains db access parameters, Imge paths, globally used array.	
	   *  
	   *************************** */
	   
	   //****************************************ONLINE PARAMETERS
		
		if($_SERVER['SERVER_NAME']=='localhost')
		{						
			$dbhost 	= "localhost";				//host name.
			$dbuser 	= "root";					//database user.
			$dbpasswd = "";						//database passwd.
			$dbname		= "celcount";	
			$siteURL	= "http://localhost/celcount/";
		}
		else
		{
			$dbhost 	= "localhost";				//host name.
			$dbuser 	= "wmedesig_cel";					//database user.
			$dbpasswd = "hello1234";						//database passwd.
			$dbname		= "wmedesig_celcount";	
			$siteURL	= "http://celcount.wmedesigns.com.au/";
			}
			
		
		
		/*** For Paging ***/
		
		$_maxRecord		= 10;
		$_pageLimit 	= 10;
		
		//****************************************LOCAL PARAMETERS

//	$rootPath = $DOCUMENT_ROOT ."/";

	//error_reporting(E_ERROR | E_CORE_ERROR | E_COMPILE_ERROR);
	//error_reporting(E_ALL & ~E_NOTICE);
	//ini_set("display_errors","on");

	$adminPrefix		    	= "../";											//admin prefix.
	$vehicleImages				= "images/vehicles/";					//path of vehicle images.
	$vehicleTypeImages		= "images/vehiclestype/";					//path of vehicle images.
	$manfImages						= "images/manuflogo/";						//path of manufacturer images.
	$maxPicLimit					= 6;	
	
	
	
/****** Database Tables Constants*/
		
define("TBL_PRODUCTS","ah_product");
define("TBL_INTRODUCTION","ah_introduction");
define("TBL_CONTACT_INFO","ah_contact_info");
define("TBL_USERS","ah_users");
define("TBL_TWEET","user_tweet");
define("TBL_FB","user_fb");
define("TBL_CATEGORY","ah_category");
define("TBL_MAILING_LIST","ah_mail_list");
?>