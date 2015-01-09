<?
error_reporting(0);
	//$f = basename( $_SERVER['PHP_SELF'] );
	//if( $f != "login.php" )
	{
		require_once("DBAccess.php");
		require_once("contentClass.php");
		require_once("class.phpmailer.php");
		require_once("pagingClass.php");
		require_once("image.php");
	}
//	print_r($_SERVER);

	define("FEATURE_RECORDS_PER_PAGE", 5);
	define("FEATURE_NUMBERS_PER_PAGE", 5);
	
	define("RECORDS_PER_PAGE", 10);
	define("NUMBERS_PER_PAGE", 10);
	
	define("SITE_NAME", "CelCount");
	define("SITE_HOME_URL", "http://localhost/celcount");
	define("IMAGE_DIR", "http://localhost/celcount/image");	

	
	/**** Image Resizing Classes ****************/

	define('DIR_IMAGE', '/home/wmedesig/public_html/celcount/image/');
	define('DIR_CACHE', '/home/wmedesig/public_html/celcount/image/cache/');
	define('HTTP_IMAGE', 'http://celcount.wmedesigns.com.au/image/');
	
	/**** Image Resizing Scale ****************/
	define('LISTING_THUMB_WIDTH', '83');
	define('LISTING_THUMB_HEIGH', '83');
	
	define('DETAIL_FULL_WIDTH', '285');
	define('DETAIL_FULL_HEIGH', '214');
	
	define('DETAIL_SMALL_WIDTH', '60');
	define('DETAIL_SMALL_HEIGH', '45');
	
?>