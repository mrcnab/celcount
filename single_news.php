<?php
//error_reporting(0);
	include("inc/ini.php");
	$single_news = $content_obj-> get_single_news($_REQUEST['news_id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$single_news['news_title'];?> | CelCount</title>

	<?php include("inc/header_tags.php"); ?>
</head>

<body>
	<?php include("inc/header.php"); ?>
<div id="content">
<div class="news-box">

<h3><?=substr($single_news['news_title'],0,95);?></h3>
<p><?=$single_news['news_text'];?></p>
<br clear="all" />

</div>
</div>


  
</div>
	<?php include("inc/footer.php"); ?>
</body>
</html>