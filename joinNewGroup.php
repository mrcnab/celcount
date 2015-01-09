<?php
//error_reporting(0);
	session_start();
	include("inc/ini.php");
	$groupID	=	$_REQUEST['group_id'];
	$userID	=	$_REQUEST['user_id'];
	$q = "INSERT INTO user_to_group (`user_id`, `group_id`, `addeddate`)	 VALUES('".$userID."', '".$groupID."', '".date('Y-m-d H:i:s')."')";		
	$r = $db_obj->insertRecord( $q );		
?>