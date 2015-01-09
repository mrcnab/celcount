<?
	include("inc/ini.php");
	$getTotalUsers	=	$content_obj->getAllGroupsCount();
	$globalCount	  =	$content_obj->getGroupsCountInGlobal('Global');	
	$workCount		=	$content_obj->getGroupsCountInGlobal('Work');	
	$myGangCount	  =	$content_obj->getGroupsCountInGlobal('My Gang');
	
	$allGroups		=	$getTotalUsers['TOTAL_USERS'];
	$globalGroupCount =	$globalCount['TOTAL_USERS']; 
	$WorkGroupCount   =	$workCount['TOTAL_USERS']; 
	$gangGroupCount   =	$myGangCount['TOTAL_USERS']; 		
?>	
<div class="cmparison_wrap">
    <h2>COMPARE WITH <span>| GROUP</span></h2>
    <div class="comparison_box">
      <div class="category"> Global </div>
      <div class="rank"> C-Rank </div>
      <div class="nmbrs"> <?=$getTotalUsers['TOTAL_USERS']?> <span>of</span> <?=$globalCount['TOTAL_USERS']?> </div>
      <div class="mvmnt2"> <span>Movement <img src="images/green_arrow.png" width="18" /></span>  <?=$globalCount['TOTAL_USERS']?> <a href="further-groups.php?parentGroup=Global" class="blue_button">More</a> </div>
    </div>
    <div class="comparison_box">
      <div class="category"> Work </div>
      <div class="rank"> C-Rank </div>
      <div class="nmbrs">  <?=$getTotalUsers['TOTAL_USERS']?> <span>of</span> <?=$workCount['TOTAL_USERS']?>  </div>
      <div class="mvmnt2"> <span>Movement <img src="images/green_arrow.png" width="18" /></span> <?=$workCount['TOTAL_USERS']?> <a href="further-groups.php?parentGroup=Work" class="blue_button">More</a> </div>
    </div>    
  </div>