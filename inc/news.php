<? 
	$latestNews	=	$content_obj->get_lastest_five_news();
?>
<div class="news_wraper">
      <h3>HEADLINES <span>| NEWS</span></h3>
      <?php foreach($latestNews as $news){ ?>
      <p><a href="single_news.php?news_id=<?=$news['news_id']?>"><?=substr($news['news_title'],0,45);?></a></p><br />
     <? } ?>


  <a href="all-news.php" class="blue_button">View All</a> </div>

