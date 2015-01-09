<?
 	include("inc/ini.php");
	 require 'src/facebook.php';
	 $facebook = new Facebook(array(
	    'appId'  => '452925158108920',
	    'secret' => '80458df25637e8693e2d9b769baf83aa',
	));
	$fb_id = $facebook->getUser();
	$getUserId	=	$content_obj->getUserIdByFaceBookId($fb_id);
	$registerUserId	=	$getUserId['id'];

	if(isset($_POST['searchGroup'])){
		$groupName	=	$_POST['group_name'];
		$q = "SELECT * FROM tbl_groups WHERE `group_title` LIKE '%".$groupName."%'";
		$q1 = "SELECT count( * ) as total FROM tbl_groups WHERE `group_title` LIKE '%".$groupName."%'";
		$get_all_group_pages = $pg_obj -> getPaging( $q, RECORDS_PER_PAGE, $pageno );
		$get_all_group_record = $content_obj -> display_groups_search_listing( $get_all_group_pages, $page_link, $pageno );
		if( $get_all_group_pages != false )
		{
			$get_total_records = $db_obj-> getSingleRecord( $q1 );
			$total_records = $get_total_records['total'];
			$total_pages = ceil( $total_records / RECORDS_PER_PAGE );
		}
	}

	if(isset($_POST['searchMember'])){
		$memberName	=	$_POST['member_name'];
		$q = "SELECT * FROM ah_users WHERE `username` LIKE '%".$memberName."%'";
		$q1 = "SELECT count( * ) as total FROM ah_users WHERE `username` LIKE '%".$memberName."%'";
		$get_all_group_pages = $pg_obj -> getPaging( $q, RECORDS_PER_PAGE, $pageno );
		$get_all_group_record = $content_obj -> display_member_search_listing( $get_all_group_pages, $page_link, $pageno );
		if( $get_all_group_pages != false )
		{
			$get_total_records = $db_obj-> getSingleRecord( $q1 );
			$total_records = $get_total_records['total'];
			$total_pages = ceil( $total_records / RECORDS_PER_PAGE );
		}
	}


if($_POST['addUserGroup']){
	$user_id	=	$_POST['user_id'];
	$group_id	=	$_POST['group_id'];
	$addUserGroup	=	$content_obj->addUserGroup($user_id, $group_id);
	if($addUserGroup == TRUE){		
			$msg	=	"&nbsp;<span class='good_msg'>Your are added to group.</span>";
		}else{
			$msg	=	"&nbsp;<span class='bad_msg'>There is some error, Please try again.</span>";			
		}	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search <?=$groupName?> | CelCount</title>
	<?php include("inc/header_tags.php"); ?>
</head>

<body>	
<?php include("inc/header.php"); ?>
<div id="content">
   <div id="banner">
<? if(isset($_POST['searchGroup'])){?>   	
	<h2><span>Matching Groups Like </span> <?=$groupName?> </h2>
<? }else if(isset($_POST['searchMember'])){?>	
	<h2><span>Matching Members Like </span> <?=$memberName?> </h2>
<? }else{?>	
	<h2><span>GLOBAL GROUP LIST </span> <?=strtoupper($searchFrom)?> To <?=strtoupper($searchTo)?></h2>
<? } ?>      
    <h3>Group List</h3>
   </div>
   <div class="clear"></div>
 <?=$get_all_group_record?>
                     <br class="clear"/>
						<?
                        if( $total_pages > 1 )
                        {
                        echo '<div class="pageing">'.$pg_obj -> display_paging( $total_pages, $pageno, $page_link, NUMBERS_PER_PAGE ).'</div>';
                        }
                        ?>    
        <div class="clear"></div>
        
   </div>
<!--
   <div class="pre_next">
   <input type="button" class="pre_btn"  name="previous_btn" />
   <input type="button" class="nxt_btn"  name="next_btn" />
   </div> -->
   <div id="banner_bottom">
   <h2 style="float:left;width:190px; font-size:12px;color:#065f69;margin-left:195px;margin-top:10px;">Keep track of the popularity
of the most important person
in the world<span style="color:#5db809;">... you!!!</span></h2>
   <div id="ban_right" style="float:right;margin-right:60px;margin-top: 10px;">
     <p style="font-size:10px;"> Matthew, Carlos Cee and 3 others use CelCount.</p>
      <img src="images/img1.png" alt="image 1" />
      <img src="images/img2.png" alt="image 1" />
      <img src="images/img3.png" alt="image 1" />
      <img src="images/img4.png" alt="image 1" />
      <img src="images/img5.png" alt="image 1" />
      <img src="images/img6.png" alt="image 1" />
      
   </div>      
   </div>
</div>
	<?php include("inc/footer.php"); ?>
</body>
</html>
<script>

function joinGroup(group_id) {
	var groupId	=	group_id;
	var userId	=	<?=$registerUserId?>;
	$.ajax({
		url: 'joinNewGroup.php',
		type: 'post',
		data: 'group_id=' + groupId + '&user_id=' + userId,
		dataType: 'json',
	});
}


function addToFavGroup(group_id) {
	var groupId	=	group_id;
	var userId	=	<?=$registerUserId?>;
	$.ajax({
		url: 'addToFavGroup.php',
		type: 'post',
		data: 'group_id=' + groupId + '&user_id=' + userId,
		dataType: 'json',
	});
}

function addToFavmember(member_id) {
	var memberId	=	member_id;
	var userId	=	<?=$registerUserId?>;
	$.ajax({
		url: 'addToFavmember.php',
		type: 'post',
		data: 'member_id=' + memberId + '&user_id=' + userId,
		dataType: 'json',
	});
}
</script>