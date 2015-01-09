<?
class contents
{
	var $db = "";
	function contents()
	{
		$this -> db = new DBAccess();
	}	//	End of function contents()
	
	function get_content_info( $content_id, $status = 0 )
	{
		$criteria =  "content_status = 1 AND ";
		$q = "SELECT * FROM tbl_contents WHERE ".$criteria." content_id = ".$content_id;
		$r = $this -> db -> getSingleRecord( $q );
		if( $r != false )
			return $r;
		else
			return false;
	}	//	End of function get_content_info( $content_id, $status = 0 )

	function get_single_news( $news_id )
	{
		$q = "SELECT * FROM tbl_news_and_events WHERE  news_id = ".$news_id;
		$r = $this -> db -> getSingleRecord( $q );
		if( $r != false )
			return $r;
		else
			return false;
	}	//	End of function get_content_info( $content_id, $status = 0 )

	function get_lastest_five_news()
	{
		$q = "SELECT * FROM tbl_news_and_events WHERE news_status = 1 ORDER BY news_id DESC  LIMIT 0,5 ";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r != false )
			return $r;
		else
			return false;
	}	//	End of function get_lastest_five_news()


	function get_all_active_news()
	{
		$q = "SELECT * FROM tbl_news_and_events WHERE news_status = 1 ORDER BY news_id DESC";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r != false )
			return $r;
		else
			return false;
	}	//	End of function get_lastest_five_news()

	function select_email()
	{
		$qry = "SELECT * FROM users LIMIT 1,1";
		return $this -> db -> getSingleRecord($qry);
	}	

	function updateSocialCounts($fb_id, $fb_count, $twitter_id, $twitter_count){
	$q = "INSERT INTO tbl_social_chart (`fb_id`, `fb_count`, `twitter_id`, `twitter_count`, `updated_date`)		
			 VALUES('".$fb_id."', '".$fb_count."', '".$twitter_id."', '".$twitter_count."', '".date('Y-m-d H:i:s')."')";		
			$r = $this -> db ->insertRecord( $q );					
			if( $r )
				return true;
			else
				return false;					
	}	
	function selectTopFiveMovers()
	{
		$q = "SELECT DISTINCT user_id,celcount_count  FROM `tbl_top_five_movers` group by user_id ORDER BY `celcount_count` DESC LIMIT 0 , 5 ";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r )
			return $r;
		else
			return false;
	}	
	
	function getAllUserIdsByGroupId($group_id)
	{
		$q = "SELECT DISTINCT user_id  FROM `user_to_group` WHERE group_id = ".$group_id." ORDER BY `addeddate` ASC";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	

	function updateTopFiveMovers($userId, $cel_count){
	$q = "INSERT INTO tbl_top_five_movers (`user_id`, `celcount_count`, `modifieddate`)		
			 VALUES('".$userId."', '".$cel_count."',  '".date('Y-m-d H:i:s')."')";		
			$r = $this -> db ->insertRecord( $q );					
			if( $r )
				return true;
			else
				return false;					
	}	
	function joinNewGroup( $group_id, $user_id){
		$q = "INSERT INTO user_to_group (`user_id`, `group_id`)		
			 VALUES('".$user_id."', '".$group_id."')";		
			$r = $this -> db ->insertRecord( $q );					
			if( $r )
				return true;
			else
				return false;				
	}	//	End of function addGroup( $group_title, $group_init, $group_type, $photo1)	


	function addGroup( $group_title, $group_init, $group_type, $photo1, $userId){
	$q = "INSERT INTO tbl_groups (`group_title`, `group_init`, `group_type`, `group_image`)		
			 VALUES('".$group_title."', '".$group_init."', '".$group_type."', '".$photo1."')";		
			$r = $this -> db ->insertRecord( $q );	
			$lastInsertedId 	= $this -> db ->getNewId();
			$groupCreator	=	$this->addGroupCreator($userId,$lastInsertedId);							
			if( $groupCreator )
				return true;
			else
				return false;				
	}	//	End of function addGroup( $group_title, $group_init, $group_type, $photo1)	



	function addGroupCreator( $user_id,$group_id){
	$q = "INSERT INTO tbl_group_creators (`user_id`, `group_id`, `addeddate`)		
			 VALUES('".$user_id."', '".$group_id."',  '".date('Y-m-d H:i:s')."')";		
			$r = $this -> db ->insertRecord( $q );					
			if( $r )
				return true;
			else
				return false;				
	}
	
	function getUserCreatedGroupsByUserId($user_id){
		$q = "SELECT * FROM tbl_group_creators WHERE  `user_id` = '".$user_id."' ORDER BY id DESC";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	function getFbMovement($fb_id){
		$q = "SELECT * FROM tbl_social_chart WHERE  `fb_id` = '".$fb_id."' ORDER BY social_chart_id ASC limit 0,1 ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	function getSecondFbMovement($fb_id){
		$q = "SELECT * FROM tbl_social_chart WHERE  `fb_id` = '".$fb_id."' ORDER BY social_chart_id DESC limit 1,2 ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	
	function getGroupByGroupId($group_id){
		$q = "SELECT * FROM tbl_groups WHERE  `group_id` = '".$group_id."'  ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	
	
	function getUserIdByFaceBookId($fb_id){
		$q = "SELECT * FROM ah_users WHERE  `fb_id` = '".$fb_id."'  ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}

	function getFaceBookAccountDetailsByFbId($fb_id){
		$q = "SELECT * FROM user_fb WHERE  `fb_id` = '".$fb_id."'  ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}

	function getTwitterAccountDetailsByTwitterId($tweet_id){
		$q = "SELECT * FROM user_tweet WHERE  `tweet_id` = '".$tweet_id."'  ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	
	function getUserFavouriteGroups($user_id){
		$q = "SELECT DISTINCT group_id FROM user_fav_groups WHERE  `user_id` = '".$user_id."'  ";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	function getUserFavouriteUsers($user_id){
		$q = "SELECT DISTINCT member_id FROM user_to_member WHERE  `user_id` = '".$user_id."'  ";
		$r = $this -> db -> getMultipleRecords( $q );
		if( $r )
			return $r;
		else
			return false;
	}

	function getTwitterMovement($twitter_id){
		$q = "SELECT * FROM tbl_social_chart WHERE  `twitter_id` = '".$twitter_id."' ORDER BY social_chart_id ASC limit 1,2 ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	function getFirstTwitterMovement($twitter_id){
		$q = "SELECT * FROM tbl_social_chart WHERE  `twitter_id` = '".$twitter_id."' ORDER BY social_chart_id DESC limit 0,1 ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	function updateTwitterRecordByTwitterId($twitter_id,$followersCount, $screen_name, $profile_image){
	$q = "UPDATE ah_users SET `screen_name` = '".$screen_name."', `profile_image` = '".$profile_image."'    WHERE tweet_id = ".$twitter_id;
		$r = $this -> db -> updateRecord( $q );
		if( $r != false )
			return true;
		else
			return false;
	}
	
	
	function getUserDetailsByUserId($user_id){
		$q = "SELECT * FROM ah_users WHERE  `id` = '".$user_id."'  ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	
	function updateTwitterRecordByTwitterIdUserTweet($twitter_id,$followersCount, $screen_name, $profile_image){
		$q = "UPDATE user_tweet SET `name` = '".$screen_name."', `friends_count` = '".$followersCount."', `profile_image` = '".$profile_image."' 
				WHERE tweet_id = ".$twitter_id;	
		$r = $this -> db -> updateRecord( $q );
		if( $r != false )		
			return true;
		else
			return false;
	}

	function getTotalUsersCount(){
		$q = "SELECT count(*) as TOTAL_USERS FROM user_fb ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}

	function getAllGroupsCount(){
		$q = "SELECT count(*) as TOTAL_USERS FROM tbl_groups ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}
	function getGroupsCountInGlobal($groupType){
		$q = "SELECT count(*) as TOTAL_USERS FROM tbl_groups WHERE group_type = '".$groupType."' ";
		$r = $this -> db -> getSingleRecord( $q );
		if( $r )
			return $r;
		else
			return false;
	}

function display_groups_search_listing( $group_listing_records, $page_link, $page_no )
	{
		if( $group_listing_records != false )
		{
			$start = $page_no * RECORDS_PER_PAGE - RECORDS_PER_PAGE + 1;
			for( $i = 0; $i < count( $group_listing_records ); $i++ )
			{
				$group_id = $group_listing_records[$i]['group_id'];
				$group_title = substr($group_listing_records[$i]['group_title'],0,35);
				$customerId = $group_listing_records[$i]['customerId'];
				$imageName	=	$group_listing_records[$i]['group_image'];
				
				if(file_exists("image/".$imageName)){
					$imageThumb	=	$this->resize($imageName,LISTING_THUMB_WIDTH,LISTING_THUMB_HEIGH);
				}else{					
					$imageThumb	=	$this->resize('noimage.jpg',LISTING_THUMB_WIDTH,LISTING_THUMB_HEIGH);					
				}	
				$allUsersId	=	$this->getAllUserIdsByGroupId($group_id);
				$allFbCount	=	'';
				$allTweeterCount	=	'';
				$totalCelCount	=	'';
				if($allUsersId)
				foreach($allUsersId as $users){
					$userDetails	=	$this->getUserDetailsByUserId($users['user_id']);
					$getFacebookDetails	=	$this->getFaceBookAccountDetailsByFbId($userDetails['fb_id']);			
					$allFbCount	+=	$getFacebookDetails['friends_count'];
					
					$getTweetDetails	=	$this->getTwitterAccountDetailsByTwitterId($userDetails['tweet_id']);	
					$allTweeterCount	+=	$getTweetDetails['friends_count'];
					
					$totalCelCount	=	$allFbCount + 	$allTweeterCount;			
				}
			
				$saveAdvert = "<a title='Save' href='".$page_link."".$actionPage."&amp;action=saveAdvertforme&amp;advertId=".$advertId."&amp;pageno=".$page_no."'><img src='images/save-btn.png' alt='Save' border='0'></a>";	
				
				$group_listing .= ' 
			<div class="clear"></div>
			<div class="star_rating">
			<div class="star_left">'.$group_title.'</div>
			<div class="star_right"> 
			<img src="images/star4.png" alt="" />
			<img src="images/star4.png" alt="" />
			<img src="images/star4.png" alt="" />
			</div>
			</div>
			<div class="clear"></div>	
			<div class="user_info_wrap">
			<div class="profile_links">
			<div class="user_pic1" style="width:105px;height:105px; ">
			<img src="'.$imageThumb.'" alt="'.$group_title.'" />
			</div>

			<a  onclick="javascript:joinGroup('.$group_id.')" style="cursor:pointer;">JOIN THIS GROUP <img src="images/profile_edit.png" alt="" /></a>


			<a  onclick="javascript:addToFavGroup('.$group_id.')" style="cursor:pointer;">ADD TO FAVOURITE <img src="images/star2.png" alt="" /></a>
			</div>
			<div class="chart_wraper1">
			<div class="chart_row">
			<div class="item_name">
			<img src="images/fb.png" alt="" /> Friends / Likes
			<span class="rating_points">'.$allFbCount.'</span>
			</div>
			<div class="movment">
			<span>Movement</span>
			<img src="images/green_arrow.png" width="18" alt="" /> <strong>1.200</strong>
			</div>
			<div class="dwnld_chrt">
			<a href="#" class="blue_button">Chart</a>
			</div>
			</div>
			<div class="chart_row2">
			<div class="item_name">
			<img src="images/twtr.png" alt="" /> Followers
			<span class="rating_points">'.$allTweeterCount.'</span>
			</div>
			<div class="movment">
			<span>Movement</span>
			<img src="images/red_arrow.png" alt="" /> <strong>1.200</strong>
			</div>
			<div class="dwnld_chrt">
			<a href="#" class="blue_button">Chart</a>
			</div>
			</div>
			
			</div>
			<div class="c_rank" >
			<div class="rank_name">
			<span>'.$totalCelCount.'</span>
			</div>
			<div class="movment">
			Movement <img src="images/green_arrow.png" width="18" alt="" />
			<span>'.$totalCelCount.'</span>
			</div>
			<a href="#" class="blue_button">Chart</a>
			<div class="clear"></div>
			<div class="rank_name">
			<span>457,563</span>	
			</div>
			<div class="movment">
			Movement <img src="images/green_arrow.png" width="18" alt="" />
			<span>457,563</span>
			</div>
			<a href="#" class="blue_button">Chart</a>
			</div>';
							
							$start++;
			}	//	End of For Loooooooooop
		}	//	End of if( $group_listing_records != false )
		else
		{
			$group_listing = '<div class="bad_msg" style="margin-top:15px;" >No Record Found.</div>';
		}
		return $group_listing;
	}	//	End of function display_advertisment_listing( $group_listing_records, $page_advertisment )	
	
function display_member_search_listing( $member_listing_records, $page_link, $page_no )
	{
		if( $member_listing_records != false )
		{

			$start = $page_no * RECORDS_PER_PAGE - RECORDS_PER_PAGE + 1;
			for( $i = 0; $i < count( $member_listing_records ); $i++ )
			{
			
				$myfb_id = $member_listing_records[$i]['fb_id'];
				$user_tweet_id = $member_listing_records[$i]['tweet_id'];
				$user_name = $member_listing_records[$i]['username'];
				$imageName	=	$member_listing_records[$i]['profile_image'];
				
				if(file_exists("image/".$imageName)){
					$imageThumb	=	$this->resize($imageName,LISTING_THUMB_WIDTH,LISTING_THUMB_HEIGH);
				}else{					
					$imageThumb	=	$this->resize('noimage.jpg',LISTING_THUMB_WIDTH,LISTING_THUMB_HEIGH);					
				}
				 
				$getFbMovement	=	$this->getFbMovement($myfb_id);
				$LatestFbCount	  =	$getFbMovement['fb_count'];
				$getUserIdByFbId	=	$this->getUserIdByFaceBookId($myfb_id);
				$getSecondFbMovement	=	$this->getSecondFbMovement($myfb_id);
				$SecondFbCount	=	$getSecondFbMovement['fb_count'];
			
				if($LatestFbCount > $SecondFbCount ){
				$socialChange	=	$LatestFbCount - $SecondFbCount;
				$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/green_arrow.png" width="18" alt="" /> <strong>'.$socialChange.'</strong> </div>';
				}else if($SecondFbCount < $LatestFbCount ){
				$socialChange	=	$LatestFbCount - $SecondFbCount;
				$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/red_arrow.png" width="18" alt="" /> <strong>'.$socialChange.'</strong> </div>';
				}else{
				$fbMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/black_box.png" width="18" alt="" /></div>';
				}
				
				
				$getCurrentTwitterMovement	=	$this->getFirstTwitterMovement($user_tweet_id);
				$currentTwitterCount	=	$getCurrentTwitterMovement['twitter_count'];
				
				$getLastTwitterMovement	=	$this->getTwitterMovement($user_tweet_id);
				$lastTwitterCount	=	$getLastTwitterMovement['twitter_count'];
				
				
				if($currentTwitterCount > $lastTwitterCount ){
				$socialChangeTwitter	=	$currentTwitterCount - $lastTwitterCount;
				$twitterMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/green_arrow.png" width="18" alt="" /> <strong>'.$socialChangeTwitter.'</strong> </div>';
				}else if($lastTwitterCount > $currentTwitterCount ){
				$socialChangeTwitter	=	$lastTwitterCount - $currentTwitterCount;
				$twitterMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/red_arrow.png" width="18" alt="" /> <strong>'.$socialChangeTwitter.'</strong> </div>';
				}else{
				$twitterMovement	=	'<div class="movment"> <span>Movement</span> <img src="images/black_box.png" width="18" alt="" /></div>';
				}
				$totalCelCountForUser	=	'';
				$totalCelCountForUser	=	$LatestFbCount + $currentTwitterCount;
				
				$saveAdvert = "<a title='Save' href='".$page_link."".$actionPage."&amp;action=saveAdvertforme&amp;advertId=".$advertId."&amp;pageno=".$page_no."'><img src='images/save-btn.png' alt='Save' border='0'></a>";	
				
			$member_listing .= ' 
			<div class="clear"></div>
			<div class="star_rating">
			<div class="star_left">'.$user_name.'</div>
			<div class="star_right"> 
			<img src="images/star4.png" alt="" />
			<img src="images/star4.png" alt="" />
			<img src="images/star4.png" alt="" />
			</div>
			</div>
			<div class="clear"></div>	
			<div class="user_info_wrap">
			<div class="profile_links">
			<div class="user_pic1" style="width:105px;height:105px; ">
			<img src="'.$imageName.'" alt="'.$user_name.'" />
			</div>
			<a  onclick="javascript:addToFavmember('.$getUserIdByFbId['id'].')" style="cursor:pointer;">ADD TO FAVOURITE <img src="images/star2.png" alt="" /></a>
			</div>
			<div class="chart_wraper1">
			<div class="chart_row">
			<div class="item_name">
			<img src="images/fb.png" alt="" /> Friends / Likes
			<span class="rating_points">'.$LatestFbCount.'</span>
			</div>
			'.$fbMovement.'
			<div class="dwnld_chrt">
			<a href="#" class="blue_button">Chart</a>
			</div>
			</div>
			<div class="chart_row2">
			<div class="item_name">
			<img src="images/twtr.png" alt="" /> Followers
			<span class="rating_points">'.$currentTwitterCount.'</span>
			</div>
'.$twitterMovement.'			
<div class="dwnld_chrt">
			<a href="#" class="blue_button">Chart</a>
			</div>
			</div>
			
			</div>
			<div class="c_rank" >
			<div class="rank_name">
			<span>'.$totalCelCountForUser.'</span>	
			</div>
			<div class="movment">
			Movement <img src="images/green_arrow.png" width="18" alt="" />
			<span>'.$totalCelCountForUser.'</span>	
			</div>
			<a href="#" class="blue_button">Chart</a>
			<div class="clear"></div>
			<div class="rank_name">
			<span>457,563</span>	
			</div>
			<div class="movment">
			Movement <img src="images/green_arrow.png" width="18" alt="" />
			<span>457,563</span>
			</div>
			<a href="#" class="blue_button">Chart</a>
			</div>';
							
							$start++;
			}	//	End of For Loooooooooop
		}	//	End of if( $group_listing_records != false )
		else
		{
			$member_listing = '<div class="bad_msg" style="margin-top:15px;" >No Record Found.</div>';
		}
		return $member_listing;
	}	//	End of function display_advertisment_listing( $group_listing_records, $page_advertisment )
	
	
	
	public function resize($filename, $width, $height) {
		
	if (!file_exists(DIR_IMAGE . $filename) || !is_file(DIR_IMAGE . $filename)) {
			return;
		} 
	
		$info = pathinfo($filename);
		$extension = $info['extension'];

		$old_image = $filename;
		$new_image = 'cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;

		if (!file_exists(DIR_IMAGE . $new_image) || (filemtime(DIR_IMAGE . $old_image) > filemtime(DIR_IMAGE . $new_image))) {
			$path = '';

			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
				
				if (!file_exists(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}		
			}
			
			$image = new Image(DIR_IMAGE . $old_image);
			$image->resize($width, $height);
			$image->save(DIR_IMAGE . $new_image);
		}
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			return HTTPS_IMAGE . $new_image;
		} else {
			return HTTP_IMAGE . $new_image;
		}	
	}	
}	//	End of class contents
?>