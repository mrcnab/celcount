<?php
	session_start();
	include("inc/ini.php");

	$memberId	=	$_REQUEST['member_id'];
	$userID	=	$_REQUEST['user_id'];
	$q = "INSERT INTO user_to_member (`user_id`, `member_id`, `addeddate`)VALUES('".$userID."', '".$memberId."', '".date('Y-m-d H:i:s')."')";		
	$r = $db_obj->insertRecord( $q );		
?>