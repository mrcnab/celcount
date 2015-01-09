<?php
	$getFiveMovers	=	$content_obj->selectTopFiveMovers();
?>
<div class="movers">
  <h2>TOP FIVE MOVERS</h2>
<? foreach($getFiveMovers as $movers){
	$userID	=	$movers['user_id'];
	$celcount_count	=	$movers['celcount_count'];
	$getUserDetails	=	$content_obj->getUserDetailsByUserId($userID);
	$userName	=	$getUserDetails['username'];
	$fbId			=	$getUserDetails['fb_id'];
	$tweetId	  =	$getUserDetails['tweet_id'];	
	$profileImage=	$getUserDetails['profile_image'];
	$getFbMovement	=	$content_obj->getFbMovement($fbId);
	$currentFbCount	=	$getFbMovement['fb_count'];
	$getTwitterMovement	=	$content_obj->getFirstTwitterMovement($tweetId);
	$currentTwitterCount	=	$getTwitterMovement['twitter_count'];

	$celCountCurrent	=	$currentFbCount + $currentTwitterCount;
?>  
  <div class="section">
    <div class="image-area"><img src="<?=$profileImage?>" alt="<?=$userName?>" /></div>
    <div class="movmentrating">
      <h4><?=$userName?></h4>
      <strong><em class="celcounttitle">celCount</em><em class="numbring"><? if($celCountCurrent == '0') { echo $celcount_count;}else{ echo $celCountCurrent; }?></em></strong><br /> <strong><a href="#">Movement</a><em class="numbring changecolor"><?=$celcount_count?></em></strong> </div>
  </div>
<? } ?>
</div>
