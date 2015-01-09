<?	
	@session_start();
	require_once("classes/constants.php");
	ini_set("memory_limit","128M");	
	$db_obj = new DBAccess();
	$content_obj = new contents();
	$pg_obj= new paging;
?>
